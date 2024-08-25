<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Conta</title>
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

        .form-group {
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
            display: block;
            margin-bottom: 10px;
        }

        input[type="text"],
        input[type="date"],
        select,
        input[type="file"] {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        input[type="text"]:focus,
        input[type="date"]:focus,
        select:focus,
        input[type="file"]:focus {
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
            justify-content: center;
            gap: 20px;
            margin-top: 30px;
        }

        .action-buttons button {
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

        .action-buttons {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 30px;
        }

        .btn-back,
        .btn-edit,
        .btn-trash {
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
        <h1>Editar Conta</h1>
        <form action="/editar_fatura/{{$contas->id}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="descricao">Descrição</label>
                <input type="text" id="descricao" name="descricao" placeholder="Descrição" value="{{$contas->descricao}}"required>
            </div>
            <div class="form-group">
                <label for="vencimento">Data de Vencimento</label>
                <input type="date" id="vencimento" name="vencimento" value="{{$contas->data_vencimento}}">
            </div>
            <div class="form-group">
                <label for="pagamento">Data de Pagamento</label>
                <input type="date" id="pagamento" name="pagamento" value="{{$contas->data_pagamento}}">
            </div>
            <div class="form-group">
                <label>Valor</label>
                <input type="text" id="valor" name="valor"  placeholder="Valor" value="{{$contas->valor}}">
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                @if($contas->status == 1)
                <select id="status" name="status">
                    <option value="1">Quitado</option>
                    <option value="">Selecione</option>
                    <option value="2">Em aberto</option>
                </select>
                @elseif($contas->status == 2)
                <select id="status" name="status">
                    <option value="2">Em aberto</option>
                    <option value="">Selecione</option>
                    <option value="1">Quitado</option>
                    </select>
                
                @else
                <select id="status" name="status">
                    <option value="">Selecione</option>
                    <option value="1">Quitado</option>
                    <option value="2">Em aberto</option>
                    </select>
                    @endif


            </div>
            <div class="form-group">
                <label for="comprovante">Comprovante de Pagamento (Imagem)</label>
                <input type="file" id="comprovante" name="comprovante" accept="image/*">
            </div>
            <div class="action-buttons">
                <a href="/inicio" class="btn-back"><i class="fas fa-arrow-left"></i> Voltar</a>
                <button type="submit" href="#" class="btn-edit"><i class="fas fa-edit"></i> Editar</button>
                <button onclick="alerta({{$contas->id}})" class="btn-trash"><i class="fas fa-trash"></i> Excluir</button>

        </div>
        </form>
    </div>
</body>

</html>
<script>

    function alerta(id){
          confirmado = confirm('Tem Certeza Que deseja exluir??')
            if(confirmado){
                window.location.href = "{{ url('excluir_conta') }}/" + id;
                alert('Excluido')
            }else{
                window.location.href = "{{ url('editar') }}/" + id;
                console.log(id)
                alert('Operação Cancelada')
            }
    }    
</script>
