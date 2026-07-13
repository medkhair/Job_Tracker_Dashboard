<?php
require_once __DIR__ . '/../models/Application.php';
require_once __DIR__ . '/../models/Company.php';
require_once __DIR__ . '/../models/Status.php';

class ApplicationsController extends Controller
{
    protected $model;
    protected $companyModel;
    protected $statusModel;

    public function __construct()
    {
        $this->model = new Application();
        $this->companyModel = new Company();
        $this->statusModel = new Status();
    }

    public function index()
    {
        $apps = $this->model->all();
        $this->render('applications/index', ['apps'=>$apps]);
    }

    public function create()
    {
        $companies = $this->companyModel->all();
        $statuses = $this->statusModel->all();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->model->create($_POST);
            header('Location: ?c=applications');
            return;
        }
        $this->render('applications/form', ['companies'=>$companies,'statuses'=>$statuses,'app'=>null]);
    }

    public function edit($id)
    {
        $app = $this->model->find($id);
        $companies = $this->companyModel->all();
        $statuses = $this->statusModel->all();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->model->update($id,$_POST);
            header('Location: ?c=applications');
            return;
        }
        $this->render('applications/form', ['companies'=>$companies,'statuses'=>$statuses,'app'=>$app]);
    }

    public function delete($id)
    {
        if ($id) $this->model->delete($id);
        header('Location: ?c=applications');
    }
}
