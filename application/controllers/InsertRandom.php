<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class InsertRandom extends CI_Controller {
	public function __construct()
    {
		 parent::__construct();
		$this->load->model('CreateTable_model');
		$this->load->model('Employee_model');
	}
	
	
	
	function index()
	{
		$Senior = $this->CreateTable_model->CreateEmpTable();
		
		for($i=1;$i<=5;$i++)
		{
			$name = $this->randomString(8);
			$years = rand( 1 , 10 );
			if($years >= 3)
			{
				$field = 'senior';
				$salary = 50000*rand( 10 , 40 );
			}else{
				$field = 'junior';
				$salary = 30000*rand( 10 , 20 );
			}
			
			$InsertData = array('name'=>$name,
			'salary'=>$salary,
			'field'=>$field,
			'years'=>$years,);
			
			$Insertresult = $this->Employee_model->InsertEmpl($InsertData);
			
			
		}
		echo 'Table Created and Data Inserted';
	}

	//GENERATE RANDOM STRING
	function randomString($length = 6) {
		$str = "";
		$characters = range('a','z');
		$max = count($characters) - 1;
		for ($i = 0; $i < $length; $i++) {
			$rand = mt_rand(0, $max);
			$str .= $characters[$rand];
		}
		return ucwords($str);
	}

}

