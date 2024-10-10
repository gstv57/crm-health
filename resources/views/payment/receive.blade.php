<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmação de Pagamento da Consulta</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f4f4f4;
        }
        .container {
            background-color: #ffffff;
            border-radius: 8px;
            padding: 30px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #2c3e50;
            border-bottom: 2px solid #3498db;
            padding-bottom: 10px;
        }
        .info-box {
            background-color: #e8f4fd;
            border-left: 4px solid #3498db;
            padding: 15px;
            margin-bottom: 20px;
        }
        .info-item {
            margin-bottom: 10px;
        }
        .label {
            font-weight: bold;
            color: #2c3e50;
        }
        .value {
            color: #34495e;
        }
        .footer {
            margin-top: 30px;
            text-align: center;
            color: #7f8c8d;
            font-size: 0.9em;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Confirmação de Pagamento da Consulta</h1>
    <p>Olá {{ $pagamento->consulta->paciente->primeiro_nome }},</p>
    <p>Agradecemos pelo seu pagamento. Sua consulta está confirmada com os seguintes detalhes:</p>

    <div class="info-box">
        <div class="info-item">
            <span class="label">Médico:</span>
            <span class="value">Dr(a). {{ $pagamento->consulta->medico->nome_completo }}</span>
        </div>
        <div class="info-item">
            <span class="label">Data e Hora:</span>
            <span class="value">{{ $pagamento->consulta->data_e_hora->format('d/m/Y H:i') }}</span>
        </div>
        <div class="info-item">
            <span class="label">Paciente:</span>
            <span class="value">{{ $pagamento->consulta->paciente->primeiro_nome . ' ' . $pagamento->consulta->paciente->sobrenome }}</span>
        </div>
        <div class="info-item">
            <span class="label">Valor Pago:</span>
            <span class="value">R$ {{ number_format($pagamento->valor, 2, ',', '.') }}</span>
        </div>
    </div>

    <p>Se você tiver alguma dúvida ou precisar reagendar, por favor, entre em contato conosco.</p>

    <p>Desejamos uma ótima consulta!</p>

    <div class="footer">
        <p>Este é um e-mail automático, por favor não responda.</p>
        <p>&copy; {{ date('Y') }} Sua Clínica. Todos os direitos reservados.</p>
    </div>
</div>
</body>
</html>
