<?php
class  ControllerConnexion
{
    private $livresModel;
    private $livresView;

    public function __construct()
    {
        if(isset($url)&& count($url)>1)
            throw  new Exception('Page introuvable');
        else
            $this->connexion();
    }

    /**
     * Cette fonction verifie le mot de passe et le pseudo de l'utilisateur dans la base
     * Elle récupére les valeurs à partir du formulaire
     * Et renvoie l'utilisateur ou l'administrateur sur la bonne page index
     */
    public function connexion()
    {
        error_reporting(E_ERROR | E_WARNING | E_PARSE);
        require_once('views/connexion.php');
        if (isset($_POST['connexion'])) {
            if (!empty($_POST['pseudo']) && !empty($_POST['mdp'])) {
                $users = array($_POST['pseudo'], $_POST['mdp']);
                $this->usersModel = new UtilisateursModel();
                $resultat = $this->usersModel->connexion($users);
                echo $resultat;
            }
        }
    }

}
?>
