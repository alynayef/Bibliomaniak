<?php
/**
 * Created by IntelliJ IDEA.
 * User: alyna
 * Date: 18/11/2018
 * Time: 02:16
 */
class  ControllerIndexadmin
{
    /**
     * ouvre la session et renvoie sur la page des administrateur apres connexion
     * ControllerIndexadmin constructor.
     * @throws Exception
     */
    public function __construct()
    {
        if (isset($url) && count($url) > 1)
            throw  new Exception('Page introuvable');
        else
            require_once('models/utilisateursModel.php');
            session_start();
            if(!UtilisateursModel::verif_session()){
            header('Location:connexion');
            }else {
                if ($_SESSION['user'] != 'admin_root') {
                    header('Location:indexuser');
                }
                require_once('views/indexadmin.php');
            }
    }
}

?>