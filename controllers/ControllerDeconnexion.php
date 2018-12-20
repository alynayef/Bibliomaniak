<?php
/**
 * Created by IntelliJ IDEA.
 * User: alyna
 * Date: 24/11/2018
 * Time: 20:23
 */

class ControllerDeconnexion
{
    /**
     * ControllerDeconnexion constructor.
     * Detruit la session et renvoie l'utilisateur à la page de connexion
     * @throws Exception
     */
    public function __construct()
    {
        if(isset($url)&& count($url)>1)
            throw  new Exception('Page introuvable');
        else{
            session_destroy();
            header('Location:connexion');
        }

    }

}