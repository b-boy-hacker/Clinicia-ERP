<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pago con Tarjeta</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h2 class="mt-4">Pago con Tarjeta</h2>
        <form action="{{ route('procesar-pago') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="card_number">Número de Tarjeta</label>
                <input type="text" class="form-control" id="card_number" name="card_number" required>
            </div>
            <div class="form-group">
                <label for="expiry_date">Fecha de Expiración (MM/YY)</label>
                <input type="text" class="form-control" id="expiry_date" name="expiry_date" required>
            </div>
            <div class="form-group">
                <label for="cvv">CVV</label>
                <input type="text" class="form-control" id="cvv" name="cvv" required>
            </div>
            <button type="submit" class="btn btn-primary">Procesar Pago</button>
        </form>
    </div>
</body>
</html>