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
package controller;

import java.io.IOException;
import java.util.ArrayList;
import java.util.List;
import javax.servlet.ServletException;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import model.Usuario;

/**
 *
 * @author Jane
 */
public class UsuarioServletController extends HttpServlet {

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
        
        String jsp = null;

        if (request.getRequestURI().endsWith("/inicio")) {
            jsp = "index.jsp";
        } else if (request.getRequestURI().endsWith("/novo")) {
            jsp = "novo.jsp";
        } else if (request.getRequestURI().endsWith("/salva")) {
            //... receber dados e salvar
            salva(request);
            jsp = "mensagem.jsp";
        } else if (request.getRequestURI().endsWith("/lista")) {
            //... prepara a lista
            lista(request);
            jsp = "lista.jsp";
        }

        request.getRequestDispatcher(jsp).forward(request, response);
    }
    
    
    private void salva(HttpServletRequest request) {

        String nome = request.getParameter("nome");
        String login = request.getParameter("login");
        String senha = request.getParameter("senha");

        Usuario novoUser = new Usuario(login, nome, senha);

        if (request.getSession().getAttribute("registro") == null) {
            List<Usuario> reg = new ArrayList<>();
            request.getSession().setAttribute("registro", reg);
        }

        List registro = (List) request.getSession().getAttribute("registro");

        registro.add(novoUser);

        request.setAttribute("mensagem", "O usuário " + login + " foi salvo com sucesso!");

    }

    private void lista(HttpServletRequest request) {

        if (request.getSession().getAttribute("registro") == null) {
            List<Usuario> reg = new ArrayList<>();
            request.getSession().setAttribute("registro", reg);
        }

        List registro = (List) request.getSession().getAttribute("registro");

        request.setAttribute("lista", registro);
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
        processRequest(request, response);
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
