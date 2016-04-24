<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Note extends CI_Model {

	public function create($post)
	{
		$query = "INSERT INTO notes (title, content, created_at, updated_at) VALUES (?, ?, NOW(), NOW())";
		$values = array(htmlspecialchars($post['title']), htmlspecialchars($post['content']));
		$this->db->query($query, $values);
	}
	public function show()
	{
		return $this->db->query("SELECT * FROM notes")->result_array();
	}
	public function update($post)
	{
		$query = "UPDATE notes SET content = ?, updated_at = NOW() WHERE id = ?";
		$values = array(htmlspecialchars($post['content']), $post['id']);
		$this->db->query($query, $values);
	}
	public function destroy($post)
	{
		$query = "DELETE FROM notes WHERE id =?";
		$values = array($post['id']);
		$this->db->query($query, $values);
	}

}
