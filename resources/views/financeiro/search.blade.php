<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>search</title>
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
            max-width: 1200px;
            border-radius: 10px;
            padding: 40px;
            background-color: white;
            border: 1px solid #ccc;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            margin-left: auto;
            margin-right: auto;
        }

        #div_superior {
            margin-top: 80px;
            width: 90%;
            max-width: 1200px;
            height: auto;
            min-height: 100px;
            border-radius: 10px;
            padding: 40px;
            background-color: white;
            border: 1px solid #ccc;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            margin-left: auto;
            margin-right: auto;
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: space-between;
            align-items: center;
        }

        .form-group {
            width: 100%;
            max-width: 300px;
        }

        h1 {
            font-size: 36px;
            margin: 0;
        }

        p {
            font-size: 18px;
            color: #666;
        }

        label {
            font-weight: bold;
            margin-top: 10px;
            display: block;
        }

        input[type="text"],
        input[type="date"],
        select {
            width: 100%;
            padding: 10px;
            margin: 10px 0 20px 0;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        input[type="text"]:focus,
        input[type="date"]:focus,
        select:focus {
            border-color: #007BFF;
            box-shadow: 0 2px 8px rgba(0, 123, 255, 0.3);
            outline: none;
        }

        select {
            cursor: pointer;
            background-color: #f8f8f8;
        }

        select:focus {
            background-color: #fff;
        }

        .action-buttons {
            display: flex;
            gap: 10px;
        }

        .action-buttons button,
        a.btn-add,
        a.btn-beck {
            padding: 10px 20px;
            font-size: 16px;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 8px;
            transition: background-color 0.3s;
            text-decoration: none;
        }

        .btn-search {
            background-color: #28a745;
        }

        .btn-search:hover {
            background-color: #218838;
        }

        .btn-beck {
            background-color: #8A2BE2;
            color: white;
        }

        .btn-beck:hover {
            background-color: #9370DB;
        }

        .btn-add {
            background-color: #17a2b8;
        }

        .btn-add:hover {
            background-color: #138496;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 30px;
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

        .btn-view {
            background-color: #007BFF;
            color: white;
        }

        .btn-edit {
            background-color: #FFC107;
            color: white;
        }

        .btn-delete {
            background-color: #DC3545;
            color: white;
        }

        .btn-view:hover,
        .btn-edit:hover,
        .btn-delete:hover {
            opacity: 0.9;
        }

        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgb(0,0,0);
            background-color: rgba(0,0,0,0.4);
            padding-top: 60px;
        }

        .modal-content {
            background-color: #fefefe;
            margin: 5% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            max-width: 600px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
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

        .alert {
            background-color: #f8d7da;
            color: #721c24;
            padding: 15px;
            margin-bottom: 20px;
            border: 1px solid #f5c6cb;
            border-radius: 5px;
            font-size: 16px;
        }
    </style>
</head>

<body>
    @include('includes.header')
    <form action="/search" method="POST">
        @csrf
        <div id="div_superior">
            @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif

            <div class="form-group">
                <label for="descricao">Descrição</label>
                <input type="text" id="descricao" placeholder="Descrição" name="descricao">
            </div>

            <div class="form-group">
                <label for="vencimento">Data de vencimento</label>
                <input type="date" id="vencimento" name="vencimento">
            </div>

            <div class="form-group">
                <label for="status">Status</label>
                <select id="status" name="status">
                    <option value="">Selecione</option>
                    <option value="1">Quitado</option>
                    <option value="2">Em aberto</option>
                </select>
            </div>

            <div class="action-buttons">
                <a href="{{ url('inicio') }}" class="btn-beck"><i class="fas fa-arrow-left"></i>Voltar</a>
                <button type="submit" id="btn-search" class="btn-search"><i class="fas fa-search"></i> Pesquisar</button>
                <a href="{{ url('add_conta') }}" class="btn-add"><i class="fas fa-plus"></i> Adicionar</a>
            </div>
        </div>
    </form>

    <div id="div_body">
        @if($descricao)
            <h1>Resultado da Pesquisa "{{$descricao}}"</h1>
        @elseif($vencimento)
            <h1>Resultado da Pesquisa "{{$vencimento}}"</h1>
        @elseif($status)
            @if($status == 1)
                <h1>Resultado da Pesquisa "Quitado"
            @elseif($status == 2)
                <h1>Resultado da Pesquisa "Em aberto"
            @endif
        </h1>
        @endif

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Descrição</th>
                    <th>Data de Vencimento</th>
                    <th>Data de Pagamento</th>
                    <th>Status</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($result as $resu)
                <tr>
                    <td>{{$resu->id}}</td>
                    <td>{{$resu->descricao}}</td>
                    <td>{{$resu->data_vencimento}}</td>
                    @if($resu->data_pagamento == null)
                    <td>Não foi pago</td>
                    @else
                    <td>{{$resu->data_pagamento}}</td>
                    @endif

                    @if($resu->status == 1)
                    <td>Quitado</td>
                    @elseif($resu->status == 2)
                    <td>Em aberto</td>
                    @else
                    <td>Não foi selecionado</td>
                    @endif
                    <td class="action-buttons">
                        <button onclick="window.location.href='{{ url('ver/' . $resu->id) }}'" class="btn-view"><i class="fas fa-eye"></i> Ver</button>
                        <button onclick="window.location.href='{{ url('edit/' . $resu->id) }}'" class="btn-edit"><i class="fas fa-edit"></i> Editar</button>
                        <button onclick="window.location.href='{{ url('delete/' . $resu->id) }}'" class="btn-delete"><i class="fas fa-trash-alt"></i> Excluir</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>