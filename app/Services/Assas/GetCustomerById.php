<?php

namespace App\Services\Assas;

use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Support\Facades\Log;

class GetCustomerById
{
    /**
     * @var Client
     */
    public Client $client;

    /**
     * @var string
     */
    private string $customer_id;

    /**
     * @var string|false|array
     */
    private string|false|array $token;

    /**
     * @var string|false|array
     */
    private string|false|array $url;

    /**
     * @param string $customer_id
     */
    public function __construct(string $customer_id)
    {
        $this->client      = new Client;
        $this->customer_id = $customer_id;
        $this->token       = getenv('ASAAS_TOKEN');
        $this->url         = getenv('ASAAS_URL_ENVIRONMENT');
    }

    /**
     * @return string|bool
     */
    public function handle(): string|bool
    {
        try {
            $response = $this->client->request('GET', $this->url . "v3/customers/$this->customer_id", [
                'headers' => [
                    'accept'       => 'application/json',
                    'access_token' => $this->token,
                ],
            ]);

            if ($response->getStatusCode() == 200) {
                return $response->getBody()->getContents();
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
