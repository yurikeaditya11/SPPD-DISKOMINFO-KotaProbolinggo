<?php
class Model_karyawan extends CI_Model
{
	protected $_table = 'karyawan';
	var $column_order = array(null, 'nip_karyawan','nama_karyawan','pangkat_karyawan','gol_karyawan','jabatan_karyawan',NULL); //set column field database for datatable orderable
  var $column_search = array('nip_karyawan','nama_karyawan','pangkat_karyawan','gol_karyawan','jabatan_karyawan'); //set column field database for datatable searchable
  var $order = array('id_karyawan' => 'desc'); // default order 
	function __construct()
	{
		parent::__construct();
	}

	private function _get_datatables_query()
    {

        $this->db->from($this->_table);

        $i = 0;

        foreach ($this->column_search as $item) // loop column
        {
            if($_POST['search']['value']) // if datatable send POST for search
            {

                if($i===0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if(count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }

        if(isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        }
        else if(isset($this->order))
        {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    function get_datatables()
    {
        $this->_get_datatables_query();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all()
    {
        $this->db->from($this->_table);
        return $this->db->count_all_results();
    }

	function add($data)
  {
      $this->db->insert($this->_table, $data);
  }

  function rawat($key, $value){
    return $this->db->get_where($this->_table, array($key => $value))->result_array();
  }

	function get_all($key = NULL, $value = NULL)
  {
      if($key != NULL)
      {
          return $this->db->get_where($this->_table, array($key => $value))->row_array();
      }
			$this->db->order_by('id_karyawan', 'DESC');
      return $this->db->get($this->_table)->result_array();
  }

	function update($id, $data)
  {
		$this->db->where('id_karyawan', $id);
		$this->db->update($this->_table, $data);
	}

	function delete($data)
	{
		$this->db->delete($this->_table, array('id_karyawan' => $data));
	}
}
?>
