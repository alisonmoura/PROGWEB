<%-- 
    Document   : mensagem
    Created on : 01/03/2017, 15:21:19
    Author     : Jane
--%>

<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>JSP Page</title>
    </head>
    <body>
        <h1>Olá EJB!</h1>
        <p>
            ${ola} 
        </p>
        <p>
            Contador: ${contador} 
        </p>
        
        <p>
            <a href="${pageContext.request.contextPath}/inicio">Volta ao início</a>
        </p>
    </body>
</html>
