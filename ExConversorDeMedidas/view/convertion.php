<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Conversão</title>
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

    <form class="back-form" action="?page=home">
        <button type="submit">Voltar</button>
    </form>

    <form class="convertion-form" action="?page=convertion&action=create" method="post">
        <h1>Cadastro de Conversão</h1>
        <input type="text" name="from" id="from" placeholder="Nome da medida de origem">
        <input type="text" name="to" id="to" placeholder="Nome da medida de destino">
        <input type="number" step="any" name="value" id="value" placeholder="1 unidade do valor da medida de origem equivale a quantas unidades da medida de destino">
        <button type="submit">Salvar</button>
        <button type="clean" class="danger">Cancelar</button>
    </form>

    <section class="historic">
        <h2>Conversões cadastradas</h2>
        <?php foreach ($convertions as $c) { ?>
        <div>
            De
            <strong>
                <?= $c->getUnityFrom()?>
            </strong>
            para
            <strong>
                <?= $c->getUnityTo()?>
            </strong>
        </div>
        <?php } ?>
    </section>

</body>

</html>