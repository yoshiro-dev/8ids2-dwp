<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Resultado</title>
    </head>
    <body>
        <% String modo = (String) request.getAttribute("modo"); %>

        <% if ("Cifrado RSA".equals(modo)) { %>
            
            <h2>Mensaje enviado con exito</h2>
            <p>El mensaje esta protegido. Si alguien intercepta el chat, solo vera este texto enredado:</p>
            
            <textarea rows="4" cols="70" readonly>${resultado}</textarea>
            
            <br><br>
            <a href="index.jsp">Escribir otro mensaje</a>
            <br><br>
            <hr>
            <a href="novia.jsp">Revisar como lo ve ella -></a>

        <% } else if ("Descifrado RSA".equals(modo)) { %>
            
            <h2>Mensaje revelado</h2>
            <p>Usaste tu Llave Privada. El mensaje original de tu novio es:</p>
            
            <textarea rows="4" cols="70" readonly style="border: 2px solid black;">${resultado}</textarea>
            
            <br><br>
            <a href="novia.jsp">Volver a tu buzon</a>

        <% } else { %>
            <p>Ocurrio un error.</p>
            <a href="index.jsp">Volver al inicio</a>
        <% } %>

    </body>
</html>