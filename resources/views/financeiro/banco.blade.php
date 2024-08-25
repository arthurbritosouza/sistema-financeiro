<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Banking Dashboard</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #F5F5F5;
            margin: 0;
            font-family: Arial, sans-serif;
        }

        #dashboard {
            margin-top: 70px;
            width: 90%;
            max-width: 1200px;
            border-radius: 10px;
            padding: 40px;
            background-color: white;
            border: 1px solid #ccc;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            margin-left: auto;
            margin-right: auto;
        }

        .section {
            margin-bottom: 30px;
        }

        .section h2 {
            font-size: 28px;
            margin: 0;
            margin-bottom: 10px;
            color: #333;
        }

        .account-info, .recent-transactions {
            display: flex;
            justify-content: space-between;
            gap: 20px;
        }

        .account-info div, .recent-transactions div {
            width: 100%;
            max-width: 300px;
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .action-buttons {
            display: flex;
            gap: 10px;
            margin-top: 20px;
        }

        .action-buttons a,
        .action-buttons button {
            padding: 10px 20px;
            font-size: 16px;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 8px;
            text-decoration: none;
            transition: background-color 0.3s;
        }

        .btn-view {
            background-color: #007BFF;
        }

        .btn-edit {
            background-color: #008080;
        }

        .btn-deposito {
            background-color: #FFC107;
        }

        .btn-delete {
            background-color: #DC3545;
        }

        .btn-view:hover {
            background-color: #0056b3;
        }

        .btn-edit:hover {
            background-color: #008B8B;
        }

        .btn-deposito:hover {
            background-color: #e0a800;
        }


        .btn-delete:hover {
            background-color: #c82333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table th,
        table td {
            padding: 12px 15px;
            text-align: left;
            border: 1px solid #ddd;
        }

        table th {
            background-color: #f4f4f4;
            font-weight: bold;
        }

        table td {
            background-color: #fff;
        }

        .alert {
            background-color: #f8d7da;
            color: #721c24;
            padding: 15px;
            margin-bottom: 20px;
            border: 1px solid #f5c6cb;
            border-radius: 5px;
            font-size: 16px;
        }

        .modal {
            display: none; /* Hidden by default */
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0,0,0,0.5);
            padding-top: 60px;
        }

        .modal-content {
            background-color: #fff;
            margin: 5% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 90%;
            max-width: 500px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
            position: relative;
        }

        .modal-header {
            border-bottom: 1px solid #eee;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }

        .modal-header h2 {
            margin: 0;
            font-size: 24px;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        .modal-body {
            margin-bottom: 20px;
        }

        .modal-body input {
            width: calc(100% - 22px);
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ddd;
            font-size: 16px;
        }

        .modal-footer {
            text-align: right;
        }

        .modal-footer button {
            padding: 10px 20px;
            border-radius: 5px;
            border: none;
            cursor: pointer;
            font-size: 16px;
            margin-left: 10px;
        }

        .btn-save {
            background-color: #007BFF;
            color: white;
        }

        .btn-save:hover {
            background-color: #0056b3;
        }

        .btn-close {
            background-color: #DC3545;
            color: white;
        }

        .btn-close:hover {
            background-color: #c82333;
        }
    </style>
</head>

<body>
    @include('includes.header')

    <div id="dashboard">
        @if(session('success'))
        <div class="alert">
            {{ session('success') }}
        </div>
        @endif

        <div class="section">
            <h2>Conta Corrente</h2>
            <div class="account-info">
                <div>
                    @if($banco->saldo)
                    <h3>Saldo Atual</h3>
                    <p>R$ {{$banco->saldo}}</p>
                    @else
                    <h3>Saldo Atual</h3>
                    <p>R$ 0,00</p>
                    @endif

                </div>
                <div>
                    <h3>Limite de Crédito</h3>
                    <p>R$ 2.000,00</p>
                </div>
                <div>
                    <h3>Data da Última Transação</h3>
                    @if($date)
                    <p>{{$date->data_pagamento}}</p>
                    @else
                    <p>Não há transações</p>
                    @endif
                </div>
            </div>
        </div>

        <div class="section">
            <h2>Transações Recentes</h2>
            <table>
                <thead>
                    <tr>
                        <th>Data</th>
                        <th>Descrição</th>
                        <th>Valor da conta</th>
                        <th>Valor do banco</th>
                        <th>Saldo</th>  
                    </tr>
                </thead>
                <tbody>
                @foreach($transicao as $transi)
                    <tr>
                        <td>{{$transi->data_pagamento}}</td>
                        <td>{{$transi->descricao}}</td>
                        <td>R$ {{$transi->valor_conta}}</td>
                        <td>R$ {{$transi->valor_banco}}</td>
                        <td>R$ {{$transi->valor_final}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <div class="action-buttons">
            <button id="edit-balance-btn" class="btn-edit"><i class="fas fa-pencil-alt"></i> Editar Saldo</button>
        </div>
    </div>

    <div id="edit-balance-modal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <span class="close">&times;</span>
                <h2>Editar Saldo</h2>
            </div>
            <div class="modal-body">
                <form action="editar_saldo" method="POST" id="edit-balance-form">
                    @csrf
                    <label for="new-balance">Novo Saldo:</label>
                    <input type="text" id="new-balance" name="saldo" placeholder="R$ 0,00" required>
               
            </div>
            <div class="modal-footer">
                <button type="submit" form="edit-balance-form" class="btn-save">Atualizar Saldo</button>
                <button class="btn-close close">Fechar</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        var modal = document.getElementById("edit-balance-modal");
        var btn = document.getElementById("edit-balance-btn");
        var span = document.getElementsByClassName("close")[0];

        btn.onclick = function() {
            modal.style.display = "block";
        }

        span.onclick = function() {
            modal.style.display = "none";
        }

        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>
</body>

</html>
