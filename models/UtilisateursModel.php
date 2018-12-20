<?php
/**
 * Created by IntelliJ IDEA.
 * User: alyna
 * Date: 18/11/2018
 * Time: 23:21
 */
require_once('Model.php');

class UtilisateursModel extends Model
{
    public function inscription(array $users)
    {
        $bdd = $this->getBdd();
        /*$this->usersModel = new Model();
        $this->create('utilisateurs',$users);*/
        $nom = $users[0];
        $pseudo = $users[1];
        $mdp = $users[2];
        $email = $users[3];
            $requete = $bdd->prepare('INSERT INTO utilisateurs(nom,pseudo,mdp,email) Values (?, ?,?,?)');
            $requete->bindParam(1, $nom);
            $requete->bindParam(2, $pseudo);
            $requete->bindParam(3, $mdp);
            $requete->bindParam(4, $email);
            return $requete->execute();


    }


    public function connexion(array $users)
    {
        $bdd = $this->getBdd();
        var_dump($users);
        $requete = $bdd->prepare('SELECT * FROM  utilisateurs WHERE pseudo =? and mdp=?');
        $requete->bindParam(1, $users[0]);
        $requete->bindParam(2, $users[1]);
        $requete->execute();
        if ($requete->fetch()){

            session_start();
            if($users[0]=='admin_root'){
                $_SESSION['user'] ='admin_root';
                header('Location:indexadmin');
            }
            else{
                $_SESSION['user'] =$users[0];
                header('Location:indexuser');
            }

        }
        else echo 'pseudo ou mots de passe errone';

    }

    static function verif_session(){
        if(isset($_SESSION['user'])) return true;
        else return false;
    }

    /**
     * retourne un tableau d'utilisateur à partir de la base de données
     * @return (objet) array
     */
    public function ListerTousLesUtilisateurs()
    {
        $this->getBdd();
        return $this->getAll('utilisateurs', 'Utilisateurs');
    }

    /**
     * Mets à jour la table des livres via un formulaire
     * @param $pseudo
     * @param $mdp
     * @param $email
     */
    public function modifierUtilisateur($pseudo,$mdp,$email)
    {
        $admin = 'admin_root';
        $bdd = $this->getBdd();
        $requete = $bdd->prepare('UPDATE utilisateurs SET mdp = ?, email = ? WhERE pseudo = ? AND pseudo != ? ');
        $requete->bindParam(1,$mdp);
        $requete->bindParam(2,$email);
        $requete->bindParam(3, $pseudo);
        $requete->bindParam(4, $admin);
        $requete->execute();
    }

    public function supprimerUtilisateur($pseudo)
    {
        $admin = 'admin_root';
        $bdd = $this->getBdd();
        $requete =$bdd->prepare('DELETE FROM utilisateurs WHERE pseudo = ? AND pseudo != ?');
        $requete->bindParam(1, $pseudo);
        $requete->bindParam(2, $admin);
        $requete->execute();
        $requete->closeCursor();

    }
}

