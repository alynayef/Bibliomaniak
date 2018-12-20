<?php



class Utilisateurs extends Model {
	private $id;
	private $nom;
    private $pseudo;
	private $mdp;
	private $email;

	 public function __construct(array $data){
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

    public function getId()
        {
            return $this->id;
        }

    public function getNom()
        {
            return $this->nom;
        }

    /**
     * @return mixed
     */
    public function getPseudo()
    {
        return $this->pseudo;
    }



    public function getMdp()
        {
            return $this->mdp;
        }

    public function getEmail()
        {
            return $this->email;
        }

    public function setId($id)
        {
            $this->id = $id;
        }

    public function setNom($nomUtilisateur)
        {
            $this->nom = $nomUtilisateur;
        }
    /**
     * @param mixed $pseudo
     */
    public function setPseudo($pseudo)
    {
        $this->pseudo = $pseudo;
    }
    public function setMdp($motdepasse)
        {
            $this->mdp = $motdepasse;
        }

    public function setEmail($mail)
        {
            $this->email = $mail;
        }

}

