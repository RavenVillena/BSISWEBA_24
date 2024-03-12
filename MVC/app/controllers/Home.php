<?php

class Home extends Controller
{
    public function index()
    {
        $model = new Model();
        $arr['Firstname'] = 'Raven';
        $data = $model->where
        ($arr); $data = $model->findAll(); 
        show($data);

        $this->view('home');
    }
}

 class About extends Controller
{
   public function index()
  {
       $this->view('about');
    }
}