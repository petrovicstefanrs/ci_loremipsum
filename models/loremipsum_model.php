<?php 
	/**
	*
	* Author : Stefan Petrovic
	* Website : www.petrovicstefan.rs
	* Product : Loremipsum Generator (DB Model)
	* Version : 1.0.0
	* 
	*/
	class Loremipsum_model extends CI_Model
	{
		
		function __construct()
		{
			parent::__construct();
		}

		public function getWords()
		{
			$sql="SELECT * FROM `loremipsumi`";
			$query=$this->db->query($sql);
			$res=$query->result();
			if ($query->num_rows()==0) {
				return false;
			}
			else{
				return $res;
			}	
		}
	}
?>