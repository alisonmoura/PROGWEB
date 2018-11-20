/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package model;

import java.util.List;
import javax.ejb.CreateException;
import javax.ejb.NoSuchEntityException;
import javax.ejb.EJB;
import javax.ejb.Stateless;

/**
 *
 * @author alisonmoura
 */
@Stateless
public class UsuarioManager implements UsuarioManagerLocal {

    // Add business logic below. (Right-click in editor and choose
    // "Insert Code > Add Business Method")
    
    @EJB
    private UsuarioFacadeLocal usuarioFacede;
    
    @Override
    public boolean criaUsuario(String nome, String login, String senha) throws CreateException {
        Usuario u = usuarioFacede.findByLogin(login);
        if (u == null){ 
            u = new Usuario(nome, login, senha);
            usuarioFacede.create(u);
            return true;
        } else {
            throw new CreateException("Login já cadastrado");
        }
    }

    @Override
    public List<Usuario> listaUsuarios() {
        return usuarioFacede.findAll();
    }
    
    @Override
    public boolean editaUsuario(Long id, String nome, String login, String senha) throws NoSuchEntityException {
        Usuario u = usuarioFacede.find(id);
        
        if (u != null){ 
            u.setNome(nome);
            u.setLogin(login);
            u.setSenha(senha);
            usuarioFacede.edit(u);
            return true;
        } else {
            throw new NoSuchEntityException("Usuário não encontrado");
        }
    }
    
    @Override
    public void removeUsuario(Long id) throws NoSuchEntityException {
        Usuario u = usuarioFacede.find(id);
        
        if (u != null){ 
            usuarioFacede.remove(u);
        } else {
            throw new NoSuchEntityException("Usuário não encontrado");
        }
    }
    
    @Override
    public Usuario buscaPorId(Long id) {
        return usuarioFacede.find(id);
    }
}
