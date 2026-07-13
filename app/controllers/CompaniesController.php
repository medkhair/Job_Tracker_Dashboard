<?php
require_once __DIR__ . '/../models/Company.php';
require_once __DIR__ . '/../models/City.php';

class CompaniesController extends Controller
{
    protected $model;
    protected $cityModel;

    public function __construct()
    {
        $this->model = new Company();
        $this->cityModel = new City();
    }

    public function index()
    {
        $companies = $this->model->all();
        $this->render('companies/index', ['companies'=>$companies]);
    }

    public function create()
    {
        $cities = $this->cityModel->all();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->model->create($_POST);
            header('Location: ?c=companies');
            return;
        }
        $this->render('companies/form', ['cities'=>$cities, 'company'=>null]);
    }

    public function edit($id)
    {
        $company = $this->model->find($id);
        $cities = $this->cityModel->all();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->model->update($id, $_POST);
            header('Location: ?c=companies');
            return;
        }
        $this->render('companies/form', ['cities'=>$cities, 'company'=>$company]);
    }

    public function delete($id)
    {
        if ($id) {
            $this->model->delete($id);
        }
        header('Location: ?c=companies');
    }
}
