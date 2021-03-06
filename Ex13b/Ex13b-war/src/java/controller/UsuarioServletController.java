/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package controller;

import java.io.IOException;
import java.util.List;
import javax.ejb.CreateException;
import javax.ejb.EJB;
import javax.servlet.ServletException;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import model.Usuario;
import model.UsuarioFacadeLocal;
import model.UsuarioManagerLocal;

/**
 *
 * @author alisonmoura
 */
public class UsuarioServletController extends HttpServlet {

    @EJB
    private UsuarioManagerLocal usuarioManager;

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

        if (request.getRequestURI().endsWith("/inicio") || request.getRequestURI().endsWith("/")) {
            jsp = "index.jsp";
        } else if (request.getRequestURI().endsWith("/novo")) {
            jsp = "novo.jsp";
        } else if (request.getRequestURI().endsWith("/salva")) {
            //... receber dados e salvar
            salva(request);
            jsp = "mensagem.jsp";
        } else if (request.getRequestURI().endsWith("/edita")) {
            //... receber dados e salvar
            edita(request);
            jsp = "mensagem.jsp";
        } else if (request.getRequestURI().endsWith("/telaedicao")) {
            Long id = Long.parseLong(request.getParameter("id"));
            Usuario u = usuarioManager.buscaPorId(id);
            request.setAttribute("usuario", u);
            jsp = "edita.jsp";
        } else if (request.getRequestURI().endsWith("/lista")) {
            lista(request);
            jsp = "lista.jsp";
        } else if (request.getRequestURI().endsWith("/exclui")) {
            exclui(request);
            jsp = "mensagem.jsp";
        }

        request.getRequestDispatcher(jsp).forward(request, response);
    }

    private void salva(HttpServletRequest request) {

        String nome = request.getParameter("nome");
        String login = request.getParameter("login");
        String senha = request.getParameter("senha");

        
        try {
            usuarioManager.criaUsuario(nome, login, senha);
            request.setAttribute("mensagem", "O usuário " + login + " foi salvo com sucesso!");
        } catch (CreateException e) {
            System.out.println(e.getMessage());
            request.setAttribute("mensagem", "Falha ao salvar usuário!");
        }

    }

    private void lista(HttpServletRequest request) {

        List listaUsuarios = usuarioManager.listaUsuarios();
        request.setAttribute("lista", listaUsuarios);
    }
    
    private void edita(HttpServletRequest request) {

        Long id = Long.parseLong(request.getParameter("id"));
     
        String nome = request.getParameter("nome");
        String login = request.getParameter("login");
        String senha = request.getParameter("senha");
        
        try {
            
            usuarioManager.editaUsuario(id, nome, login, senha);
            request.setAttribute("mensagem", "O usuário foi editado com sucesso!");
            
        } catch (Exception e) {
            System.out.println(e.getMessage());
            request.setAttribute("mensagem", "Falha ao editar o usuáio! " + e);
        }
        
    }
    
    private void exclui(HttpServletRequest request) {
         Long id = Long.parseLong(request.getParameter("id"));
        
        try {
            usuarioManager.removeUsuario(id);
            request.setAttribute("mensagem", "O usuário foi removido com sucesso!");
            
        } catch (Exception e) {
            System.out.println(e.getMessage());
            request.setAttribute("mensagem", "Falha ao remover o usuáio! " + e);
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
