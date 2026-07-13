<?php
require_once __DIR__ . '/../models/City.php';

class CitiesController extends Controller
{
    protected $model;
    public function __construct(){ $this->model = new City(); }
    public function index(){ $this->render('cities/index',['cities'=>$this->model->all()]); }
    public function create(){
        if ($_SERVER['REQUEST_METHOD']==='POST'){ $this->model->create($_POST); header('Location: ?c=cities'); return; }
        $this->render('cities/form',['city'=>null]);
    }
    public function edit($id){
        $city = $this->model->find($id);
        if ($_SERVER['REQUEST_METHOD']==='POST'){ $this->model->update($id,$_POST); header('Location: ?c=cities'); return; }
        $this->render('cities/form',['city'=>$city]);
    }
    public function delete($id){ if ($id) $this->model->delete($id); header('Location: ?c=cities'); }
}
