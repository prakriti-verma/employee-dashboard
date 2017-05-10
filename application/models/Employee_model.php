<?php
class Employee_model extends CI_Model {
	
		
	
	public function __construct()
	{
	// Call the CI_Model constructor
		parent::__construct();
		$this->load->database();
	}
	
	function GetEmplbyTypeASC($min,$max,$type)
	{
		$this->db->select("*");			
		$this->db->from('employee');		
		$this->db->where('field', $type);
		$this->db->where('status', '1');
		$this->db->order_by('salary', 'ASC');
		$this->db->order_by('years', 'ASC');
		$this->db->limit($max,$min);
		$q = $this->db->get();
		//echo $this->db->last_query();echo '<br>';
		if($q->num_rows() > 0)
			{
			  foreach ($q->result_array() as $row)
			  {
				$data[] = $row;
			  }
			  return $data;
			}else{
				
				return false;
				
			}
	}
	
	function GetEmplbyTypeDESC($max,$type)
	{
		$this->db->select("*");			
		$this->db->from('employee');		
		$this->db->where('field', $type);
		$this->db->where('status', '1');
		$this->db->order_by('salary', 'DESC');
		$this->db->order_by('years', 'DESC');
		$this->db->limit($max);
		$q = $this->db->get();
		//echo $this->db->last_query();echo '<br>';
		if($q->num_rows() > 0)
			{
			  foreach ($q->result_array() as $row)
			  {
				$data[] = $row;
			  }
			  return $data;
			}else{
				
				return false;
				
			}
	}
	
	
	function GetEmplList()
	{
		$this->db->select("*");			
		$this->db->from('employee');		
		$this->db->where('status', '1');
		$this->db->order_by('id', 'DESC');
		$q = $this->db->get();
		if($q->num_rows() > 0)
			{
			  foreach ($q->result_array() as $row)
			  {
				$data['list'][] = $row;
			  }
			  return $data;
			}else{
				
				return false;
				
			}
	}
	
	function GetEmplDetail($id)
	{
		$this->db->select("*");			
		$this->db->from('employee');		
		$this->db->where('id', $id);
		$this->db->where('status', '1');
		$this->db->order_by('id', 'ASC');
		$q = $this->db->get();
		if($q->num_rows() > 0)
			{
			  foreach ($q->result_array() as $row)
			  {
				$data[] = $row;
			  }
			  return $data;
			}else{
				
				return false;
				
			}
	}
	
	function EditEmplDetail($setdata)
	{		
			$query = $this->db->get_where('employee', array(//making selection
            'id' => $setdata["id"]));

			$count = $query->num_rows(); //counting result from query

			if ($count === 0) {
				return 2;
			}
			else{
				$this->db->where('id',$setdata["id"]);				
				$result=$this->db->update('employee',$setdata);
				if($result){
					return 1;
				}else{
					return 0;
				}
			}
	}
	
	function deleteEmp($id)
	{		
		$setdata['status'] = '0';
		$this->db->where('id',$id);				
		$result=$this->db->update('employee',$setdata);
		if($result){
			return 1;
		}else{
			return 0;
		}
			
	}
	
	function InsertEmpl($setdata)
	{	//print_r($setdata);
		if((!empty($setdata['name'])) && (!empty($setdata['salary'])))
		{
			$setdata['status'] = '1';
			$this->db->insert('employee',$setdata);
			$insert_id = $this->db->insert_id();

			if($insert_id)
			{
				return 1;
			}else{
				return 0;
			}
		}else{
			return 0;
		}
	}
}
?>