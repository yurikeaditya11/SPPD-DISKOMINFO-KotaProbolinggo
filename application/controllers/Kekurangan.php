<?php
class Kekurangan extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('model_kekurangan');
		if(!$this->session->userdata('adminid'))
			redirect('auth');
	}

	function index()
	{
		$data['page']		= 'kekurangan';
		$data['data'] 	= $this->model_kekurangan->get_all();
		$this->load->view('kekurangan/index',$data);
	}

	function add()
	{
		$data['page']		= 'kekurangan';
		$this->load->view('kekurangan/add',$data);
	}

	function actionadd()
	{
			$data = array(
					'no_surat'         	=> $this->input->post('nomor_surat'),
					'keterangan'        => $this->input->post('keterangan')
			);

			$this->model_kekurangan->add($data);
			redirect('kekurangan');
	}

	function edit($id)
	{
		$data['page']		= 'kekurangan';
		$data['data']		= $this->model_kekurangan->get_all('id_kekurangan', $id);
		$this->load->view('kekurangan/edit',$data);
	}

	function actionedit()
	{
		$data = array(
				'no_surat'         	=> $this->input->post('nomor_surat'),
				'keterangan'        => $this->input->post('keterangan')
		);

		$this->model_kekurangan->update($this->input->post('id'), $data);
		redirect('kekurangan');
	}

	function actiondelete($id)
	{
			$this->model_kekurangan->delete($id);
			redirect('kekurangan');
	}

}
