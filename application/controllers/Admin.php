<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('model_admin');
        if(!$this->session->userdata('adminid'))
            redirect('auth');
	}

    function index()
  	{
  		$datacontent['page']	='admin';
  		$datacontent['data'] 	= $this->model_admin->get_all();
  		$this->load->view('admin/index', $datacontent);
  	}

    function add()
    {
        $datacontent['page']   = 'admin';
        $this->load->view('admin/add',$datacontent);
    }

    function actionadd()
    {
    if(!empty($_FILES['foto_admin']['name'])){
                $image_name =  str_replace(' ','_',date('Ymdhis').$_FILES['foto_admin']['name']);
                $config['upload_path']      = $this->config->item('upload_image');
                $config['allowed_types']    = 'gif|jpg|png';
                $config['file_name']        = $image_name;
                $this->upload->initialize($config);
                $this->upload->do_upload('foto_admin');
            }else{
                $image_name = '';
            }

        $password = md5($this->input->post('password'));
        $data = array(
					  'username_admin'      => $this->input->post('username'),
            'nama_admin'         	=> $this->input->post('nama'),
            'password_admin'      => $password,
            'email_admin'         => $this->input->post('email'),
            'foto_admin'    			=> $image_name,
						'level_admin'					=> $this->input->post('level')
        );

        $this->model_admin->add($data);
        redirect('admin');
    }

    function cpassword($id)
    {
        $datacontent['page']   = 'admin';
        $datacontent['data']   = $this->model_admin->get_all('id_admin',$id);
        $this->load->view('admin/cpassword',$datacontent);
    }


    function actioncpassword()
    {

        $password = md5($this->input->post('password'));
        $data = array(
            'password_admin'          => $password
        );
        $this->model_admin->update($this->input->post('id'),$data);
        redirect('admin');
    }

    function edit($id)
    {
        $datacontent['page']        = 'admin';
        $datacontent['data']        = $this->model_admin->get_all('id_admin', $id);
				$datacontent['level']       = $this->model_admin->get_all();
        $this->load->view('admin/edit',$datacontent);
    }

    function actionedit()
    {
    if(!empty($_FILES['foto_admin']['name'])){
                $image_name =  str_replace(' ','_',date('Ymdhis').$_FILES['foto_admin']['name']);
                $config['upload_path']      = $this->config->item('upload_image');
                $config['allowed_types']    = 'gif|jpg|png';
                $config['file_name']        = $image_name;
                $this->upload->initialize($config);
                $this->upload->do_upload('foto_admin');
            }else{
                $image_name = $this->input->post('imagex');
            }
        $data = array(
					  'username_admin'      => $this->input->post('username'),
            'nama_admin'          => $this->input->post('nama'),
            'email_admin'         => $this->input->post('email'),
            'foto_admin'          => $image_name,
						'level_admin'					=> $this->input->post('level_admin')
        );
        $this->model_admin->update($this->input->post('id'),$data);
        redirect('admin');
    }

    function actiondelete($id)
    {
        $this->model_admin->delete($id);
        redirect('admin');
    }
}
