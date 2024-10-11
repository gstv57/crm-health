<?php

namespace App\Services\Asaas;

use Illuminate\Support\Facades\Http;

class CreatePaymentBoleto
{
    private string $customer_id;

    private float $amount;

    private string|false|array $token;

    private string|false|array $url;

    public function __construct(string $customer_id, float $amount)
    {
        $this->url         = getenv('ASAAS_URL_ENVIRONMENT');
        $this->token       = getenv('ASAAS_TOKEN');
        $this->customer_id = $customer_id;
        $this->amount      = $amount;
    }

    public function handle(): array
    {
        $response = Http::withHeaders([
            'accept'       => 'application/json',
            'access_token' => $this->token,
        ])->post($this->url . 'v3/payments', [
            'billingType' => 'BOLETO',
            'customer'    => $this->customer_id,
            'value'       => $this->amount,
            'dueDate'     => now()->format('Y-m-d'),
        ]);

        $data = $response->json();

        return [
            'url'          => $data['invoiceUrl'],
            'id_transacao' => $data['id'],
        ];
    }
}
