<?php
require_once __DIR__ . '/../Model.php';

class Status extends Model
{
    public function all()
    {
        $stmt = $this->pdo()->query('SELECT * FROM application_status ORDER BY id');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function find($id)
    {
        $stmt = $this->pdo()->prepare('SELECT * FROM application_status WHERE id = :id');
        $stmt->execute([':id'=>$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($data)
    {
        $stmt = $this->pdo()->prepare('INSERT INTO application_status (name) VALUES (:name)');
        return $stmt->execute([':name'=>$data['name']]);
    }

    public function update($id,$data)
    {
        $stmt = $this->pdo()->prepare('UPDATE application_status SET name=:name WHERE id=:id');
        return $stmt->execute([':name'=>$data['name'],':id'=>$id]);
    }

    public function delete($id)
    {
        $stmt = $this->pdo()->prepare('DELETE FROM application_status WHERE id = :id');
        return $stmt->execute([':id'=>$id]);
    }
}
