
import java.io.IOException;
import java.io.PrintWriter;        
import java.security.KeyPair;
import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import javax.servlet.http.HttpSession;

/**
 *
 * @author CA06-7
 */
@WebServlet(urlPatterns = {"/EncryptServlet"})
public class EncryptServlet extends HttpServlet {

    /**
     * Processes requests for both HTTP <code>GET</code> and <code>POST</code>
     * methods.
     *
     * @param request servlet request
     * @param response servlet response
     * @throws ServletException if a servlet-specific error occurs
     * @throws IOException if an I/O error occurs
     */
    protected void processRequest(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        response.setContentType("text/html;charset=UTF-8");
        try (PrintWriter out = response.getWriter()) {
            out.println("<!DOCTYPE html>");
            out.println("<html>");
            out.println("<head>");
            out.println("<title>Servlet EncryptServlet</title>");
            out.println("</head>");
            out.println("<body>");
            out.println("<h1>Servlet EncryptServlet at " + request.getContextPath() + "</h1>");
            out.println("</body>");
            out.println("</html>");
        }
    }

    /**
     * Handles the HTTP <code>GET</code> method.
     *
     * @param request servlet request
     * @param response servlet response
     * @throws ServletException if a servlet-specific error occurs
     * @throws IOException if an I/O error occurs
     */
    @Override
    protected void doGet(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        processRequest(request, response);
    }

    /**
     * Handles the HTTP <code>POST</code> method.
     *
     * @param request servlet request
     * @param response servlet response
     * @throws ServletException if a servlet-specific error occurs
     * @throws IOException if an I/O error occurs
     */
    @Override
    protected void doPost(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {

        String mensaje = request.getParameter("mensaje");

        try {
            KeyPair keyPair = RSAUtil.generateKeyPair();

            HttpSession session = request.getSession();
            session.setAttribute("publicKey", keyPair.getPublic());
            session.setAttribute("privateKey", keyPair.getPrivate());

            String cifrado = RSAUtil.encrypt(mensaje, keyPair.getPublic());
            session.setAttribute("mensajeCifrado", cifrado);

            request.setAttribute("resultado", cifrado);
            request.setAttribute("modo", "Cifrado RSA");
            request.getRequestDispatcher("resultado.jsp").forward(request, response);

        } catch (Exception e) {
            throw new ServletException(e);
        }
    }

    /**
     * Returns a short description of the servlet.
     *
     * @return a String containing servlet description
     */
    @Override
    public String getServletInfo() {
        return "Short description";
    }

}
