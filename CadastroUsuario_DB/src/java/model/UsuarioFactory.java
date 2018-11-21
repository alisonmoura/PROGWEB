/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package model;

import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;
import java.util.ArrayList;
import java.util.List;
import java.util.logging.Level;
import java.util.logging.Logger;

/**
 *
 * @author alisonmoura
 */
public class UsuarioFactory extends AbstractFactory{

    public UsuarioFactory() {
        super();
    }
    
    public List lista() {
        List<Usuario> lista = new ArrayList<>();
        String sql = "SELECT * FROM TB_USUARIO";
        try {
            Statement st = conn.createStatement();
            ResultSet result = st.executeQuery(sql);
            while(result.next()){
                String nome = result.getString("nome");
                String login = result.getString("login");
                String senha = result.getString("senha");
                Long id = result.getLong("id");
                Usuario usu = new Usuario(login, nome, senha, id);
                
                lista.add(usu);
            }
        } catch (SQLException ex) {
            Logger.getLogger(UsuarioFactory.class.getName()).log(Level.SEVERE, null, ex);
        }
        return lista;
    }
    
    public boolean salva(String login, String nome, String senha) {
        try {
            Statement statement = conn.createStatement();
            String sql = "INSERT INTO TB_USUARIO (nome, login, senha) VALUES ('"
                    + nome + "', '"
                    + login + "', '"
                    + senha + "')";
            statement.execute(sql);
            return true;
        } catch (Exception e) {
            System.out.println("Erro ao salvar usuario: " + e.getMessage());
            return false;
        }
    }
    
}
