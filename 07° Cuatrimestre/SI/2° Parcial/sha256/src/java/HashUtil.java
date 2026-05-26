/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
import java.security.MessageDigest;
import java.security.NoSuchAlgorithmException;
/**
 *
 * @author yrian
 */
public class HashUtil {
    public static String generarSHA256 (String texto){
        try {
            MessageDigest md = MessageDigest.getInstance("SHA-256");
            byte[] hash = md.digest(texto.getBytes("UTF-8"));
            
            StringBuilder hexString = new StringBuilder();
            for (byte b : hash){
                hexString.append(String.format("%02x", b));
            }
            
            return hexString.toString();
            
            } catch (Exception e) {
                throw new RuntimeException("Error generando SHA-256");
        }
    }
}
