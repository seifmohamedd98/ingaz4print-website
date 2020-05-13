<?php

  require_once(__ROOT__ . "controller/Controller.php");

class ProductsController extends Controller
{
    public function Addproductcontroller() 
    {         
          $paper_type=$_REQUEST['paper_type'];
          $description=$_REQUEST['description'];
          $price=$_REQUEST['price'];
          $name_category = $_REQUEST['name_category'];  
          $this->model->addproduct($paper_type,$description,$price,$name_category);
    }

    public function Editproductcontroller()
    {
        $id=$_REQUEST['id'];
        // $paper_type=$_REQUEST['paper_type'];
        $description=$_REQUEST['description'];
        $price=$_REQUEST['price'];
        // $name_category = $_REQUEST['name_category'];  
        $this->model->editproduct($id,$description,$price);
    }

    public function Deleteproductcontroller()
    {
        $id = $_REQUEST['id'];
        $this->model->deleteproduct($id);
    }
}