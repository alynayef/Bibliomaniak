<?php
/**
 * Created by IntelliJ IDEA.
 * User: alyna
 * Date: 02/12/2018
 * Time: 01:14
 */

class ControllerGestionLivre
{
    private $livresModel;
    private $livresView;

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
        $this->livres();
    }

    /**
     * cette fonction permet de supprimer et de modifier un livre
     * elle renvoie aussi à la page d'ajout d'un livre
     */

    private function livres()
    {
        $this->livresModel = new LivresModel;
        $test = $this->livresModel->ListerTousLesLivres();
        if (isset($_POST['retour'])) header('Location:indexadmin');

        if (isset($_POST['modifier'])) {
            echo 'ok';
            $this->livresModel->modifierLivre($_POST['reference'][0], $_POST['disponibilite'][0], $_POST['nomauteur'][0], $_POST['nomlivre'][0], $_POST['date'][0]);
            header('Location:gestionlivre');
        }

        if (isset($_POST['supprimer'])) {
            $this->livresModel->supprimerLivre($_POST['reference'][0]);
            header('Location:gestionlivre');
        }
        if (isset($_POST['ajouter'])) {
            header('Location:ajouterlivre');
        }
        require_once('views/gestionlivre.php');
    }

}