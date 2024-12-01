<?php

namespace Models;

use \Exception as Exception;
use \PDO as PDO;
use \DateTime;

class Animaux extends Database
{
    private int $id = 0;
    private string $nom = '';
    private string $description = '';
    private int $espece_id = 0;
    private int $enclos_id = 0;
    private DateTime $created_at;

    public function __construct()
    {
        parent::__construct();
        $this->created_at = new DateTime();
    }

    // Getters
    public function getId(): int
    {
        return $this->id;
    }

    public function getNom(): string
    {
        return $this->nom;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getEspeceId(): int
    {
        return $this->espece_id;
    }

    public function getEnclosId(): int
    {
        return $this->enclos_id;
    }

    // Setters
    public function setName($nom)
    {
        if (empty($nom)) throw new Exception('Le nom est requis');
        if (strlen($nom) < 2) throw new Exception('Le nom doit contenir au moins 2 caractères');
        if (strlen($nom) > 50) throw new Exception('Le nom ne peut pas dépasser 50 caractères');
        $this->nom = htmlspecialchars($nom);
        return $this;
    }

    public function setDescription($description)
    {
        if (empty($description)) throw new Exception('La description est requise');
        if (strlen($description) < 10) throw new Exception('La description doit contenir au moins 10 caractères');
        if (strlen($description) > 255) throw new Exception('La description ne peut pas dépasser 255 caractères');
        $this->description = htmlspecialchars($description);
        return $this;
    }

    public function setEspece($espece_id)
    {
        if (empty($espece_id)) throw new Exception("L'espèce est requise");
        if (!is_numeric($espece_id)) throw new Exception("L'ID de l'espèce doit être un nombre");
        $this->espece_id = intval($espece_id);
        return $this;
    }

    public function setEnclosId($enclos_id)
    {
        if (empty($enclos_id)) throw new Exception("L'enclos est requis");
        if (!is_numeric($enclos_id)) throw new Exception("L'ID de l'enclos doit être un nombre");
        $this->enclos_id = intval($enclos_id);
        return $this;
    }

    // Database operations
    public function add(): bool
    {
        $query = "INSERT INTO animaux (nom, description, espece_id, enclos_id, created_at) 
                  VALUES (:nom, :description, :espece_id, :enclos_id, :created_at)";

        $stmt = $this->db->prepare($query);

        return $stmt->execute([
            ':nom' => $this->nom,
            ':description' => $this->description,
            ':espece_id' => $this->espece_id,
            ':enclos_id' => $this->enclos_id,
            ':created_at' => $this->created_at->format('Y-m-d H:i:s')
        ]);
    }

    public function getByEnclosId($enclosId)
    {
        $query = "SELECT animaux.*, especes.nom as espece_nom 
                 FROM animaux 
                 LEFT JOIN especes ON animaux.espece_id = especes.id 
                 WHERE enclos_id = :enclos_id";

        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':enclos_id', $enclosId, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function setEspeceId($espece_id)
    {
        if (empty($espece_id)) {
            throw new Exception("L'espèce est requise");
        }
        if (!is_numeric($espece_id)) {
            throw new Exception("L'ID de l'espèce doit être un nombre");
        }
        $this->espece_id = intval($espece_id);
        return $this;
    }

    public function delete($id): bool
    {
        $query = "DELETE FROM animaux WHERE id = :id";
        $stmt = $this->db->prepare($query);
        return $stmt->execute([':id' => $id]);
    }

    public function update($id): bool
    {
        $query = "UPDATE animaux 
              SET nom = :nom,
                  description = :description,
                  espece_id = :espece_id,
                  enclos_id = :enclos_id
              WHERE id = :id";

        $stmt = $this->db->prepare($query);

        return $stmt->execute([
            ':id' => $id,
            ':nom' => $this->nom,
            ':description' => $this->description,
            ':espece_id' => $this->espece_id,
            ':enclos_id' => $this->enclos_id
        ]);
    }

    public function getById($id)
    {
        $query = "SELECT animaux.*, especes.nom as espece_nom 
              FROM animaux 
              LEFT JOIN especes ON animaux.espece_id = especes.id 
              WHERE animaux.id = :id";

        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_OBJ);
    }
}
