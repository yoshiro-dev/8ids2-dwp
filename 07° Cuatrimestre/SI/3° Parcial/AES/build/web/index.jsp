<%-- 
    Document   : index
    Created on : 23 mar. 2026, 16:09:51
    Author     : CA06-7
--%>

<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>JSP Page</title>
    </head>
    <body>
        <h1>Seguridad informática</h1>
        <h2> Cifrado AES-128</h2>
        <form action="EncryptServlet" method="post">
            Mensaje: <input type="text" name="mensaje" required>
            <button type="submit"> Cifrar</button>
        </form>
        <br>
        <a href="DecryptServlet">Descifrar último mensaje </a>
    </body>
</html>
