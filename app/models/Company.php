<?php
require_once __DIR__ . '/../Model.php';

class Company extends Model
{
    public function getCompaniesWithStatus()
    {
        $sql = "SELECT c.id,c.name,c.website,c.career_url,c.email,c.notes, s.name as status, a.id as app_id
                FROM companies c
                LEFT JOIN applications a ON a.company_id = c.id
                LEFT JOIN application_status s ON a.status_id = s.id
                ORDER BY c.name";
        $stmt = $this->pdo()->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getCountsByStatus()
    {
        $sql = "SELECT s.name, COUNT(a.id) as count FROM application_status s
                LEFT JOIN applications a ON a.status_id = s.id
                GROUP BY s.id ORDER BY s.id";
        $stmt = $this->pdo()->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function totalCompanies()
    {
        $stmt = $this->pdo()->query('SELECT COUNT(*) FROM companies');
        return (int)$stmt->fetchColumn();
    }

    public function totalApplications()
    {
        $stmt = $this->pdo()->query('SELECT COUNT(*) FROM applications');
        return (int)$stmt->fetchColumn();
    }

    public function all()
    {
        $stmt = $this->pdo()->query('SELECT * FROM companies ORDER BY name');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function find($id)
    {
        $stmt = $this->pdo()->prepare('SELECT * FROM companies WHERE id = :id');
        $stmt->execute([':id'=>$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($data)
    {
        $sql = 'INSERT INTO companies (city_id,name,website,career_url,email,notes) VALUES (:city_id,:name,:website,:career_url,:email,:notes)';
        $stmt = $this->pdo()->prepare($sql);
        return $stmt->execute([
            ':city_id'=>$data['city_id']?:null,
            ':name'=>$data['name'],
            ':website'=>$data['website']?:null,
            ':career_url'=>$data['career_url']?:null,
            ':email'=>$data['email']?:null,
            ':notes'=>$data['notes']?:null,
        ]);
    }

    public function update($id, $data)
    {
        $sql = 'UPDATE companies SET city_id=:city_id,name=:name,website=:website,career_url=:career_url,email=:email,notes=:notes WHERE id = :id';
        $stmt = $this->pdo()->prepare($sql);
        $data[':id'] = $id;
        return $stmt->execute([
            ':city_id'=>$data['city_id']?:null,
            ':name'=>$data['name'],
            ':website'=>$data['website']?:null,
            ':career_url'=>$data['career_url']?:null,
            ':email'=>$data['email']?:null,
            ':notes'=>$data['notes']?:null,
            ':id'=>$id,
        ]);
    }

    public function delete($id)
    {
        $stmt = $this->pdo()->prepare('DELETE FROM companies WHERE id = :id');
        return $stmt->execute([':id'=>$id]);
    }
}
