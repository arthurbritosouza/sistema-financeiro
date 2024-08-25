<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualizar Conta</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #F5F5F5;
            margin: 0;
            font-family: Arial, sans-serif;
        }

        #div_body {
            margin-top: 20px;
            width: 90%;
            max-width: 800px;
            border-radius: 10px;
            padding: 40px;
            background-color: white;
            border: 1px solid #ccc;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            margin-left: auto;
            margin-right: auto;
            margin-top: 100px;
        }

        h1 {
            font-size: 28px;
            margin-bottom: 30px;
            text-align: center;
        }

        .details-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 15px;
        }

        .details-row label {
            font-weight: bold;
            font-size: 18px;
        }

        .details-row span {
            font-size: 18px;
            color: #333;
        }

        .action-buttons {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 30px;
        }

        .btn-back,
        .btn-edit,
        .btn-trash,
        .btn-pagar {
            padding: 10px 20px;
            font-size: 16px;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .btn-back {
            background-color: #007BFF;
        }


        .btn-back:hover {
            background-color: #0056b3;
        }

        .btn-pagar {
            background-color: #00FF7F;
        }


        .btn-pagar:hover {
            background-color: #66CDAA;
        }

        .btn-trash {
            background-color: #ff0000;
        }

        .btn-trash:hover {
            background-color: #d80000;
        }

        .btn-edit {
            background-color: #FFC107;
        }

        .btn-edit:hover {
            background-color: #e0a800;
        }
    </style>
</head>

<body>
    @include('includes.header')
    <div id="div_body">
        <h1>Detalhes da Fatura</h1>
        <div class="details-row">
            <label>Descrição:</label>
            <span>{{$contas->descricao}}</span>
        </div>
        <div class="details-row">
            <label>Data de Vencimento:</label>
            <span>{{$contas->data_vencimento}}</span>
        </div>
        <div class="details-row">
            <label>Data de Pagamento:</label>
            <span>{{$contas->data_pagamento}}</span>
        </div>
        <div class="details-row">
            <label>Status:</label>
            @if($contas->status = 1)
            <span>Quitado</span>
            @elseif($contas->status = 2)
            <span>Em aberto</span>
            @endif
        </div>
        <div class="details-row">
            <label>Comprovante:</label>
            <span>Ver Comprovante</span>
        </div>
        <div class="details-row">
            <label>Valor:</label>
            <span>R$ {{$contas->valor}}</span>
        </div>

        <div class="action-buttons">
            <a href="/inicio" class="btn-back"><i class="fas fa-arrow-left"></i> Voltar</a>
            <a href="/editar/{{$contas->id}}" class="btn-edit"><i class="fas fa-edit"></i> Editar</a>
            <a href="/excluir_conta/{{$contas->id}}" class="btn-trash"><i class="fas fa-trash"></i> Excluir</a>
            <a href="/pagar_fatura/{{$contas->id}}" class="btn-pagar"><i class="fas fa-money-bill-wave"></i> Pagar</a>
    </div>
</body>
</html>
