<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lembrete de Consulta</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #333333;
            margin-top: 0;
        }
        .alert {
            background-color: #f8d7da;
            color: #721c24;
            padding: 10px;
            border-radius: 3px;
            margin-bottom: 20px;
        }
        .info {
            background-color: #e9ecef;
            padding: 15px;
            border-radius: 3px;
            margin-bottom: 20px;
        }
        .info p {
            margin: 5px 0;
        }
        .button {
            display: inline-block;
            background-color: #007bff;
            color: #ffffff;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 3px;
            transition: background-color 0.3s ease;
        }
        .button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Lembrete de Consulta</h1>
    <div class="alert">
        <strong>Atenção!</strong> Sua consulta começará em 5 minutos.
    </div>
    <div class="info">
        <p><strong>Paciente:</strong> <span id="nome-paciente">Nome do Paciente</span></p>
        <p><strong>Data:</strong> <span id="data-consulta">DD/MM/AAAA</span></p>
        <p><strong>Horário:</strong> <span id="horario-consulta">HH:MM</span></p>
    </div>
    <p>
        Por favor, certifique-se de estar pronto para a consulta. Se precisar reagendar ou tiver alguma dúvida, entre em contato conosco imediatamente.
    </p>

    <a href="{{ $url }}" class="button">Acessar Consulta Online</a>
</div>
</body>
</html>
