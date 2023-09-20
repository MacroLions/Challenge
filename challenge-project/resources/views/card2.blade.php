<!DOCTYPE html>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tarjeta de Crédito</title>
    <style>
        /* Estilos para la tarjeta de crédito (puedes personalizarlos según sea necesario) */
        .tarjeta {
            border: 1px solid #ccc;
            padding: 20px;
            max-width: 400px;
            margin: 0 auto;
            background-color: #f9f9f9;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .numero-tarjeta {
            font-size: 24px;
            margin-bottom: 10px;
        }
        .nombre-titular {
            font-size: 16px;
            margin-bottom: 5px;
        }
        .fecha-expiracion {
            font-size: 16px;
            margin-bottom: 5px;
        }
    </style>
</head>
<body>
    @include('partials.navbar')
    <div class="tarjeta">
        <div class="numero-tarjeta">**** **** **** 1234</div>
        <div class="nombre-titular">Nombre del Titular</div>
        <div class="fecha-expiracion">Expira: 12/23</div>
        <button class="btn btn-primary">Botón de Bootstrap</button>
    </div>
</body>
</html>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
