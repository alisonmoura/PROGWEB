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
    <link rel="stylesheet" type="text/css" href="view/estilo.css"/>
</head>
<body>
    <h1>Agenda de Contatos</h1>

    <p>Essa é a lista de contatos de Email cadastrados.</p>

    <?php

    //verifica se o vetor está inicializado e possui contatos
    if (isset($agendaContatos) && count($agendaContatos) >= 1) {
        ?>
        <table>
            <caption>Tabela com contatos cadastrados</caption>
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                <?php
                //navega pelos elementos do vetor e imprime suas propriedades
                foreach ($agendaContatos as $c) {

                    echo "<tr><td> " . $c->getNome() . " </td>";
                    echo "<td> " . $c->getEmail() . " </td></tr>";
                }
                ?>

            </tbody>
            <tfoot>
                <tr>
                    <td colspan="2">Total de contatos: <?php echo count($agendaContatos) ?></td>
                </tr>
            </tfoot>
        </table>
        <?php
    } else {
        ?>
        <p>
            <img alt="ícone de alerta!" src="view/icon/alert.png" height="20" >
            Não há contatos na agenda.
        </p>
        <?php
    }
    ?>
    <p>
        <a href="?">Início</a>
        <a href="?funcao=novo">Novo</a>
    </p>
</body>
</html>
