import java.io.IOException;
import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

@WebServlet(name = "MD5Servlet", urlPatterns = {"/MD5Servlet"})
public class MD5Servlet extends HttpServlet {

    @Override
    protected void doPost(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {

        String texto   = request.getParameter("texto");
        String hashMD5 = MD5Util.generarMD5(texto);

        response.setContentType("text/plain");
        response.getWriter().write("MD5: " + hashMD5);
    }
}