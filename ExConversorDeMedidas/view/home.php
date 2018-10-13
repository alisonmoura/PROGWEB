<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Conversor de Medidas</title>
    <link rel="stylesheet" href="view/style.css">
</head>

<body>

    <form action="?page=home&action=calculate" method="post">
        <h1>Conversor de Medidas</h1>
        <div>
            <select name="from" id="from">
                <option value="" selected>Selecione a medida</option>
                <option value="inch">Polegadas</option>
                <option value="cent">Centímetros</option>
            </select>
        </div>
        <div>
            <select name="to" id="to">
                <option value="" selected>Selecione a medida</option>
                <option value="inch">Polegadas</option>
                <option value="cent">Centímetros</option>
            </select>
        </div>
        <div>
            <input type="number" name="value" id="value" placeholder="Valor">
        </div>
        <div>
            <button>Calcula</button>
        </div>
        <div>
            <p>Resultado:
                <strong>
                    <?= $result?>
                </strong>
            </p>
        </div>
    </form>

</body>

</html>