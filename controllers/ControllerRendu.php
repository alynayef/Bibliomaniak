<?php
/**
 * Created by IntelliJ IDEA.
 * User: alyna
 * Date: 24/11/2018
 * Time: 21:40
 */

class ControllerRendu
{
    private $livresModel;
    private $livresView;

    public function __construct()
    {
        if(isset($url)&& count($url)>1)
            throw  new Exception('Page introuvable');
        else

            require_once('models/utilisateursModel.php');
        session_start();
        if(!UtilisateursModel::verif_session()){
            header('Location:connexion');
        }
        $this->livresrendu();
    }

    /**
     * cette fonction permet d'enregistrer un rendu de livre
     * Elle rend le livre de nouveau disponible
     */
    private  function  livresrendu()
    {
        $this->livresModel = new LivresModel;
        $test = $this->livresModel->LivreEmprunter($_SESSION['user']);
        require_once ('views/rendre.php');
        if (isset($_POST['retour'])) header('Location:indexuser');
        if (isset($_POST['rendre'])){
            $disponibilite=1;
            echo $this->livresModel->livreRendu($_POST['reference'][0],$_POST['pseudo'][0]);
            echo $this->livresModel->emprunterLivre($_POST['reference'][0],$disponibilite);
            header('Location:rendre');
        }

    }
}