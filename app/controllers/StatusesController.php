<?php
require_once __DIR__ . '/../models/Status.php';

class StatusesController extends Controller
{
    protected $model;
    public function __construct(){ $this->model = new Status(); }
    public function index(){ $this->render('statuses/index',['statuses'=>$this->model->all()]); }
    public function create(){
        if ($_SERVER['REQUEST_METHOD']==='POST'){ $this->model->create($_POST); header('Location: ?c=statuses'); return; }
        $this->render('statuses/form',['status'=>null]);
    }
    public function edit($id){
        $status = $this->model->find($id);
        if ($_SERVER['REQUEST_METHOD']==='POST'){ $this->model->update($id,$_POST); header('Location: ?c=statuses'); return; }
        $this->render('statuses/form',['status'=>$status]);
    }
    public function delete($id){ if ($id) $this->model->delete($id); header('Location: ?c=statuses'); }
}
