<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Display extends CI_Controller {
	public function __construct()
    {
		 parent::__construct();
		$this->load->model('Employee_model');
	}
	
	public function index()
	{
		$this->load->helper('url');
		$this->load->view('header');
		$this->load->view('displayTable');
		$this->load->view('displayResult');
	}
	
	public function employeeCal()
	{
		$jsonArray = json_decode(file_get_contents('php://input'),true);
		if($jsonArray==''){$jsonArray = $_REQUEST;}
		$senior = $jsonArray['senior'];
		$junior = $jsonArray['junior'];
		$budget = $jsonArray['budget'];
		
		
		$Total = $this->GetEmployee($senior,$junior,$budget);
		echo json_encode($Total);
	}
	
	function GetEmployee($senior,$junior,$budget)
	{
		$Senior = $this->Employee_model->GetEmplbyTypeDESC($senior,'senior');
		$Junior = $this->Employee_model->GetEmplbyTypeDESC($junior,'junior');
		if(!empty($Senior))
		{
			$senior_sum = array_sum(array_column($Senior, 'salary')); 
		}
		if(!empty($Junior))
		{
			$junior_sum = array_sum(array_column($Junior, 'salary')); 
		}
		$total = $senior_sum+$junior_sum;
		if($budget > $total)
		{
			$completeArray = array_merge($Senior,$Junior);
			return $completeArray;
		}else{
			return $this->TotalSumEmployee('0',$senior,$junior,$budget);
		}
	}
	
	function TotalSumEmployee($limit,$senior,$junior,$budget)
	{	
		$senior_sum = $junior_sum = 0;
		$Senior = $this->Employee_model->GetEmplbyTypeASC($limit,$senior,'senior');
		$Junior = $this->Employee_model->GetEmplbyTypeASC($limit,$junior,'junior');
		if(!empty($Senior))
		{
			$senior_sum = array_sum(array_column($Senior, 'salary')); 
		}
		if(!empty($Junior))
		{
			$junior_sum = array_sum(array_column($Junior, 'salary')); 
		}
		$total = $senior_sum+$junior_sum;
		if($budget >= $total)
		{
			return $this->TotalSumEmployee(($limit+1),$senior,$junior,$budget);
			
		}else{
			if($limit != 0)
			{
				$Senior = $this->Employee_model->GetEmplbyTypeASC($limit-1,$senior,'senior');
				$Junior = $this->Employee_model->GetEmplbyTypeASC($limit-1,$junior,'junior');
				$completeArray = array_merge($Senior,$Junior);
				return $completeArray;
			}else{
				return false;
			}
		}

	}
	
	

}
