<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	public function __construct()
    {
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('Employee_model');
		
	}
	
	public function index()
	{
		$this->load->helper('url');
		$EmpleList = $this->Employee_model->GetEmplList();
		$this->load->view('header');
		$this->load->view('EmployeeList',$EmpleList);
	}
	
	public function getEmplDetail()
	{
		$jsonArray = json_decode(file_get_contents('php://input'),true);
		if($jsonArray==''){$jsonArray = $_REQUEST;}
		$id = $jsonArray['id'];
		$EmpleList = $this->Employee_model->GetEmplDetail($id);
		echo json_encode($EmpleList);
	}
	
	public function EditEmplDetail()
	{
		$jsonArray = json_decode(file_get_contents('php://input'),true);
		//print_r($jsonArray);exit;
		if($jsonArray==''){$jsonArray = $_REQUEST;}

		$Updateresult = $this->Employee_model->EditEmplDetail($jsonArray);
		echo $Updateresult;
	}
	
	public function deleteEmp()
	{
		$jsonArray = json_decode(file_get_contents('php://input'),true);
		if($jsonArray==''){$jsonArray = $_REQUEST;}

		$Updateresult = $this->Employee_model->deleteEmp($jsonArray['id']);
		echo $Updateresult;
	}
	
	public function NewEmployee()
	{
		$jsonArray = json_decode(file_get_contents('php://input'),true);
		if($jsonArray==''){$jsonArray = $_REQUEST;}

		$Insertresult = $this->Employee_model->InsertEmpl($jsonArray);
		echo $Insertresult;
	}
}
