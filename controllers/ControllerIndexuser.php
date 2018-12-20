<?php
/**
 * Created by IntelliJ IDEA.
 * User: alyna
 * Date: 18/11/2018
 * Time: 02:16
 */
class  ControllerIndexuser
{
    /**
     * uvre la session et renvoie sur la page des utilisateur apres connexion
     * ControllerIndexuser constructor.
     * @throws Exception
     */
    public function __construct()
    {
        if (isset($url) && count($url) > 1)
            throw  new Exception('Page introuvable');
        else{
            require_once('models/utilisateursModel.php');
            session_start();
            if(!UtilisateursModel::verif_session()){
                header('Location:connexion');
            }else{
                if($_SESSION['user']=='admin_root'){
                    header('Location:indexadmin');
                }
                require_once('views/indexuser.php');
            }

        }

    }
}

?>