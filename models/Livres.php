<?php
/**
 * Created by IntelliJ IDEA.
 * User: alyna
 * Date: 04/11/2018
 * Time: 02:32
 */

class Livres extends Model
{

    private $id;
    private $reference;
    private $nomLivre;
    private $nomAuteur;
    private $disponibilite;
    private $datePublication;

    public function __construct(array $data)
    {
        $this->hydrate($data);
    }
    
    public  function hydrate(array $data){
        foreach ($data as $key => $value)
        {
            $method = 'set'.ucfirst($key);

            if(method_exists($this,$method))
                $this->$method($value);
        }
    }

    /**
     * retourne l'identifiant dans l'objet courant
     * @return (int) id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * retourne la référence dans l'objet courant
     * @return (string) reference
     */
    public function getReference()
    {
        return $this->reference;
    }

    /**
     * retourne le nom du livre dans l'objet courant
     * @return (string) nomLivre
     */
    public function getNomLivre()
    {
        return $this->nomLivre;
    }

    /**
     * retourne le nom de l'auteur dans l'objet courant
     * @return (string)
     */
    public function getNomAuteur()
    {
        return $this->nomAuteur;
    }

    /**
     * retourne la disponibilite dans l'objet courant
     * @return (boolean) disponibilite
     */
    public function getDisponibilite()
    {
        return $this->disponibilite;
    }

    /**
     * retourne la date de publication dans l'objet courant
     * @return (date) datePublication
     */
    public function getDatePublication()
    {
        return $this->datePublication;
    }

    /**
     * mets un identifiant dans l'objet courant
     * @param (int) id
     */
    public function setId($id)
    {
        if (is_int($id))
            $this->id = $id;
    }

    /**
     * mets une référence dans l'objet courant
     * @param(string) $reference
     */
    public function setReference($reference)
    {
        if (is_string($reference))
            $this->reference = $reference;
    }

    /**
     * mets nomLivre dans l'objet courant
     * @param (string) $nomLivre
     */
    public function setNomLivre($nomLivre)
    {
        if (is_string($nomLivre))
            $this->nomLivre = $nomLivre;
    }

    /**
     * mets nomAuteur dans l'objet courant
     * @param (string)$nomAuteur
     */
    public function setNomAuteur($nomAuteur)
    {
        if (is_string($nomAuteur))
            $this->nomAuteur = $nomAuteur;
    }

    /**
     * mets une disponibilité dans l'objet courant
     * @param (boolean) $disponibilite
     */
    public function setDisponibilite($disponibilite)
    {
        $disponibilite = (int)$disponibilite;
        if ($disponibilite == 0 || $disponibilite > 0)
            $this->disponibilite = $disponibilite;
    }

    /**
     * mets une date de publication dans l'objet courant
     * @param (date) $datePublication
     */
    public function setDatePublication($datePublication)
    {
        $this->datePublication = $datePublication;
    }
}