/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package model;

import java.util.List;
import javax.ejb.CreateException;
import javax.ejb.Local;
import javax.ejb.NoSuchEntityException;

/**
 *
 * @author alisonmoura
 */
@Local
public interface UsuarioManagerLocal {
    
    boolean criaUsuario(String nome, String login, String senha) throws CreateException;
    List<Usuario> listaUsuarios();
    boolean editaUsuario(Long id, String nome, String login, String senha) throws NoSuchEntityException;
    void removeUsuario(Long id) throws NoSuchEntityException;
    Usuario buscaPorId(Long id);
    
}
