/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package dao;

import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import util.MD5Util;

/**
 *
 * @author yrian
 */
public class UsuarioDAO {

    public boolean registrar(String nombre, String correo, String contrasena) throws SQLException {
        String sql = "INSERT INTO usuario (nombre, correo, contrasena) VALUES (?, ?, ?)";

        Connection con = ConexionDB.getConexion();
        PreparedStatement ps = con.prepareStatement(sql);
        ps.setString(1, nombre);
        ps.setString(2, correo);
        ps.setString(3, MD5Util.hashMD5(contrasena));

        int filas = ps.executeUpdate();
        ps.close();
        con.close();
        return filas > 0;
    }

    public boolean login(String correo, String contrasena) throws SQLException {
        String sql = "SELECT contrasena FROM usuario WHERE correo = ?";
        
        Connection con = ConexionDB.getConexion();
        PreparedStatement ps = con.prepareStatement(sql);
        ps.setString(1, correo);
        ResultSet rs = ps.executeQuery();

        if (rs.next()) {
            String hashGuardado = rs.getString("contrasena");
            String hashIngresado = MD5Util.hashMD5(contrasena);
            ps.close();
            con.close();
            return hashGuardado.equals(hashIngresado);
        }
        ps.close();
        con.close();
        return false;
    }

}
