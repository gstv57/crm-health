<?php

namespace App\Services\Assas;

use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Support\Facades\Log;

class CreateCustomer
{
    public Client $client;

    private string $nome;

    private string $cpf;

    private string|false|array $token;

    private string|false|array $url;

    public function __construct(string $nome, string $cpf)
    {
        $this->client = new Client;
        $this->nome   = $nome;
        $this->cpf    = $cpf;
        $this->token  = getenv('ASAAS_TOKEN');
        $this->url    = getenv('ASAAS_URL_ENVIRONMENT');
    }

    public function handle(): string|bool
    {
        try {
            $response = $this->client->request('POST', $this->url . 'v3/customers', [
                'body' => json_encode([
                    'name'    => $this->nome,
                    'cpfCnpj' => $this->cpf,
                ]),
                'headers' => [
                    'accept'       => 'application/json',
                    'content-type' => 'application/json',
                    'access_token' => $this->token,
                ],
            ]);

            $body = $response->getBody()->getContents();

            $data = json_decode($body, true);

            if ($response->getStatusCode() == 200) {
                return $data['id'];
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
