<?php
class Jalan extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('model_surat_jalan');
		$this->load->model('model_admin');
		$this->load->model('model_karyawan');
		$this->load->model('model_kekurangan');
		$this->load->model('model_tujuan');
		if(!$this->session->userdata('adminid'))
			redirect('auth');
	}

	function createDateRangeArray($strDateFrom,$strDateTo)
	{
	    // takes two dates formatted as YYYY-MM-DD and creates an
	    // inclusive array of the dates between the from and to dates.

	    // could test validity of dates here but I'm already doing
	    // that in the main script

	    $aryRange=array();

	    $iDateFrom=mktime(1,0,0,substr($strDateFrom,5,2),     substr($strDateFrom,8,2),substr($strDateFrom,0,4));
	    $iDateTo=mktime(1,0,0,substr($strDateTo,5,2),     substr($strDateTo,8,2),substr($strDateTo,0,4));

	    if ($iDateTo>=$iDateFrom)
	    {
	        array_push($aryRange,date('Y-m-d',$iDateFrom)); // first entry
	        while ($iDateFrom<$iDateTo)
	        {
	            $iDateFrom+=86400; // add 24 hours
	            array_push($aryRange,date('Y-m-d',$iDateFrom));
	        }
	    }
	    return $aryRange;
	}

	function index()
	{
		$data['page']		= 'jalan';
		$data['data'] 	= $this->model_surat_jalan->get_all();
		$data['cek']		= $this->createDateRangeArray('2020-10-01','2020-10-05');
		$this->load->view('jalan/index',$data);
	}

	function add()
	{
		$data['page']				= 'jalan';
		$data['kota']				= $this->model_surat_jalan->get_all_tujuan();
		$this->load->view('jalan/add',$data);
	}

	function actionadd()
	{
			$tanggal_berangkat 		 = str_replace('/', '-', $this->input->post('tanggal_berangkat'));
			$tanggal_pulang 		 	 = str_replace('/', '-', $this->input->post('tanggal_pulang'));
			$getdate							 = $this->model_surat_jalan->getone($this->input->post('nip'),1,0);
			$hasildatedb					 = $this->createDateRangeArray($getdate['tanggal_berangkat'],$getdate['tanggal_pulang']);
			$datecompare					 = $this->createDateRangeArray(date("Y-m-d", strtotime($tanggal_berangkat)),date("Y-m-d", strtotime($tanggal_pulang)));
			$cekdate							 = array_intersect($hasildatedb,$datecompare);
			$listdatesame					 = implode(",", $cekdate);
			if(!empty($cekdate)){
				$this->session->set_flashdata('alert_error', $getdate['nama_karyawan'].' sedang ada tugas di tanggal '.$listdatesame.' tersebut');
				redirect('jalan/add');
			}else{
			$data = array(
					'nomor_surat'         	=> $this->input->post('nomor_surat'),
					'nip'         					=> $this->input->post('nip'),
					'tujuan'    						=> $this->input->post('tujuan'),
					'tanggal_berangkat'     => date("Y-m-d", strtotime($tanggal_berangkat)),
					'tanggal_pulang'      	=> date("Y-m-d", strtotime($tanggal_pulang)),
					'jenis_ticket'					=> $this->input->post('jenis_ticket'),
					'nomor_ticket'      		=> $this->input->post('nomor_ticket'),
					'biaya_akomodasi'				=> $this->input->post('biaya_akomodasi'),
					'nama_hotel'						=> $this->input->post('nama_hotel'),
					'nomor_kamar'						=> $this->input->post('nomor_kamar'),
					'harga_permalam'      	=> $this->input->post('harga_permalam'),
					'total'									=> $this->input->post('total'),
					'admin_id'							=> $this->session->userdata('adminid')
			);

			$this->model_surat_jalan->add($data);
			redirect('jalan');
			}
	}

	function edit($id)
	{
		$data['page']		= 'jalan';
		$data['data']		= $this->model_surat_jalan->get_all('id_surat', $id);
		$data['kota']		= $this->model_surat_jalan->get_all_tujuan();
		$this->load->view('jalan/edit',$data);
	}

	function actionedit()
	{
		$tanggal_berangkat 		 = str_replace('/', '-', $this->input->post('tanggal_berangkat'));
		$tanggal_pulang 		 	 = str_replace('/', '-', $this->input->post('tanggal_pulang'));
		$cektanggalganti			 = $this->model_surat_jalan->get_all('id_surat', $this->input->post('id'));
		$getdate							 = $this->model_surat_jalan->getone($this->input->post('nip'),1,1);
		$hasildatedb					 = $this->createDateRangeArray($getdate['tanggal_berangkat'],$getdate['tanggal_pulang']);
		$datecompare					 = $this->createDateRangeArray(date("Y-m-d", strtotime($tanggal_berangkat)),date("Y-m-d", strtotime($tanggal_pulang)));
		$cekdate							 = array_intersect($hasildatedb,$datecompare);
		$listdatesame					 = implode(",", $cekdate);
			if(!empty($cekdate)){
				$this->session->set_flashdata('alert_error', $getdate['nama_karyawan'].' sedang ada tugas di tanggal '.$listdatesame.' tersebut');
				redirect('jalan/edit/'.$this->input->post('id'));
			}else{
			$data = array(
					'nomor_surat'         	=> $this->input->post('nomor_surat'),
					'nip'         					=> $this->input->post('nip'),
					'tujuan'    						=> $this->input->post('tujuan'),
					'tanggal_berangkat'     => date("Y-m-d", strtotime($tanggal_berangkat)),
					'tanggal_pulang'      	=> date("Y-m-d", strtotime($tanggal_pulang)),
					'jenis_ticket'					=> $this->input->post('jenis_ticket'),
					'nomor_ticket'      		=> $this->input->post('nomor_ticket'),
					'biaya_akomodasi'				=> $this->input->post('biaya_akomodasi'),
					'nama_hotel'						=> $this->input->post('nama_hotel'),
					'nomor_kamar'						=> $this->input->post('nomor_kamar'),
					'harga_permalam'      	=> $this->input->post('harga_permalam'),
					'total'									=> $this->input->post('total'),
					'admin_id'							=> $this->session->userdata('adminid')
			);

			$this->model_surat_jalan->update($this->input->post('id'), $data);
			redirect('jalan');
			}
	}

	function actiondelete($id)
	{
			$this->model_surat_jalan->delete($id);
			redirect('jalan');
	}

	function get_data_karyawan(){
		 $id = $this->input->post('id');
		 $id2 = $this->input->post('id2');
		 $a = $this->model_surat_jalan->get_karyawan_by_nip($id);
		 $b = $this->model_surat_jalan->get_tujuan_by_id($id2);
		 if(!empty($a)){
		 $lists = "<table class='table'><tr><th>NIP</th><th>Nama</th><th>Pangkat</th><th>Golongan</th><th>Jabatan</th><th>Budget</th></tr><tr><td>".$a['nip_karyawan']."</td><td>".$a['nama_karyawan']."</td><td>".$a['pangkat_karyawan']."</td><td>".$a['gol_karyawan']."</td><td>".$a['jabatan_karyawan']."</td><td>".$b['budget_tujuan']."</td></tr></table>"; // Tambahkan tag option ke variabel $lists
		 }else{
		 $lists = "<table class='table'><tr><th>NIP</th><th>Nama</th><th>Pangkat</th><th>Golongan</th><th>Jabatan</th></tr><tr><td colspan='5' align='center'>No result match</td></tr></table>";
		 }
		 $callback = array('list'=>$lists);
		 echo json_encode($callback); // konversi varibael $callback menjadi JSON
  }

	function get_tujuan()
	{
		$id = $this->input->post('id');
		$cek = $this->model_surat_jalan->get_karyawan_by_nip($id);
		$data = $this->model_tujuan->get_tujuan_by_tingkat($cek['gol_karyawan']);
		$lists = "";
		foreach($data as $a){
		$lists .= "<option value='".$a['id_tujuan']."'>".$a['nama_tujuan']."</option>"; // Tambahkan tag option ke variabel $lists
		}
		$callback = array('list'=>$lists);
		echo json_encode($callback); // konversi varibael $callback menjadi JSON
	}

	// function to_pdf($id)
	// {
	// 	$pdf = new TCPDF('P', PDF_UNIT, 'Letter', true, 'UTF-8', false);
	//
	//   $pdf->SetTitle('Surat SPPD');
	//   $pdf->SetSubject('Surat SPPD');
	//
	//   $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
	//   $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
	//   $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
	//
	//   $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
	//   $pdf->AddPage();
	//
	//   $pdf->SetFont('helvetica', '', 10);
	//   $pdf->SetY(30);
	//   $isi = "<br><table>
	//           <tr>
	//             <td align=\"center\"><h2>SURAT SPPD</h2></td>
	//           </tr>
	//         </table>
	//         <br><hr><p></p>
	//         Dari : Probolinggo <br>
	// 				Tanggal : 21-01-2020 <br>
	// 				Ke : Probolinggo <br>
	// 				Sampai : 25-01-2020 <br>
	//         ";
	//   $pdf->writeHTML($isi, true, false, false, false, '');
	//
	//   $namaPDF = 'Surat-SPPD-Utam.pdf';
	//   $pdf->Output($namaPDF,'I');
	// 	// $data = $this->model_surat_jalan->get_all('id_surat', $id);
	// 	// $this->load->view('jalan/pdf', $data);
	// }

	function view($id)
	{
		$data['page']				= 'jalan';
		$data['data']				= $this->model_surat_jalan->get_all('id_surat', $id);
		$data['karyawan']		= $this->model_karyawan->get_all('nip_karyawan', $data['data']['nip']);
		$data['kota']				= $this->model_tujuan->get_all('id_tujuan', $data['data']['tujuan']);
		$data['admin']			= $this->model_admin->get_all('id_admin', $data['data']['admin_id']);
		$data['kekurangan']	= $this->model_kekurangan->get_all('no_surat', $data['data']['nomor_surat']);
		$this->load->view('jalan/detail',$data);
	}

	function print($id)
	{
		$data['page']				= 'jalan';
		$data['data']				= $this->model_surat_jalan->get_all('id_surat', $id);
		$data['karyawan']		= $this->model_karyawan->get_all('nip_karyawan', $data['data']['nip']);
		$data['kota']				= $this->model_tujuan->get_all('id_tujuan', $data['data']['tujuan']);
		$data['admin']			= $this->model_admin->get_all('id_admin', $data['data']['admin_id']);
		$data['kekurangan']	= $this->model_kekurangan->get_all('no_surat', $data['data']['nomor_surat']);
		$this->load->view('jalan/tes',$data);
	}

	function kwitansi($id)
	{
		$data['page']				= 'jalan';
		$data['data']				= $this->model_surat_jalan->get_all('id_surat', $id);
		$data['karyawan']		= $this->model_karyawan->get_all('nip_karyawan', $data['data']['nip']);
		$data['kota']				= $this->model_tujuan->get_all('id_tujuan', $data['data']['tujuan']);
		$data['admin']			= $this->model_admin->get_all('id_admin', $data['data']['admin_id']);
		$data['kekurangan']	= $this->model_kekurangan->get_all('no_surat', $data['data']['nomor_surat']);
		$this->load->view('jalan/kwitansi',$data);
	}

}
