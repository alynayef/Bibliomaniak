<?php
/**
 * Created by IntelliJ IDEA.
 * User: alyna
 * Date: 02/12/2018
 * Time: 01:14
 */

class ControllerUtilisateurs
{
    private $utilisateur;
    private $utilisateurViews;

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
        $this->Utilisateurs();
    }

    /**
     * cette fonction permet de supprimer et de modifier un utilisateur
     */

    private function utilisateurs()
    {
        $this->utilisateur = new UtilisateursModel();
        $test = $this->utilisateur->ListerTousLesUtilisateurs();
        $mdp = $_POST['mdp'][0];
        $email = $_POST['email'][0];
        $pseudo = $_POST['pseudo'][0];
        if (isset($_POST['retour'])) header('Location:indexadmin');
        if (isset($_POST['modifier'])) {
          $this->utilisateur->modifierUtilisateur($pseudo,$mdp,$email);
            header('Location:utilisateurs');
        }

        if (isset($_POST['supprimer'])) {
            $this->utilisateur->supprimerUtilisateur($pseudo);
            header('Location:utilisateurs');
        }
        require_once('views/utilisateurs.php');
    }

}