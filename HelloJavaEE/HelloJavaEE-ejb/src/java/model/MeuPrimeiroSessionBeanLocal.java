/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package model;

import javax.ejb.Local;

/**
 *
 * @author alisonmoura
 */
@Local
public interface MeuPrimeiroSessionBeanLocal {
    
    public String dizOla();
    
    public int retornaContador();
    
}
