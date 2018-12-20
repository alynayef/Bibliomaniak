<?php
require_once ('models/LivresModel.php');
class  ControllerLivres
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
            $this->livres();
    }

    /**
     * cette fonction permet de lister tous les livres
     */
    private  function  livres()
    {
        $this->livresModel = new LivresModel;
        $test = $this->livresModel->ListerTousLesLivres();
        if(isset($_POST['retour'])) header('Location:indexuser');
        require_once ('views/livre.php');
    }
}