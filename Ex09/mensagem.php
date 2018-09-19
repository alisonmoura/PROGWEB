<!DOCTYPE html>
<!--
* Material utilizado para as aulas práticas da disciplinas da Faculdade de
* Computação da Universidade Federal de Mato Grosso do Sul (FACOM / UFMS).
* Seu uso é permitido para fins apenas acadêmicos, todavia mantendo a
* referência de autoria.
* @author Profª Jane Eleutério

Página para cadastro de novo contato na agenda.
-->
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Agenda de Contatos</title>
    <link rel="stylesheet" type="text/css" href="estilo.css"/>
</head>
<body>
    <h1>Agenda de Contatos</h1>
    <?php
    if ($sucesso) {
        ?>
        <p><img alt="ícone de sucesso!" src="icon/sucess.png" height="20" > Salvo com sucesso!</p>
        <?php

    } else {
        ?>
        <p><img alt="ícone de alerta!" src="icon/alert.png" height="20" > Não foi salvo.</p>
        <?php
    }
    ?>

    <p>
        <a href="gerenciador.php">Início</a>
    </p>

</body>
</html>
