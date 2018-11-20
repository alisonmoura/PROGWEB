<!--
    Material utilizado para as aulas pr�ticas das disciplinas da Faculdade de
Computa��o da Universidade Federal de Mato Grosso do Sul (FACOM / UFMS).
Seu uso � permitido para fins apenas acad�micos, todavia mantendo a
refer�ncia de autoria.
    Created on : 25/10/2010
    Author     : Prof� Jane Eleut�rio
-->

<%@page contentType="text/html" pageEncoding="ISO-8859-1"%>
<!DOCTYPE HTML>

<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="estilo.css"/>
        <title>Edi��o de Usu�rio</title>
    </head>
    <body>
        <h1>Formul�rio de edi��o de Usu�rio</h1>
        <form method="POST" action="${pageContext.request.contextPath}/edita?id=${usuario.getId()}">           
            <input type="hidden" id="id" name="id" value="${usuario.getId()}">

            <p>Nome: <input type="text" name="nome" size="40" value="${usuario.getNome()}"></p>
            <p>Login: <input type="text" name="login" size="40" value="${usuario.getLogin()}"></p>            
            <p>Senha: <input type="password" name="senha" size="10" value="${usuario.getSenha()}"></p>
            <p>
                <input type="submit" value="Salvar">
                <input type="reset" value="Limpar"></p>
        </form>
    </body>
</html>
