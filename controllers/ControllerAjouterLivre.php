<?php
/**
 * Created by IntelliJ IDEA.
 * User: alyna
 * Date: 06/12/2018
 * Time: 14:18
 */

class ControllerAjouterLivre
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
        $this->ajouter();
    }

    /**
     * permet l'ajout d'un nouveau livre dans la base de données
     * Elle recupére les valeurs du formulaire
     **/
    private function ajouter()
    {
        $this->livresModel = new LivresModel;
        if(isset($_POST['retour']))  header('Location:indexadmin');
        if(isset($_POST['ajouter'])){
            $tableau_element = array($_POST['reference'],$_POST['nomlivre'], $_POST['nomauteur'], $_POST['date']);
            var_dump($this->livresModel->ajouterLivre($tableau_element));
            header('Location:gestionlivre');
        }
        require_once('views/ajouterlivre.php');
    }
}