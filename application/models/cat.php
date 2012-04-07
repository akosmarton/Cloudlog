<?php

	class Cat extends CI_Model {

		function __construct()
		{
			// Call the Model constructor
			parent::__construct();
		}

		function update($result) {
		
			$this->db->where('radio', $result['radio']); 
			$query = $this->db->get('cat');
			
			if ($query->num_rows() > 0)
			{
				// Update the record
				foreach ($query->result() as $row)
				{
					$radio_id = $row->id;
					
					$data = array(
					   'frequency' => $result['frequency'],
					   'mode' => $result['mode']
					);

					$this->db->where('id', $radio_id);
					$this->db->update('cat', $data); 
				}
			} else {
				// Add a new record
				
				$data = array(
				   'radio' => $result['radio'],
					'frequency' => $result['frequency'],
					'mode' => $result['mode']
				);

				$this->db->insert('cat', $data); 

			}
		}
	
		function status() {
			
		}

	}
?>