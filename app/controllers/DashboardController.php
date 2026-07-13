<?php
require_once __DIR__ . '/../models/Company.php';

class DashboardController
{
    protected $companyModel;

    public function __construct()
    {
        $this->companyModel = new Company();
    }

    public function index()
    {
        $companies = $this->companyModel->getCompaniesWithStatus();
        $counts = $this->companyModel->getCountsByStatus();
        $totalCompanies = $this->companyModel->totalCompanies();
        $totalApplications = $this->companyModel->totalApplications();

        include __DIR__ . '/../views/header.php';
        include __DIR__ . '/../views/dashboard.php';
        include __DIR__ . '/../views/footer.php';
    }
}
