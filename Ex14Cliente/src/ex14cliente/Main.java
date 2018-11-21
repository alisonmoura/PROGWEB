/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package ex14cliente;

/**
 *
 * @author alisonmoura
 */
public class Main {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        System.out.println("O resultado é: " + soma(30, 45));
    }

    private static int soma(int a, int b) {
        wsclient.CalculoBasico_Service service = new wsclient.CalculoBasico_Service();
        wsclient.CalculoBasico port = service.getCalculoBasicoPort();
        return port.soma(a, b);
    }
    
}
