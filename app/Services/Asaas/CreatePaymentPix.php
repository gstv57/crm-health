<?php

namespace App\Services\Asaas;

use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Support\Facades\Log;

class CreatePaymentPix
{
    public Client $client;

    private string $customer_id;

    private float $amount;

    private string|false|array $token;

    private string|false|array $url;

    public function __construct(string $customer_id, float $amount)
    {
        $this->client      = new Client();
        $this->customer_id = $customer_id;
        $this->token       = getenv('ASAAS_TOKEN');
        $this->url         = getenv('ASAAS_URL_ENVIRONMENT');
        $this->amount      = $amount;
    }

    public function handle()
    {
        try {
            $response = $this->client->request('POST', $this->url . 'v3/payments', [
                'body' => json_encode([
                    'customer'    => $this->customer_id,
                    'billingType' => 'PIX',
                    'value'       => $this->amount,
                    'dueDate'     => '2024-12-12',
                ]),
                'headers' => [
                    'accept'       => 'application/json',
                    'content-type' => 'application/json',
                    'access_token' => $this->token,
                ],
            ]);

            if ($response->getStatusCode() == 200) {
                $body = $response->getBody()->getContents();

                $data = json_decode($body, true);

                if (is_array($data)) {
                    return [
                        'url'          => $data['invoiceUrl'],
                        'id_transacao' => $data['id'],
                    ];
                }
            }

            return false;

        } catch (Exception $exception) {
            Log::info('Exception: ' . $exception->getMessage());

            return false;
        } catch (GuzzleException $exception) {
            Log::info('GuzzleError: ' . $exception->getMessage());

            return false;
        }
    }
}
