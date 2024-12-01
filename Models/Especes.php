<?php

namespace Models;

/**
 * Class Especes
 * 
 * Class used to interact with the especes table in the database
 */
class Especes extends Database {
    private $id;
    private $nom;
    private $description;

    public function __construct() {
        parent::__construct();
    }

    // Getters

    /**
     * Get the ID of the espece
     * 
     * @return int The ID of the espece
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Get the name of the espece
     * 
     * @return string The name of the espece
     */
    public function getNom() {
        return $this->nom;
    }

    /**
     * Get the description of the espece
     * 
     * @return string The description of the espece
     */
    public function getDescription() {
        return $this->description;
    }

    // Setters

    /**
     * Set the ID of the espece
     * 
     * @param int $id The ID to set
     * @throws \Exception If the ID is not numeric
     */
    public function setId($id) {
        if (!is_numeric($id)) throw new \Exception("L'ID doit être un nombre");
        $this->id = intval($id);
    }

    /**
     * Set the name of the espece
     * 
     * @param string $nom The name to set
     * @throws \Exception If the name is invalid
     */
    public function setNom($nom) {
        if (empty($nom)) throw new \Exception('Le nom est obligatoire');
        if (strlen($nom) < 3) throw new \Exception('Le nom doit contenir au moins 3 caractères');
        if (strlen($nom) > 50) throw new \Exception('Le nom doit contenir au plus 50 caractères');
        $this->nom = htmlspecialchars($nom);
    }

    /**
     * Set the description of the espece
     * 
     * @param string $description The description to set
     * @throws \Exception If the description is invalid
     */
    public function setDescription($description) {
        if (empty($description)) throw new \Exception('La description est obligatoire');
        if (strlen($description) < 3) throw new \Exception('La description doit contenir au moins 3 caractères');
        if (strlen($description) > 255) throw new \Exception('La description doit contenir au plus 255 caractères');
        $this->description = htmlspecialchars($description);
    }

    /**
     * Get all especes ordered by name
     * 
     * @return array An array of espece objects
     */
    public function getAll() {
        $query = "SELECT * FROM especes ORDER BY nom";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }
}

