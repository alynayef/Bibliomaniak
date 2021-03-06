<?php
/**
 * Created by IntelliJ IDEA.
 * User: alyna
 * Date: 09/12/2018
 * Time: 12:55
 */

class ControllerHistoriqueEmprunt
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
        $this->historiqueemprunt();
    }

    /**
     * Cette fonction permet d'enregistrer l'emprunt d'un livre
     * Elle enregistre le livre dans les livres à rendre
     * Le livre sera indisponible jusqu'à ce qu'elle soit rendu
     */
    private  function  historiqueemprunt()
    {
        $this->livresModel = new LivresModel;
        $test = $this->livresModel->historiqueEmprunter();

        if (isset($_POST['retour'])){
            header('Location:indexadmin');
        }
        require_once ('views/historiqueemprunt.php');
    }

}