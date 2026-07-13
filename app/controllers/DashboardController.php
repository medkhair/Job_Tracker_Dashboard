<?php
require_once __DIR__ . '/../models/Company.php';
require_once __DIR__ . '/../Controller.php';

class DashboardController extends Controller
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
        $this->render('dashboard', ['companies'=>$companies,'counts'=>$counts,'totalCompanies'=>$totalCompanies,'totalApplications'=>$totalApplications]);
    }
}
