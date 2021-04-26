<?php
class model_surat_jalan extends CI_Model
{
	protected $_table = 'surat_jalan';
	function __construct()
	{
		parent::__construct();
	}

	function add($data)
  {
      $this->db->insert($this->_table, $data);
  }

	function get_all($key = NULL, $value = NULL)
  {
      if($key != NULL)
      {
          return $this->db->get_where($this->_table, array($key => $value))->row_array();
      }
			$this->db->join('tujuan', 'surat_jalan.tujuan = tujuan.id_tujuan');
			$this->db->order_by('id_surat', 'DESC');
      return $this->db->get($this->_table)->result_array();
  }

	function getone($id, $limit = NULL, $start = NULL)
	{
		$this->db->join('karyawan', 'surat_jalan.nip = karyawan.nip_karyawan');
		$this->db->where('surat_jalan.nip', $id);
		$this->db->order_by('surat_jalan.id_surat', 'DESC');
		$this->db->limit($limit,$start);
		return $this->db->get($this->_table)->row_array();
	}

	function get_tanggal_berangkat()
	{
		$this->db->select('tanggal_berangkat');
		return $this->db->get($this->_table)->result_array();
	}

	function get_all_tujuan($key = NULL, $value = NULL)
	{
		if($key != NULL)
		{
				return $this->db->get_where('kota', array($key => $value))->row_array();
		}
		return $this->db->get('kota')->result_array();
	}

	function get_karyawan_by_nip($id)
	{
		$this->db->where('nip_karyawan', $id);
		$query = $this->db->get('karyawan');
		return $query->row_array();
	}

	function get_tujuan_by_id($id)
	{
		$this->db->where('id_tujuan', $id);
		$query = $this->db->get('tujuan');
		return $query->row_array();
	}

	function update($id, $data)
  {
		$this->db->where('id_surat', $id);
		$this->db->update($this->_table, $data);
	}

	function delete($data)
	{
		$this->db->delete($this->_table, array('id_surat' => $data));
	}
}
?>
