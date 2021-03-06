<?php

include_once("Personne.php");

class Manager extends Personne {

    private $service;

    public function __contruct(int $id, string $prenom, string $nom, string $mail, 
                                string $telephone, float $salaire, string $service ){
        parent::__construct($id, $prenom, $nom, $mail, $telephone, $salaire);
        $this->service = $service;
    }

    public function calculerSalaire() :float {
        return $this->salaire * 1.35;
    }

    public function afficher() : void{
         echo <<<AFFICHE
        Je suis {$this->prenom} {$this->nom}, je travaille dans le service {$this->service}.
AFFICHE;
    }
    

    /**
     * Get the value of service
     */ 
    public function getService() :string
    {
        return $this->service;
    }

    /**
     * Set the value of service
     *
     * @return  self
     */ 
    public function setService(string $service): self
    {
        $this->service = $service;

        return $this;
    }
}