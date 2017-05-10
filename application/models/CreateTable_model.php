<?php
class CreateTable_model extends CI_Model {
	
		
	
	public function __construct()
	{
	// Call the CI_Model constructor
		parent::__construct();
		$this->load->database();
	}
	
	function CreateEmpTable()
	{
		
		$createQuery = "CREATE TABLE IF NOT EXISTS employee1(id INT(11) NOT NULL AUTO_INCREMENT ,
				name VARCHAR(10) NOT NULL , 
				salary INT(10) NOT NULL ,
				field VARCHAR(10) NOT NULL ,
				years INT(10) NOT NULL,
				status ENUM('0','1') Not NULL,
				PRIMARY KEY ( id ))";
				
		$q = $this->db->query($createQuery);
		
	}
	
	
}
?>