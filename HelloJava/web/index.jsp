<%-- 
    Document   : index
    Created on : 10/10/2018, 20:08:00
    Author     : alisonmoura
--%>

<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>JSP Page</title>
    </head>
    <body>
        <h1>Hello World!</h1>
        <p>
            <a href="${pageContext.request.contextPath}/ola">Hello</a>
            /
            <a href="${pageContext.request.contextPath}/tchau">Bye</a>
        </p>
    </body>
</html>
