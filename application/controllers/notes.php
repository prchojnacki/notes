<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Notes extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Note');
	}

	public function index()
	{
		$this->load->view('index');
	}

	public function index_html()
	{
		$data['notes'] = $this->Note->get_all();
		$this->load->view('notes', $data);
	}

	public function add()
	{
		$title = $this->input->post('title');
		$id = $this->Note->add($title);
		$notes = $this->Note->get_all();
		$this->load->view('notes', array('notes'=>$notes, 'id'=>$id));
	}

	public function update()
	{
		// var_dump($this->input->post());
		// die();
		$id = $this->input->post('id');
		$description = $this->input->post('description');
		$this->Note->update($id, $description);
		$notes = $this->Note->get_all();
		$this->load->view('notes', array('notes'=>$notes, 'id'=>$id));
	}

	public function delete()
	{
		$id = $this->input->post('id');
		$this->Note->delete($id);
		$notes = $this->Note->get_all();
		$this->load->view('notes', array('notes'=>$notes, 'id'=>$id));
	}
}
