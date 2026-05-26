<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Mensaje Secreto</title>
    </head>
    <body>
        <h2>Para mi novia</h2>
        <p>Escribe tu mensaje secreto. Se cifrara con su Llave Publica para que nadie mas lo lea :)</p>

        <form action="EncryptServlet" method="post">
            <label>Mensaje:</label><br>
            <input type="text" name="mensaje" required size="50"><br><br>
            <button type="submit">Cifrar y Enviar</button>
        </form>

        <hr style="margin-top: 30px;">
        <p><a href="novia.jsp">Ir al buzon de ella -></a></p>
    </body>
</html>