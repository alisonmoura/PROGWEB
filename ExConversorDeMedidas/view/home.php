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

    <?php if(isset($message)) {?>
    <div class="alert <?= $message->type?>">
        <p>
            <?= $message->message?>
        </p>
    </div>
    <?php }?>

    <form class="convertion-form" action="?page=home&action=calculate" method="post">
        <h1>Conversor de Medidas</h1>
        <select name="from" id="from">
            <option value="" selected>Selecione a medida</option>
            <?php foreach ($convertions as $c) { ?>
            <option value="<?= $c->getUnityFrom()?>">
                <?= $c->getUnityFrom()?>
            </option>
            <?php } ?>
        </select>
        <select name="to" id="to">
            <option value="" selected>Selecione a medida</option>
            <?php foreach ($convertions as $c) { ?>
            <option value="<?= $c->getUnityTo()?>">
                <?= $c->getUnityTo()?>
            </option>
            <?php } ?>
        </select>
        <input type="number" name="value" id="value" placeholder="Valor">
        <button>Calcular</button>
        <p class="result">Resultado:
            <strong>
                <?= $result?>
            </strong>
        </p>
    </form>

    <section class="historic">
        <h2>Histórico de Conversão</h2>
        <?php foreach ($historic as $h) { ?>
        <div>
            De:
            <?= $h->getValueFrom()?>
            <?= $h->getUnityFrom()?>
            Para:
            <?= $h->getValueTo()?>
            <?= $h->getUnityTo()?>
        </div>
        <?php } ?>
    </section>

</body>

</html>