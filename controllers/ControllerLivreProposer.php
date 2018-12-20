<?php
/**
 * Created by IntelliJ IDEA.
 * User: alyna
 * Date: 13/12/2018
 * Time: 20:43
 */

class ControllerLivreProposer
{
    private $livresModel;

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
        $this->livreproposer();
    }

    /**
     * cette fonction permet de lister tous les livres proposer
     */
    private  function  livreproposer()
    {
        $this->livresModel = new LivresModel;
        $test = $this->livresModel->ListerProposition();
        if(isset($_POST['retour'])) header('Location:indexadmin');
        if(isset($_POST['satisfait'])){
            if ($_POST['reference'][0] != ''){
                $tab = array($_POST['reference'][0],$_POST['nomLivre'][0], $_POST['nomAuteur'][0], $_POST['date'][0]);
                var_dump($tab);
                $this->livresModel->ajouterLivre($tab);
                $this->livresModel->supprimerparid('livreproposer',$_POST['id'][0]);
                header('Location:livreproposer');
            }

        }
        require_once ('views/livreproposer.php');
    }

}