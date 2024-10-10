<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Link de Pagamento</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        .button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: #ffffff;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
        }
    </style>
</head>
<body>
<h1>Seu Link de Pagamento</h1>
<p>Olá, </p>
<p>Obrigado por escolher nossos serviços. Para efetuar o pagamento, por favor clique no botão abaixo:</p>
<p>
    <a href="{{ $linkFatura }}" class="button">Pagar Agora</a>
</p>
<p>Se você tiver alguma dúvida, não hesite em nos contatar.</p>
<p>Atenciosamente,<br>Sua Empresa</p>
</body>
</html>
