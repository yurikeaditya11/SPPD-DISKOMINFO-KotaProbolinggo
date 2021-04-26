<?php
class Model_admin extends CI_Model
{
	protected $_table = 'admin';
	function __construct()
	{
		parent::__construct();
	}

	function login($email,$password){
		$check = $this->db->get_where($this->_table, array('email_admin'=>$email, 'password_admin'=>$password));
		if($check->num_rows()>0){
			return 1;
		}else{
			return 0;
		}
	}

	function datauser($email,$password)
	{
		$query    = $this->db->get_where($this->_table, array('email_admin'=>$email, 'password_admin'=>$password));
		$result   = $query->row_array();

		return $result;
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
      return $this->db->get($this->_table)->result_array();
  }

	function update($id, $data)
  {
		$this->db->where('id_admin', $id);
		$this->db->update($this->_table, $data);
	}

	function delete($data)
	{
		$this->db->delete($this->_table, array('id_admin' => $data));
	}
}
?>
