<?php
/**
 * Created by IntelliJ IDEA.
 * User: alyna
 * Date: 18/11/2018
 * Time: 23:12
 */

require_once('models/UtilisateursModel.php');

class  ControllerInscription
{

    private $usersModel;
    private $usersView;

    public function __construct()
    {
        if (isset($url) && count($url) > 1)
            throw  new Exception('Page introuvable');
        else ;
        $this->inscription();
    }

    /**
     * Cette fonction permet à un utilisateur de s'inscrire via un formulaire
     * Elle verifie si le mot de passe contient au moins  une lettre majuscule, un caractére special, une lettre minuscule, et un chiffre
     */
    public function inscription()
    {
        require_once('views/inscription.php');
        if (isset($_POST['inscription'])) {
            if (!empty($_POST['nom']) && !empty($_POST['pseudo']) && !empty($_POST['mdp']) && !empty($_POST['email'])) {
                $domain = '([a-z0-9]([-a-z0-9]*[a-z0-9]+)?)';
                if (preg_match($domain, $_POST['mdp']) && strlen($_POST['mdp']) > 5) {
                    if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                        $users = array($_POST['nom'], $_POST['pseudo'], $_POST['mdp'], $_POST['email']);
                        $this->usersModel = new UtilisateursModel();
                        $resultat = $this->usersModel->inscription($users);
                        if ($resultat) header('Location:connexion');
                        else echo 'le pseudo ou adresse email existe deja';
                    } else
                        echo 'Cet email a un format non adapté.';
                } else
                    echo 'votre mots de passe doit contenir au moins une lettre majuscule, une lettre minuscule, un caractere special et un chiffre
                          Elle doit etre une longueur minimal de 6 caracteres';
            }

        }


    }




}

?>

