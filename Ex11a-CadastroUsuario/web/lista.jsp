<%-- 
    Document   : lista
    Created on : 24/10/2018, 22:08:40
    Author     : alisonmoura
--%>

<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="css/estilo.css">
        <title>Cadastro de Usuário - Lista de Usuários</title>
    </head>
    <body>
        <h1>Usuários Cadastrados</h1>

        <c:choose>
            <c:when test="${empty usuarios}">
                <p>- Não há usuários registrados </p>
            </c:when>
            <c:otherwise>

                <c:forEach var="u" items="${usuarios}">
                    <p> ${u.nome} </p>
                </c:forEach>

            </c:otherwise>
        </c:choose>
        <p>
            <a href="${pageContext.request.contextPath}/inicio">Retornar ao início</a> 
            /
            <a href="${pageContext.request.contextPath}/novo">Cadastrar outro usuário</a>
        </p>
    </body>
</html>
