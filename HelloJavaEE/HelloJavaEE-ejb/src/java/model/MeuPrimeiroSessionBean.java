/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package model;

import javax.ejb.Stateful;

/**
 *
 * @author alisonmoura
 */
@Stateful(mappedName = "MeuPrimeiroEJB")
public class MeuPrimeiroSessionBean implements MeuPrimeiroSessionBeanLocal {
    
    private int cont = 0;

    @Override
    public String dizOla() {
        return "Olá EJB";
    }

    @Override
    public int retornaContador() {
        cont++;
        return cont;
    }

    // Add business logic below. (Right-click in editor and choose
    // "Insert Code > Add Business Method")
}
