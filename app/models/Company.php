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
}
