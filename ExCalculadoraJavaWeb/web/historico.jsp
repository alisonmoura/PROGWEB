<%-- 
    Document   : historico
    Created on : 24/10/2018, 20:57:48
    Author     : alisonmoura
--%>

<%@page contentType="text/html" pageEncoding="UTF-8"%>
<%@taglib prefix="c" uri="http://java.sun.com/jsp/jstl/core" %>
<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Histórico de Calculos</title>
    </head>
    <body>

        <h1>Histórico</h1>


        <c:choose>
            <c:when test="${empty historico}">
                <p>- Não há calculos registrados no histórico </p>
            </c:when>
            <c:otherwise>

                <c:forEach var="op" items="${historico}">
                    <p> ${op} </p>
                </c:forEach>

            </c:otherwise>
        </c:choose>
        <p>
            <a href="${pageContext.request.contextPath}/calcula">Retornar à Calculadora</a> 
            /
            <a href="${pageContext.request.contextPath}/limpa">Apaga o Histórico</a>
        </p>
    </body>
</html>
