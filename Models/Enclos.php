<?php

namespace Models;

use \Exception as Exception;
use \PDO as PDO;

class Enclos extends Database
{
    private int $id;
    private string $nom;
    private string $description;
    private string $created_at;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        if (empty($id)) throw new Exception('L\'id de l\'enclos est obligatoire');
        if (!is_numeric($id)) throw new Exception('L\'id de l\'enclos doit être un entier');
        $floatVal = floatval($id);
        $id = intval($id);
        if ($id != $floatVal) throw new Exception('L\'id de l\'enclos doit être un entier');
        if ($id <= 0) throw new Exception('L\'id de l\'enclos doit être supérieur à 0');

        $this->id = $id;
    }

    public function getName()
    {
        return $this->nom;
    }

    public function setName($nom)
    {
        if (empty($nom)) throw new Exception('Le nom de l\'enclos est obligatoire');
        if (strlen($nom) < 3) throw new Exception('Le nom de l\'enclos doit contenir au moins 3 caractères');
        if (strlen($nom) > 50) throw new Exception('Le nom de l\'enclos doit contenir au plus 50 caractères');
        $this->nom = htmlspecialchars($nom);
    }

    public function getDescritption()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        if (empty($description)) throw new Exception('La description de l\'enclos est obligatoire');
        if (strlen($description) < 3) throw new Exception('La description de l\'enclos doit contenir au moins 3 caractères');
        if (strlen($description) > 255) throw new Exception('La description de l\'enclos doit contenir au plus 255 caractères');
        $this->description = htmlspecialchars($description);
    }

    public function getCreatedAt()
    {
        return $this->created_at;
    }

    public function setCreatedAt($created_at)
    {
        $this->created_at = $created_at;
    }

    public function get()
    {
        $query = "SELECT `id`, `nom`, `description`, `created_at` FROM `enclos` WHERE `id` = :id";

        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':id', $this->id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_OBJ);
    }


    public function getAll()
    {
        $query = "SELECT `enclos`.`id`, `enclos`.`nom`, `enclos`.`description`, `enclos`.`created_at`  FROM `enclos`
                            LEFT JOIN `animaux` ON `animaux`.`enclos_id` = `enclos`.`id`";
        $stmt = $this->db->query($query);
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function create()
    {
        $query = "INSERT INTO `enclos` (`nom`, `description`, `created_at`) VALUES (:nom, :description, :created_at)";

        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':nom', $this->nom);
        $stmt->bindValue(':description', $this->description);
        $stmt->bindValue(':created_at', $this->created_at);

        return $stmt->execute();
    }
}
