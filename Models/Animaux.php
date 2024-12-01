<?php

namespace Models;

class Animaux extends Database {
    public function getByEnclosId($enclosId) {
        $query = "SELECT * FROM animaux WHERE enclos_id = :enclos_id ORDER BY created_at DESC";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':enclos_id', $enclosId, \PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }
}
