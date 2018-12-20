<?php

/*
 * le router permet de definir quel page on doit inclure
  *quel controller il doit inclure selon l'action de l'utilisateur
*/

class Router
{
    private $controller;
    private $view;

    /**
     * cette fonction renvoi à la bonne page et masque le vrai url de la page pour plus de sécurité
     */
    public function routerequete()
    {
        try {
            //CHARGEMENT AUTOMATIQUE DES CLASSES
            spl_autoload_register(function ($class) {
                require_once('models/' . $class . '.php');
            });

            $url = '';
            /*
             * LE CONTROLLER EST INCLUS SELON L'ACTION DE L'UTILISATEUR
             */
            if (isset($_GET['url'])) {
                //explode permet de récuperer tous les paramétres de maniere séparé
                /*$url = explode('/', filter_var($_GET['url'],
                    FILTER_SANITIZE_URL));
                //ucfirst la premiere lettre en majuscule
                //strtolower c'est tout le reste en minuscule de url
                $controller = ucfirst(strtolower($url[0]));
                $controllerClass = "Controller" . $controller;
                $controllerFile = "controllers/" . $controllerClass.".php";
                if (file_exists($controllerFile)) {
                    require_once($controllerFile);
                    $this->controller = new $controllerClass($url);
                } else
                    require_once('views/ViewsError.php');
                    throw new Exception('page introuvable');*/
                $url = $_GET['url'];
                require_once('models/utilisateursModel.php');
                session_start();
                switch ($url){
                    case "livre":
                        if(!UtilisateursModel::verif_session()){
                            header('Location:connexion');
                        }else{
                            require_once('controllers/ControllerLivres.php');
                            $this->controller = new ControllerLivres($url);
                        }

                        break;

                    case "indexuser":
                        if(!UtilisateursModel::verif_session()){
                            header('Location:connexion');
                        }else {
                            require_once('controllers/ControllerIndexuser.php');
                            $this->controller = new ControllerIndexuser($url);
                        }
                        break;

                    case "indexadmin":
                        if(!UtilisateursModel::verif_session()){
                            header('Location:connexion');
                        }else {
                            require_once('controllers/ControllerIndexadmin.php');
                            $this->controller = new ControllerIndexadmin($url);
                        }
                        break;
                    case "connexion":

                            require_once('controllers/ControllerConnexion.php');
                            $this->controller = new ControllerConnexion($url);

                        break;

                    case "deconnexion":
                        require_once('controllers/ControllerDeconnexion.php');
                        $this->controller = new ControllerDeconnexion($url);
                        break;

                    case "inscription":
                        if(UtilisateursModel::verif_session()){
                            header('Location:indexuser');
                        }else {
                            require_once('controllers/ControllerInscription.php');
                            $this->controller = new ControllerInscription($url);
                        }
                        break;

                    case "emprunter":
                        if(!UtilisateursModel::verif_session()){
                            header('Location:connexion');
                        }else {
                            require_once('controllers/ControllerEmprunter.php');
                            $this->controller = new ControllerEmprunter($url);
                        }
                        break;

                    case "rendre":
                        if(!UtilisateursModel::verif_session()){
                            header('Location:connexion');
                        }else {
                            require_once('controllers/ControllerRendu.php');
                            $this->controller = new ControllerRendu($url);
                        }
                        break;

                    case "proposer":
                        if(!UtilisateursModel::verif_session()){
                            header('Location:connexion');
                        }else {
                            require_once('controllers/ControllerProposer.php');
                            $this->controller = new ControllerProposer($url);
                        }
                        break;

                    case "gestionlivre":
                        if(!UtilisateursModel::verif_session()){
                            header('Location:connexion');
                        }else {
                            require_once('controllers/ControllerGestionLivre.php');
                            $this->controller = new ControllerGestionLivre($url);
                        }
                        break;

                    case "ajouterlivre":
                        if(!UtilisateursModel::verif_session()){
                            header('Location:connexion');
                        }else {
                            require_once('controllers/ControllerAjouterLivre.php');
                            $this->controller = new ControllerAjouterLivre($url);
                        }
                        break;

                    case "utilisateurs":
                        if(!UtilisateursModel::verif_session()){
                            header('Location:connexion');
                        }else {
                            require_once('controllers/ControllerUtilisateurs.php');
                            $this->controller = new ControllerUtilisateurs($url);
                        }
                        break;

                    case "historiqueemprunt":
                        if(!UtilisateursModel::verif_session()){
                            header('Location:connexion');
                        }else {
                            require_once('controllers/ControllerHistoriqueEmprunt.php');
                            $this->controller = new ControllerHistoriqueEmprunt($url);
                        }
                        break;

                    case "livreproposer":
                        if(!UtilisateursModel::verif_session()){
                            header('Location:connexion');
                        }else {
                            require_once('controllers/ControllerLivreProposer.php');
                            $this->controller = new ControllerLivreProposer($url);
                        }
                        break;

                    case "satisfaireproposition":
                        if(!UtilisateursModel::verif_session()){
                            header('Location:connexion');
                        }else {
                            require_once('controllers/ControllerSatisfaireProposition.php');
                            $this->controller = new ControllerSatisfaireProposition($url);
                        }
                        break;
                    case "historiquerendu":
                        if(!UtilisateursModel::verif_session()){
                            header('Location:connexion');
                        }else {
                            require_once('controllers/ControllerHistoriqueRendu.php');
                            $this->controller = new ControllerHistoriqueRendu($url);
                        }
                        break;
                    default:

                        throw new Exception("page satisfaireproposition");

                }
            } else {
                /*
                 * par defaut on part directement sur la page d'accueil
                */
                require_once('controllers/ControllerConnexion.php');
                $this->controller = new ControllerConnexion($url);
                //header('Location:views/indexuser.php');

            }

        } /*
             * GESTION DES ERREURS
             */
        catch
        (Exception $e) {
            /*
             *Dans le cas d'une erreur on tombe directement sur la page d'erreur
             */
            if(!UtilisateursModel::verif_session()) {
                header('Location:connexion');
            }
            $errorMsg = $e->getMessage();
            require_once('views/ViewsError.php');
        }
    }
}