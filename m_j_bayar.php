<?php

class m_j_bayar
{
	private $data_saya = '';

	public function __construct()
	{
		$this->data_saya = new database;
	}

	public function ambil_semua_jenis()
	{
		$sql = "SELECT * FROM j_bayar";
		$this->data_saya->isi_sql($sql);
		
		return $this->data_saya->ambil_banyak_baris();
	}
}

?>