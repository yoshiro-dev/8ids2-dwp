/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/JSP_Servlet/Servlet.java to edit this template
 */

import javax.servlet.annotation.MultipartConfig;
import javax.servlet.http.Part;
import java.io.IOException;
import java.io.PrintWriter;
import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

/**
 *
 * @author yrian
 */
@MultipartConfig
@WebServlet(urlPatterns = {"/FileServlet"})
public class FileServlet extends HttpServlet {

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
            /* TODO output your page here. You may use following sample code. */
            out.println("<!DOCTYPE html>");
            out.println("<html>");
            out.println("<head>");
            out.println("<title>Servlet FileServlet</title>");
            out.println("</head>");
            out.println("<body>");
            out.println("<h1>Servlet FileServlet at " + request.getContextPath() + "</h1>");
            out.println("</body>");
            out.println("</html>");
        }
    }

    // <editor-fold defaultstate="collapsed" desc="HttpServlet methods. Click on the + sign on the left to edit the code.">
    /**
     * Handles the HTTP <code>GET</code> method.
     *
     * @param request servlet request
     * @param response servlet response
     * @throws ServletException if a servlet-specific error occurs
     * @throws IOException if an I/O error occurs
     */
    /* @Override
     protected void doGet(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        processRequest(request, response);
    } */
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

        Part filePart1 = request.getPart("archivo-1");
        Part filePart2 = request.getPart("archivo-2");

        String nombreArchivo1 = filePart1.getSubmittedFileName();
        String nombreArchivo2 = filePart2.getSubmittedFileName();

        byte[] bytes1 = filePart1.getInputStream().readAllBytes();
        byte[] bytes2 = filePart2.getInputStream().readAllBytes();

        String passwordHash1 = FileUtil.generarSHA256(bytes1);
        String passwordHash2 = FileUtil.generarSHA256(bytes2);

        System.out.println("Archivo1: " + nombreArchivo1);
        System.out.println("Hash Archivo1: " + passwordHash1);
        System.out.println("Archivo2: " + nombreArchivo2);
        System.out.println("Hash Archivo2: " + passwordHash2);

        response.setContentType("text/plain");
        PrintWriter out = response.getWriter();

        out.println("Archivo 1: " + nombreArchivo1);
        out.println("Hash SHA-256: " + passwordHash1);
        out.println("");
        out.println("Archivo 2: " + nombreArchivo2);
        out.println("Hash SHA-256: " + passwordHash2);
        out.println("");

        if (passwordHash1.equals(passwordHash2)) {
            out.println("Los archivos son IGUALES");
        } else {
            out.println("Los archivos son DIFERENTES");
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
    }// </editor-fold>

}
