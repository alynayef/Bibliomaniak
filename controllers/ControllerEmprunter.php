<?php
require_once ('models/LivresModel.php');
class  ControllerEmprunter
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
            $this->emprunter();
    }

    /**
     * Cette fonction permet d'enregistrer l'emprunt d'un livre
     * Elle enregistre le livre dans les livres à rendre
     * Le livre sera indisponible jusqu'à ce qu'elle soit rendu
     */
    private  function  emprunter()
    {
        $this->livresModel = new LivresModel;
        $test = $this->livresModel->Livredisponible();

        if (isset($_POST['emprunter'])){
            $reference = $_POST['reference'][0];
            $pseudo = $_SESSION['user'];
            $nomlivre = $_POST['nomlivre'][0];
            $disponibilite = 0;
            $this->livresModel->emprunterUnLivre($reference,$pseudo,$nomlivre);
            $this->livresModel->emprunterLivre($reference,$disponibilite);
            header('Location:emprunter');
        }
        if (isset($_POST['retour'])){
            header('Location:indexuser');
        }
        require_once ('views/emprunter.php');
    }
}
