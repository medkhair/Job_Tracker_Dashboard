<?php
require_once __DIR__ . '/../Model.php';

class City extends Model
{
    public function all()
    {
        $stmt = $this->pdo()->query('SELECT * FROM cities ORDER BY name');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function find($id)
    {
        $stmt = $this->pdo()->prepare('SELECT * FROM cities WHERE id = :id');
        $stmt->execute([':id'=>$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($data)
    {
        $stmt = $this->pdo()->prepare('INSERT INTO cities (name) VALUES (:name)');
        return $stmt->execute([':name'=>$data['name']]);
    }

    public function update($id,$data)
    {
        $stmt = $this->pdo()->prepare('UPDATE cities SET name=:name WHERE id=:id');
        return $stmt->execute([':name'=>$data['name'],':id'=>$id]);
    }

    public function delete($id)
    {
        $stmt = $this->pdo()->prepare('DELETE FROM cities WHERE id = :id');
        return $stmt->execute([':id'=>$id]);
    }
}
