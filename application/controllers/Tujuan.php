<?php
class Tujuan extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('model_tujuan');
		if(!$this->session->userdata('adminid'))
			redirect('auth');
	}

	function index()
	{
		$data['page']		= 'tujuan';
		$data['data'] 	= $this->model_tujuan->get_all();
		$this->load->view('tujuan/index',$data);
	}

	function add()
	{
		$data['page']		= 'tujuan';
		$this->load->view('tujuan/add',$data);
	}

	function actionadd()
	{
			$budget_tujuan = ltrim($this->input->post('budget_tujuan'),"Rp. ");
			$data = array(
					'nama_tujuan'         	=> $this->input->post('nama_tujuan'),
					'tingkat_tujuan'        => $this->input->post('tingkat_tujuan'),
          'budget_tujuan'         => $budget_tujuan
			);

			$this->model_tujuan->add($data);
			redirect('tujuan');
	}

	function edit($id)
	{
		$data['page']		= 'tujuan';
		$data['data']		= $this->model_tujuan->get_all('id_tujuan', $id);
		$this->load->view('tujuan/edit',$data);
	}

	function actionedit()
	{
		$budget_tujuan = ltrim($this->input->post('budget_tujuan'),"Rp. ");
    $data = array(
        'nama_tujuan'         	=> $this->input->post('nama_tujuan'),
        'tingkat_tujuan'        => $this->input->post('tingkat_tujuan'),
        'budget_tujuan'         => $budget_tujuan
    );

		$this->model_tujuan->update($this->input->post('id'), $data);
		redirect('tujuan');
	}

	function actiondelete($id)
	{
			$this->model_tujuan->delete($id);
			redirect('tujuan');
	}

}
