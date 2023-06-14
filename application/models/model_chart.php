<?php
// Penduduk.php
class model_chart extends CI_Model
{
	function Jum_bulan()
	{
		$this->db->group_by('tanggal_transaksi');
		$this->db->select('tanggal_transaksi');
		$this->db->select("count(*) as total");
		return $this->db->from('transaksi')
			->get()
			->result();
	}
}
