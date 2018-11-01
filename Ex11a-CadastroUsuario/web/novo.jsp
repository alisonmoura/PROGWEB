<%-- 
    Document   : novo
    Created on : 24/10/2018, 22:07:59
    Author     : alisonmoura
--%>

<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="css/estilo.css">
        <title>Cadastro Usuário - Novo Usuário</title>
    </head>
    <body>
        <h1>Novo Usuário</h1>
        <form action="salva" method="post">
            <label for="nome">Nome: </label> <input id="nome" type="text" placeholder="Nome do usuário">
            <label for="email">Email: </label> <input id="email" type="email" placeholder="Email do usuário">
            <label for="senha">Senha: </label> <input id="senha" type="password" placeholder="Senha do usuário">
            <button>Salvar</button>
        </form>
    </body>
</html>
