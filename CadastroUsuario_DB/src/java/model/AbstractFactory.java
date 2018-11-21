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

import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.SQLException;

/**
 *
 * @author Jane
 */
public abstract class AbstractFactory {

    private final String database = "jdbc:derby://localhost:1527/UsuarioDB";
    private final String user = "alison";
    private final String password = "123";

    protected Connection conn;

    public AbstractFactory() {
        try {

            conn = DriverManager.getConnection(database + ";user="
                    + user + ";password=" + password);

            System.out.println("Conectado com sucesso...");

        } catch (SQLException ex) {
            System.out.println("Ocorreu um erro. " + ex);
        }
    }

}
