<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notes extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Note');
	}
	public function index_json()
	{
		$data['notes'] = $this->Note->show();
		echo json_encode($data);
	}
	public function index_html()
	{
		$data['notes'] = $this->Note->show();
		$this->load->view('Partials/note_partial', $data);
	}
	public function index()
	{
		$this->load->view('home');
	}
	public function new()
	{
		$this->Note->create($this->input->post());
		$data['notes'] = $this->Note->show();
		$this->load->view('Partials/note_partial', $data);
	}
	public function update()
	{
		$this->Note->update($this->input->post());
		$data['notes'] = $this->Note->show();
		$this->load->view('Partials/note_partial', $data);	
	}
	public function destroy()
	{
		$this->Note->destroy($this->input->post());
		$data['notes'] = $this->Note->show();
		$this->load->view('Partials/note_partial', $data);
	}
}