/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
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
 * @author alisonmoura
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
        String page = "";

        if (request.getRequestURI().endsWith("/inicio")) {
            page = "/inicio.jsp";
        } else if (request.getRequestURI().endsWith("/novo")) {
            page = "/novo.jsp";
        } else if (request.getRequestURI().endsWith("/salva")) {
            salvar(request, response);
        } else if (request.getRequestURI().endsWith("/lista")) {
            page = "/lista.jsp";
        }

        request.getRequestDispatcher(page).forward(request, response);
    }

    private void salvar(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {

        try {
            String nome = request.getParameter("nome");
            String email = request.getParameter("email");
            String senha = request.getParameter("senha");

            Usuario usuario = new Usuario();
            usuario.setNome(nome);
            usuario.setEmail(email);
            usuario.setSenha(senha);

            List<Usuario> usuarios = (List) request.getSession().getAttribute("usuarios");
            usuarios.add(usuario);
            request.getSession().setAttribute("usuarios", usuarios);
            request.setAttribute("success", true);
            request.setAttribute("msg", "Usuário salvo com sucesso!");
            
        } catch (Exception e) {
            request.setAttribute("success", false);
            request.setAttribute("msg", e.getMessage());
        } finally {
            request.getRequestDispatcher("mensagem.jsp").forward(request, response);
        }

    }

    private void listar(HttpServletRequest request) {

        if (request.getSession().getAttribute("usuarios") == null) {
            request.getSession().setAttribute("usuarios", new ArrayList());
        }

        List<Usuario> usuarios = (List) request.getSession().getAttribute("usuarios");
        request.setAttribute("usuarios", usuarios);
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
