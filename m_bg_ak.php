<?php

class m_bg_ak
{
	private $data_saya = '';

	public function __construct()
	{
		$this->data_saya = new database;
	}

	public function ambil_bg_ak()
	{
		$sql = "SELECT * FROM bag_akuntansi";
		$this->data_saya->isi_sql($sql);
		
		return $this->data_saya->ambil_banyak_baris();
	}
}
?>
