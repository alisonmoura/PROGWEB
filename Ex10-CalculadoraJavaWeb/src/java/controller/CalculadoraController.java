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

/**
 *
 * @author alisonmoura
 */
public class CalculadoraController extends HttpServlet {

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
        String jsp = "";

        if (request.getRequestURI().endsWith("/calcula")) {
            calcula(request);
            jsp = "/calculadora.jsp";
        } else if (request.getRequestURI().endsWith("/historico")) {
            historico(request);
            jsp = "/historico.jsp";
        } else if (request.getRequestURI().endsWith("/limpa")) {
            limpa(request);
            jsp = "/historico.jsp";
        }

        request.getRequestDispatcher(jsp).forward(request, response);
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

    private void calcula(HttpServletRequest request) {

        if (request.getParameter("calcula") != null) {

            float valorA = Float.valueOf(request.getParameter("valorA"));
            float valorB = Float.valueOf(request.getParameter("valorB"));
            float result = 0;

            String op = request.getParameter("operacao");

            switch (op) {
                case "+":
                    result = valorA + valorB;
                    break;
                case "-":
                    result = valorA - valorB;
                    break;
                case "*":
                    result = valorA * valorB;
                    break;
                case "/":
                    result = valorA / valorB;
                    break;
            }

            if (request.getSession().getAttribute("historico") == null) {
                request.getSession().setAttribute("historico", new ArrayList());
            }

            
            String calculo = valorA + " " + op + " " + valorB + " = " + result;
            
            List hist = (List) request.getSession().getAttribute("historico");
            hist.add(calculo);
            request.getSession().setAttribute("historico", hist);
            
            request.setAttribute("historico", hist);
            request.setAttribute("resultado", calculo);

        }

    }

    private void historico(HttpServletRequest request) {
        
        if (request.getSession().getAttribute("historico") == null) {
            request.getSession().setAttribute("historico", new ArrayList());
        }

        List hist = (List) request.getSession().getAttribute("historico");
        request.setAttribute("historico", hist);
    }

    private void limpa(HttpServletRequest request) {
        request.getSession().setAttribute("historico", new ArrayList());
        request.getSession().invalidate();
    }

}
