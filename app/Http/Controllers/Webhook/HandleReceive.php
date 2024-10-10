<?php

namespace App\Http\Controllers\Webhook;

use App\Enum\Pagamento\PagamentoStatusEnum;
use App\Http\Controllers\Controller;
use App\Models\Pagamento;
use Illuminate\Http\Request;

class HandleReceive extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $payload = json_decode($request->getContent(), true);

        if (json_last_error() === JSON_ERROR_NONE && isset($payload['event'])) {
            $eventName  = $payload['event'];
            $identifier = $payload['payment']['id'];

            if ($eventName == 'PAYMENT_RECEIVED') {
                $pagamento = Pagamento::where('id_transacao', $identifier)->first();

                if ($pagamento) {
                    $pagamento->status_pagamento = PagamentoStatusEnum::PAGO;
                    $pagamento->save();
                }
            }
        }
    }
}
