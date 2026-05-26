<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Buzon Privado</title>
    </head>
    <body>
        <h2>Tu Buzon Privado</h2>
        <p>Hola. Como tienes la Llave Privada, solo tu puedes leer lo que te enviaron <3</p>

        <div style="border: 1px solid black; padding: 15px; display: inline-block;">
            <h3>Tienes un mensaje nuevo</h3>
            <p>Hay un texto cifrado esperando por ti.</p>
            
            <form action="DecryptServlet" method="get">
                <button type="submit">Descifrar mensaje</button>
            </form>
        </div>

        <br><br>
        <a href="index.jsp">Volver a inicio</a>
    </body>
</html>