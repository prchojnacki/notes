<?php if (!DEFINED('BASEPATH')) exit ('No direct script access allowed');

class Note extends CI_Model {
	public function get_all()
	{
		return $this->db->query("SELECT * FROM notes")->result_array();
	}

	public function add($title)
	{
		$query = "INSERT INTO notes (title, created_at, updated_at) VALUES (?, NOW(), NOW())";
		$this->db->query($query, $title);
		return $this->db->insert_id();
	}

	public function update($id, $description)
	{
		$query = "UPDATE notes SET description = ? WHERE id = ?";
		$values = array($description, $id);
		return $this->db->query($query, $values);
	}

	public function delete($id)
	{
		$query = "DELETE FROM notes WHERE id = ?";
		return $this->db->query($query, $id);
	}
}