<%-- 
    Document   : calculadora
    Created on : 24/10/2018, 19:29:50
    Author     : alisonmoura
--%>

<%@page contentType="text/html" pageEncoding="UTF-8"%>
<%@taglib uri="http://java.sun.com/jsp/jstl/core" prefix="c"%>
<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Calculadora</title>
    </head>
    <body>
        <h1>Calculadora</h1>
        
        <form method="post">
            
            <label for="valorA">Valor A</label>
            <input id="valorA" name="valorA" type="number" placeholder="Digíte o valor A">
            
            <label for="valorB">Valor B</label>
            <input id="valorB" name="valorB" type="number" placeholder="Digíte o valor B">
            
            <label for="selectOp">Tipo da Operação</label>
            <select id="selectOp" name="operacao">
                <option value="+">+</option>
                <option value="-">-</option>
                <option value="*">*</option>
                <option value="/">/</option>
            </select>
            
            <input type="submit" value="Calcular" name="calcula">
            <input type="reset" value="Limpar Formulário">
            
        </form>

        <c:if test="${not empty resultado}">
            <p>Resultado: ${resultado}</p>
        </c:if>
            
        <p><a href="${pageContext.request.contextPath}/historico">Ver histórico</a></p>
        
    </body>
</html>
