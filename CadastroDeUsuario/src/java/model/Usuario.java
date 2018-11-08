/*
 * Material utilizado para as aulas práticas das disciplinas da Faculdade de
Computação da Universidade Federal de Mato Grosso do Sul (FACOM / UFMS).
Seu uso é permitido para fins apenas acadêmicos, todavia mantendo a
referência de autoria.
 */
/**
 * @author Professora Jane Sandim Eleutério
 * @version Outubro/2018
 */
package model;

/**
 *
 * @author Jane
 */
public class Usuario {
    
    private long id;
    private String login;
    private String nome;
    private String senha;

    public Usuario(String login, String nome, String senha) {
        this.login = login;
        this.nome = nome;
        this.senha = senha;
    }
    
    
    

    public void setNome(String nome) {
        this.nome = nome;
    }

    public void setSenha(String senha) {
        this.senha = senha;
    }

    public long getId() {
        return id;
    }

    public String getLogin() {
        return login;
    }

    public String getNome() {
        return nome;
    }

    public String getSenha() {
        return senha;
    }
    
    
    
}
