<?php

namespace Models;

class Especes extends Database {
    private $id;
    private $nom;
    private $description;

    public function __construct() {
        parent::__construct();
    }

    // Getters
    public function getId() {
        return $this->id;
    }

    public function getNom() {
        return $this->nom;
    }

    public function getDescription() {
        return $this->description;
    }

    // Setters
    public function setId($id) {
        if (!is_numeric($id)) throw new \Exception("L'ID doit être un nombre");
        $this->id = intval($id);
    }

    public function setNom($nom) {
        if (empty($nom)) throw new \Exception('Le nom est obligatoire');
        if (strlen($nom) < 3) throw new \Exception('Le nom doit contenir au moins 3 caractères');
        if (strlen($nom) > 50) throw new \Exception('Le nom doit contenir au plus 50 caractères');
        $this->nom = htmlspecialchars($nom);
    }

    public function setDescription($description) {
        if (empty($description)) throw new \Exception('La description est obligatoire');
        if (strlen($description) < 3) throw new \Exception('La description doit contenir au moins 3 caractères');
        if (strlen($description) > 255) throw new \Exception('La description doit contenir au plus 255 caractères');
        $this->description = htmlspecialchars($description);
    }

    public function getAll() {
        $query = "SELECT * FROM especes ORDER BY nom";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }
    

}

