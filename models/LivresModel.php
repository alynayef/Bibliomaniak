<?php
require_once('Model.php');

class LivresModel extends Model
{
    /**
     * retourne un tableau de livre à partir de la base de données
     * @return (objet) array
     */
    public function ListerTousLesLivres()
    {
        $this->getBdd();
        return $this->getAll('livres', 'Livres');
    }

    /**
     * retourne un tableau de livre disponible à partir de la base de données
     * @return array
     */
    public function Livredisponible()
    {
        $this->getBdd();
        return $this->getdisponible('livres', 'Livres');
    }

    /**
     * supprime un livre à partir de sa référence
     * @param (string) $table
     * @param (string) $reference
     */
    public function rendreUnLivre($table, $reference)
    {
        $this->getBdd();
        return $this->destroyByReference($table, $reference);
    }

    /**
     *Ajoute un livre dans les livres emprunter
     * @param (string) $reference
     * @param (string) $pseudo
     * @param (string) $nomlivre
     */
    public function emprunterUnLivre($reference, $pseudo, $nomlivre)
    {
        $bdd = $this->getBdd();
        $requete = $bdd->prepare('INSERT INTO livreemprunter (reference,pseudo,nomlivre) Values (?, ?,?)');
        $requete->bindParam(1, $reference);
        $requete->bindParam(2, $pseudo);
        $requete->bindParam(3, $nomlivre);
        //$requete->bindParam(4, $rendu);
        $requete->execute();
    }

    /**
     * @param $user
     * @return(objet) array
     */
    public function LivreEmprunter($user)
    {
        $bdd = $this->getBdd();
        return $this->getnondisponible($user);
    }

    /**
     * Met à jour la table des livres emprunter
     * @param $reference
     * @param $pseudo
     */
    public function livreRendu($reference,$pseudo)
    {
        $rendu = 0;
        $bdd = $this->getBdd();
        $requete = $bdd->prepare('UPDATE livreemprunter SET rendu = ? WhERE reference =?');
        $requete->bindParam(1, $rendu);
        $requete->bindParam(2,$reference);
        $requete->execute();
    }

    /**
     *  Met à jour la table des livres, rend indisponible le livre emprunter
     * @param $reference
     * @param $disponibilite
     */
    public function emprunterLivre($reference,$disponibilite)
    {
        $bdd = $this->getBdd();
        $requete = $bdd->prepare('UPDATE livres SET disponibilite = ? WhERE reference =?');
        $requete->bindParam(1, $disponibilite);
        $requete->bindParam(2,$reference);
        $requete->execute();
    }

    /**
     * Mets à jour la table des livres via un formulaire
     * @param $reference
     * @param $disponibilite
     * @param $nomauteur
     * @param $nomlivre
     * @param $date
     */
    public function modifierLivre($reference,$disponibilite,$nomauteur,$nomlivre,$date)
    {
        $bdd = $this->getBdd();
        $requete = $bdd->prepare('UPDATE livres SET nomLivre =?, nomAuteur=?, datePublication=?, disponibilite = ?  WhERE reference =?');
        $requete->bindParam(1, $nomlivre);
        $requete->bindParam(2,$nomauteur);
        $requete->bindParam(3, $date);
        $requete->bindParam(4, $disponibilite);
        $requete->bindParam(5, $reference);
        $requete->execute();
    }

    /**
     * @param array $form
     * @return mixed
     */
    public function proposer(array $form)
    {
        $bdd = $this->getBdd();
        $nomlivre = $form[0];
        $nomauteur = $form[1];
        $date = $form[2];
        $requete = $bdd->prepare('INSERT INTO livreproposer(nomLivre,nomAuteur,datePublication) Values (?, ?,?)');
        $requete->bindParam(1, $nomlivre);
        $requete->bindParam(2, $nomauteur);
        $requete->bindParam(3, $date);
        return $requete->execute();
    }

    public function ajouterLivre(array $form)
    {
        $bdd = $this->getBdd();
        $reference = $form[0];
        $nomlivre = $form[1];
        $nomauteur = $form[2];
        $date = $form[3];
        $requete = $bdd->prepare('INSERT INTO livres(reference,nomLivre,nomAuteur,datePublication) Values (?,?, ?,?)');
        $requete->bindParam(1, $reference);
        $requete->bindParam(2, $nomlivre);
        $requete->bindParam(3, $nomauteur);
        $requete->bindParam(4, $date);
        return $requete->execute();
    }

    public function supprimerLivre($reference)
    {
        $this->getBdd();
        return $this->destroyByReference('livres', $reference);

    }

    public  function  historiqueEmprunter(){
        $bdd = $this->getBdd();
        $requete = $bdd->prepare('SELECT * FROM livreemprunter');
        $requete->execute();
        while($line=$requete->fetch(PDO::FETCH_NUM)){
            $data[] = $line;
        }
        return $data;
        $requete->closeCursor();
    }

    public  function  historiqueRendu(){
        $bdd = $this->getBdd();
        $requete = $bdd->prepare('SELECT * FROM livreemprunter WHERE rendu <= 0');
        $requete->execute();
        while($line=$requete->fetch(PDO::FETCH_NUM)){
            $data[] = $line;
        }
        return $data;
        $requete->closeCursor();
    }

    public function listerProposition(){
        $bdd = $this->getBdd();
        $requete = $bdd->prepare('SELECT * FROM livreproposer');
        $requete->execute();
        while($line=$requete->fetch(PDO::FETCH_NUM)){
            $data[] = $line;
        }
        return $data;
        $requete->closeCursor();
    }

    public  function supprimerparid($table, $id){
        $this->getBdd();
        return $this->destroy($table, $id);
    }


}



