<?php
/**
 * Created by IntelliJ IDEA.
 * User: alynayef
 * Date: 04/11/2018
 * Time: 01:56
 */
// Désactiver le rapport d'erreurs
ini_set("display_errors",0);error_reporting(0);
abstract class  Model
{
    private static $_bdd;
    protected $table;
    /*
     * INSTANCIE LA CONNEXION A LA BDD
     */
    private  static function setBdd()
    {
        self::$_bdd=new PDO('mysql:host=localhost;dbname=bibliotheque;charset=utf8',
            'root','');
        self::$_bdd->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
    }
    /*
     * RECUPERE LA CONNEXION A LA BDD
     */
    protected  function getBdd()
    {
        if(self::$_bdd==null)
            self::setBdd();
            return self::$_bdd;
    }

    protected  function getAll($table, $objet)
    {
        $var=[];
        $requete=self::$_bdd->prepare('SELECT * FROM '.$table);
        $requete->execute();
        while ($data = $requete->fetch(PDO::FETCH_ASSOC))
        {
            $var[]=new $objet($data);
        }
        return $var;
        $requete->closeCursor();
    }

    protected  function getdisponible($table, $objet)
    {
        $var=[];
        $requete=self::$_bdd->prepare('SELECT * FROM '.$table.' where disponibilite > 0');
        $requete->execute();
        while ($data = $requete->fetch(PDO::FETCH_ASSOC))
        {
            $var[]=new $objet($data);
        }
        return $var;
        $requete->closeCursor();
    }

    protected  function getnondisponible($user)
    {
        $rendu = 1;
        $var=[];
        $requete=self::$_bdd->prepare('SELECT * FROM livreemprunter WHERE pseudo =? and rendu>=?');
        $requete->bindParam(1, $user);
        $requete->bindParam(2, $rendu);
        $requete->execute();
        while($line=$requete->fetch(PDO::FETCH_NUM)){
            $data[] = $line;
        }
        return $data;
        $requete->closeCursor();
    }

    protected  function getnobject($table)
    {
        $var=[];
        $requete=self::$_bdd->prepare('SELECT * FROM '.$table);
        $requete->execute();
        return $data = $requete->fetchAll(PDO::FETCH_ASSOC);
        $requete->closeCursor();
    }



    /**
     * @param $arrays Les données du nouveau élément qu'on veut ajouter dans la base de donnée

    public function create($table,$arrays){
        $keys = implode(", ", array_keys($arrays));
        $values = implode(", ", array_values($arrays));
        $requete=self::$_bdd->prepare('INSERT INTO '.$table.'('.$keys.') Values ('.$values.')');
        $requete->execute();
        $requete->closeCursor();
    } */

    /**
     * @param $id l'identifiant de l'élément qu'on veut modifier
     * @param $arrays Tableau(key => value) des nouveaux données
     */

    public function update($id, $arrays){
        $keys = array_keys($arrays);
        $values = array_values($arrays);
        $res = "";
        for ($i = 0; $i < count($keys); $i++){
            $res .= $keys[$i] . "=" . $values[$i] . ", ";
        }
        $res = substr($res, 0, -2);
        $requete=self::$_bdd->prepare('UPDATE '.$this->table. ' SET '.$res.' WHERE id ='.$id);
        $requete->execute();
        $requete->closeCursor();
    }

    /**
     * Recherche un élément par ID
     * @param $id
     * @return Object de l'élément trouver
     */
    public function getByID($id){
        $requete=self::$_bdd->prepare('SELECT * FROM '.$this->table.' Where id ='.$id);
        $requete->execute();
        return $requete->fetch(PDO::FETCH_ASSOC);
        $requete->closeCursor();
    }

    /**
     * @param $m L'élément qu'on veut rechercher
     */
    public function search($m){

    }

    /**
     * Efface un élément dans la base de données
     * @param $table
     * @param $id
     */
    public function destroy($table, $id){
        $requete=self::$_bdd->prepare('DELETE FROM '.$table.' Where id = ?');
        $requete->bindParam(1, $id);
        $requete->execute();
        $requete->closeCursor();
    }

    /**
     * Efface un élément dans la base de données
     * @param $id
     */
    public function destroyByReference($table, $reference){
        $requete=self::$_bdd->prepare('DELETE FROM '.$table.' Where reference = ?');
        $requete->bindParam(1, $reference);
        $requete->execute();
        $requete->closeCursor();
    }

    /**
     * Efface un élément dans la base de données
     * @param $table
     * @param $pseudo
     */
    public function destroyByPseudo($table, $pseudo){
        $admin = 'admin_root';
        $requete=self::$_bdd->prepare('DELETE FROM '.$table.' Where pseudo = ? and pseudo!=?');
        $requete->bindParam(1, $pseudo);
        $requete->bindParam(2, $admin);
        $requete->execute();
        $requete->closeCursor();
    }
}