<?php
class Auth extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('model_admin');
		//$this->load->model('model_log');
	}

	function index()
	{
		//posisi folder untuk menyimpan gambar captcha
    $path = './public_assets/img/captcha/';

    //membuat folder apabila folder captcha tidak ada
    if ( !file_exists($path) )
    {
        $create = mkdir($path, 0777);
        if ( !$create)
        return;
    }
		//Menampilkan huruf acak untuk dijadikan captcha
    $word = array_merge(range('0', '9'), range('A', 'Z'));
    $acak = shuffle($word);
    $str  = substr(implode($word), 0, 5);

    //Menyimpan huruf acak tersebut kedalam session
    $data_ses = array('captcha_str' => $str  );
    $this->session->set_userdata($data_ses);

    //array untuk menampilkan gambar captcha
    $vals = array(
        'word'  			=> $str, //huruf acak yang telah dibuat diatas
        'img_path'  	=> $path, //path untuk menyimpan gambar captcha
        'img_url'   	=> base_url().'public_assets/img/captcha/', //url untuk menampilkan gambar captcha
        'img_width' 	=> '320', //lebar gambar captcha
        'img_height' 	=> 40, //tinggi gambar captcha
        'expiration' 	=> 7200 //expired time per captcha
    );

    $cap = create_captcha($vals);
    $data['captcha_image'] = $cap['image']; //variable array untuk menampilkan captcha pada view
		$this->load->view('login/index', $data);
	}
	function masuk()
	{
		//cek ada inputan atau tidak
		if(isset($_POST['submit'])){
			//cek chapta cocok atau tidak
			if($this->input->post('input_captcha') == $this->session->userdata('captcha_str')){
				$email = $this->input->post('email');
				$password = md5($this->input->post('password'));
				$hasil		= $this->model_admin->login($email,$password);
				if ($hasil==1) {
				$userlogin	= $this->model_admin->datauser($email,$password);
				$data_session = array(
									'adminname' => $userlogin['username_admin'],
									'adminid'   => $userlogin['id_admin'],
									'image'		  => $userlogin['foto_admin'],
									'level'			=> $userlogin['level_admin']
								);
				$this->session->set_userdata($data_session);
				redirect('dashboard');
				}else{
					 $this->session->set_flashdata('alert_error', 'Please correct your email or password.');
					 redirect('auth');
				}
			}else{
				 $this->session->set_flashdata('alert_captcha', 'Captcha not matching.');
				 redirect('auth');
			}
		}
	}

	function logout()
	{
		$this->session->set_flashdata('alert_logout', 'You are logout.');
		$user_data = $this->session->userdata();
		foreach ($user_data as $key => $value) {
    	if ($key!='_ci_last_regenerate' && $key != '_ci_vars')
       		$this->session->unset_userdata($key);
		}
		redirect('auth');
	}

}
