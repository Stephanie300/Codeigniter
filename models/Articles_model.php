<?php 

class Articles_model extends CI_Model {

	function __construct(){
		// Call the Model Constructor
		parent::__construct();
	}

	function get_articles(){

		$query = $this->db->get('my_articles');

		if($query->num_rows() > 0){
			return $query->result();
		}
		else {
			return FALSE;
		}
	}

	function get_article_details($id){ //MODEL - this then uses the ID it receives from the controller to send a query to the DB

		$this->db->where('id', $id);
	 	$query = $this->db->get('my_articles');
	 	if( $query->num_rows() > 0){
	 		return $query->result();
	 	}
	 	else {
	 		return FALSE;
	 	}
	}

	 // INSERT
	 function insert_article($data){
		
	 	$this->db->insert('my_articles', $data);
	 }

	 //EDIT
	 function edit_article($data, $id){
	 	$this->db->where('id', $id);
	 	$this->db->update('my_articles', $data);
	 }

	 // DELETE
	 function delete_article($id){
	 	$this->db->where('id', $id);
	 	$this->db->delete('my_articles');
	 }

	// GET USERNAME
	function get_username($id){

		//$query = "SELECT * FROM my_articles JOIN users ON users.id = my_articles.author_id WHERE id = $id";
		// $this->db->select('*');
		// $this->db->from('my_articles');
		// $this->db->join('users', 'my_articles.author_id = users.id');
		// $this->db->where('my_articles.id', $id);
		// $query = $this->db->get();

		// return $query->result();

	}

}