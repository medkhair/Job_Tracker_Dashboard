<?php
require_once __DIR__ . '/../Model.php';

class Application extends Model
{
    public function all()
    {
        $sql = "SELECT a.id,a.company_id,a.status_id,a.notes,c.name as company,s.name as status
                FROM applications a
                LEFT JOIN companies c ON a.company_id = c.id
                LEFT JOIN application_status s ON a.status_id = s.id
                ORDER BY a.id DESC";
        return $this->pdo()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function find($id)
    {
        $stmt = $this->pdo()->prepare('SELECT * FROM applications WHERE id = :id');
        $stmt->execute([':id'=>$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($data)
    {
        $stmt = $this->pdo()->prepare('INSERT INTO applications (company_id,status_id,notes) VALUES (:company_id,:status_id,:notes)');
        return $stmt->execute([
            ':company_id'=>$data['company_id'],
            ':status_id'=>$data['status_id'],
            ':notes'=>$data['notes']?:null,
        ]);
    }

    public function update($id,$data)
    {
        $stmt = $this->pdo()->prepare('UPDATE applications SET company_id=:company_id,status_id=:status_id,notes=:notes WHERE id = :id');
        return $stmt->execute([
            ':company_id'=>$data['company_id'],
            ':status_id'=>$data['status_id'],
            ':notes'=>$data['notes']?:null,
            ':id'=>$id,
        ]);
    }

    public function delete($id)
    {
        $stmt = $this->pdo()->prepare('DELETE FROM applications WHERE id = :id');
        return $stmt->execute([':id'=>$id]);
    }
}
