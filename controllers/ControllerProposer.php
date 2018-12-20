<?php
/**
 * Created by IntelliJ IDEA.
 * User: alyna
 * Date: 02/12/2018
 * Time: 00:26
 */

class ControllerProposer
{

    public function __construct()
    {
        if (isset($url) && count($url) > 1)
            throw  new Exception('Page introuvable');
        else
            require_once('models/utilisateursModel.php');
        session_start();
        if (!UtilisateursModel::verif_session()) {
            header('Location:connexion');
        }
        $this->proposer();
    }

    /**
     * cette fonction permet à un utilisateur de proposer un livre de son choix via un formaulaire
     */
    private function proposer()
    {
        $this->livresModel = new LivresModel;
        if (isset($_POST['retour'])) header('Location:indexuser');
        if (isset($_POST['proposer'])) {
            $proposer = array($_POST['nomlivre'], $_POST['nomauteur'], $_POST['date']);
            if ($this->livresModel->proposer($proposer)) {
                header('Location:indexuser');
            }

        }
        require_once('views/proposer.php');
    }

}