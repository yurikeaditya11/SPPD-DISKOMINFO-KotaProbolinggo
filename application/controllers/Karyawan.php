<?php
class Karyawan extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('model_karyawan');
		if(!$this->session->userdata('adminid'))
			redirect('auth');
	}

	function index()
	{
		$data['page']		= 'karyawan';
		$data['data'] 	= $this->model_karyawan->get_all();
		$this->load->view('karyawan/index',$data);
	}

	function add()
	{
		$data['page']		= 'karyawan';
		$this->load->view('karyawan/add',$data);
	}

	function actionadd()
	{
			$data = array(
					'nip_karyawan'         	=> $this->input->post('nip_karyawan'),
					'nama_karyawan'         => $this->input->post('nama_karyawan'),
					'pangkat_karyawan'    	=> $this->input->post('pangkat_karyawan'),
					'gol_karyawan'         	=> $this->input->post('gol_karyawan'),
					'jabatan_karyawan'      => $this->input->post('jabatan_karyawan')
			);

			$this->model_karyawan->add($data);
			redirect('karyawan');
	}

	function edit($id)
	{
		$data['page']		= 'karyawan';
		$data['data']		= $this->model_karyawan->get_all('id_karyawan', $id);
		$this->load->view('karyawan/edit',$data);
	}

	function actionedit()
	{
		$data = array(
				'nip_karyawan'         	=> $this->input->post('nip_karyawan'),
				'nama_karyawan'         => $this->input->post('nama_karyawan'),
				'pangkat_karyawan'    	=> $this->input->post('pangkat_karyawan'),
				'gol_karyawan'         	=> $this->input->post('gol_karyawan'),
				'jabatan_karyawan'      => $this->input->post('jabatan_karyawan')
		);

		$this->model_karyawan->update($this->input->post('id'),$data);
		redirect('karyawan');
	}

	function actiondelete($id)
	{
			$this->model_karyawan->delete($id);
			redirect('karyawan');
	}

	public function ajax_list()
    {
        $list = $this->model_karyawan->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $karyawan) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $karyawan->nip_karyawan;
            $row[] = $karyawan->nama_karyawan;
            $row[] = $karyawan->pangkat_karyawan;
            $row[] = $karyawan->gol_karyawan;
            $row[] = $karyawan->jabatan_karyawan;
            $row[] = '<a href="'.site_url("karyawan/edit/".$karyawan->id_karyawan).'"><i title="edit" class="fa fa-edit"></i></a>
											<a data-href="'.site_url("karyawan/actiondelete/".$karyawan->id_karyawan).'" data-toggle="modal" data-target="#confirm-delete'.$no.'" href="#"><i title="delete" class="fa fa-trash"></i></a>

											<div class="modal fade" id="confirm-delete'.$no.'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
													<div class="modal-dialog">
															<div class="modal-content">

																	<div class="modal-header">
																			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
																			<h4 class="modal-title" id="myModalLabel">Confirm Delete</h4>
																	</div>

																	<div class="modal-body">
																			<p>You are about to delete this data.</p>
																			<p>Do you want to proceed?</p>
																			<p class="debug-url"></p>
																	</div>

																	<div class="modal-footer">
																			<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
																			<a href="'.site_url("karyawan/actiondelete/".$karyawan->id_karyawan).'" class="btn btn-danger danger">Delete</a>
																	</div>
															</div>
													</div>
											</div>';

            $data[] = $row;
        }

        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->model_karyawan->count_all(),
                        "recordsFiltered" => $this->model_karyawan->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }

}
