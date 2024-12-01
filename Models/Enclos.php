<?php
namespace Models;

use \Exception as Exception;
use \PDO as PDO;
use \DateTime as DateTime;

/**
 * Class Enclos
 * 
 * Class used to interact with the enclos table in the database
 */
class Enclos extends Database
{
    /**
     * @var int $id The enclos ID
     */
    private int $id = 0; // Initialize with default value

    /**
     * @var string $nom The enclos name
     */
    private string $nom = ''; // Initialize with default value

    /**
     * @var string $description The enclos description
     */
    private string $description = ''; // Initialize with default value

    /**
     * @var DateTime $created_at The enclos creation date
     */
    private DateTime $created_at;

    /**
     * Constructor
     * 
     * Initializes the DateTime object
     */
    public function __construct() {
        parent::__construct();
        $this->created_at = new DateTime(); // Initialize DateTime
    }

    /**
     * Gets the enclos ID
     * 
     * @return int The enclos ID
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Sets the enclos ID
     * 
     * @param int $id The enclos ID
     * @return self The current instance
     * @throws Exception If the ID is invalid
     */
    public function setId($id) {
        if (empty($id)) throw new Exception("L'id est requis");
        if (!is_numeric($id)) throw new Exception("L'id de l'enclos doit être un nombre");
        $floatVal = floatval($id);
        if ($id != $floatVal) throw new Exception("L'id de l'enclos doit être un nombre entier");
        if ($id < 0) throw new Exception("L'id de l'enclos ne peut pas être négatif");
        
        $this->id = intval($id);
        return $this;
    }

    // ... rest of your methods ...


    /**
     * Gets the enclos name
     * 
     * @return string The enclos name
     */
    public function getName()
    {
        return $this->nom;
    }

    /**
     * Sets the enclos name
     * 
     * @param string $nom The enclos name
     * @return self The current instance
     * @throws Exception If the name is invalid
     */
    public function setName($nom)
    {
        if (empty($nom)) throw new Exception('Le nom de l\'enclos est obligatoire');
        if (strlen($nom) < 3) throw new Exception('Le nom de l\'enclos doit contenir au moins 3 caractères');
        if (strlen($nom) > 50) throw new Exception('Le nom de l\'enclos doit contenir au plus 50 caractères');
        $this->nom = htmlspecialchars($nom);
    }

    /**
     * Gets the enclos description
     * 
     * @return string The enclos description
     */
    public function getDescritption()
    {
        return $this->description;
    }

    /**
     * Sets the enclos description
     * 
     * @param string $description The enclos description
     * @return self The current instance
     * @throws Exception If the description is invalid
     */
    public function setDescription($description)
    {
        if (empty($description)) throw new Exception('La description de l\'enclos est obligatoire');
        if (strlen($description) < 3) throw new Exception('La description de l\'enclos doit contenir au moins 3 caractères');
        if (strlen($description) > 255) throw new Exception('La description de l\'enclos doit contenir au plus 255 caractères');
        $this->description = htmlspecialchars($description);
    }

    /**
     * Gets the enclos creation date
     * 
     * @return DateTime The enclos creation date
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * Sets the enclos creation date
     * 
     * @param DateTime $created_at The enclos creation date
     * @return self The current instance
     */
    public function setCreatedAt($created_at)
    {
        $this->created_at = $created_at;
    }

    /**
     * Gets a single enclos by its ID
     * 
     * @param int $id The enclos ID
     * @return object The enclos object
     */
    public function get()
    {
        $query = "SELECT `id`, `nom`, `description`, `created_at` FROM `enclos` WHERE `id` = :id";

        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':id', $this->id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_OBJ);
    }


    /**
     * Gets all enclos
     * 
     * @return array The array of enclos objects
     */
    public function getAll()
    {
        $query = "SELECT `enclos`.`id`, `enclos`.`nom`, `enclos`.`description`, `enclos`.`created_at`  FROM `enclos`
                            LEFT JOIN `animaux` ON `animaux`.`enclos_id` = `enclos`.`id`";
        $stmt = $this->db->query($query);
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    /**
     * Creates a new enclos
     * 
     * @return bool True if the enclos was created, false otherwise
     */
    public function create()
    {
        $this->created_at = new DateTime(); // Set it just before creating
        
        $query = "INSERT INTO enclos (nom, description, created_at) 
                  VALUES (:nom, :description, :created_at)";
        
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':nom', $this->nom, PDO::PARAM_STR);
        $stmt->bindValue(':description', $this->description, PDO::PARAM_STR);
        $stmt->bindValue(':created_at', $this->created_at->format('Y-m-d H:i:s'), PDO::PARAM_STR);
        
        return $stmt->execute();
    }

    /**
     * Deletes an enclos by its ID
     * 
     * @param int $id The enclos ID
     * @return bool True if the enclos was deleted, false otherwise
     */
    public function delete($id): bool 
    {
        try {
            $query = "DELETE FROM enclos WHERE id = :id";
            $stmt = $this->db->prepare($query);
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
            return $stmt->execute();
        } catch (Exception $e) {
            throw $e;
        }
    }
    
    
    /**
     * Get all animals in a specific enclos
     * 
     * @param int $enclosId The enclos ID
     * @return array An array of animal objects
     */
    public function getAnimals($enclosId) {
        $query = "SELECT * FROM animaux WHERE enclos_id = :enclos_id";
        $stmt = $this->db->prepare($query);
        $stmt->execute(['enclos_id' => $enclosId]);
        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }
    
    /**
     * Get an enclos by its ID
     * 
     * @param int $id The enclos ID
     * @return object The enclos object
     */
    public function getById($id) {
        $query = "SELECT * FROM enclos WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':id', $id, \PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(\PDO::FETCH_OBJ);
    }
    
    /**
     * Update an enclos
     * 
     * @param int $id The enclos ID
     * @param string $nom The new name of the enclos
     * @param string $description The new description of the enclos
     * @return bool True if the enclos was updated, false otherwise
     */
    public function update($id, $nom, $description) {
        $query = "UPDATE enclos 
                  SET nom = :nom, 
                      description = :description 
                  WHERE id = :id";
                  
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->bindValue(':nom', $nom, PDO::PARAM_STR);
        $stmt->bindValue(':description', $description, PDO::PARAM_STR);
        
        return $stmt->execute();
    }

    

}