<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<style>
      .nav-bar {
            position: fixed;
            top: 0;
            left: 0;
            width: 98%;
            padding: 10px 20px;
            background-color: black;
            color: white;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            display: flex;
            justify-content: space-between;
            align-items: center;
            z-index: 1000;
            border-bottom: 2px solid #333;
        }

        .nav-bar h2 {
            margin: 0;
            font-size: 22px;
            font-weight: 600;
            letter-spacing: 1px;
        }

        .nav-bar .nav-links {
            display: flex;
            gap: 20px;
        }

        .nav-bar .nav-links a {
            text-decoration: none;
            color: white;
            font-size: 16px;
            font-weight: 500;
            position: relative;
            transition: color 0.3s ease, transform 0.3s ease;
            padding: 5px 10px;
            letter-spacing: 0.5px;
        }

        .nav-bar .nav-links a::before {
            content: "";
            position: absolute;
            left: 0;
            bottom: -3px;
            width: 100%;
            height: 2px;
            background-color: #0033a0;
            transform: scaleX(0);
            transition: transform 0.3s ease;
            transform-origin: bottom right;
        }

        .nav-bar .nav-links a:hover::before {
            transform: scaleX(1);
            transform-origin: bottom left;
        }

        .nav-bar .nav-links a:hover {
            color: #00aaff;
            transform: translateY(-2px);
        }
</style>

<body>
    <div class="nav-bar">
        <h2>Central de contas</h2>
        <div class="nav-links">
            <a href="/banco">Banco</a>
            <a href="/inicio">Contas a pagar</a>
            <a href="/logout">Sair</a>
        </div>
    </div>
</body>

</html>
