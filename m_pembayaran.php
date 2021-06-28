<?php
class m_pembayaran
{

	private $data_saya = '';

	public function __construct()
	{
		$this->data_saya = new database;
	}

	public function ambil_semua_data()
	{

		$sql = "SELECT j_pembayaran.*, j_bayar.jenis_bayar
		FROM j_pembayaran
		INNER JOIN j_bayar
		ON j_pembayaran.pembayaran = j_bayar.kode_jenis";
	
		$this->data_saya->isi_sql($sql);

		return $this->data_saya->ambil_banyak_baris();
		
	}

	public function ambil_satu_data($nomor_id)
	{

		$sql = "SELECT j_pembayaran.*, j_bayar.jenis_bayar
		FROM j_pembayaran
		INNER JOIN j_bayar
		ON j_pembayaran.pembayaran = j_bayar.kode_jenis
		WHERE j_pembayaran.id= :x";

		$this->data_saya->isi_sql($sql);

		$this->data_saya->isi_parameter("x", $nomor_id);

		return $this->data_saya->ambil_satu_baris();
	}


	public function tambah_data($kiriman)
	{
		$sql = "INSERT INTO j_pembayaran(kode_bayar, pembayaran)
		VALUES(:a, :b)";

		$this->data_saya->isi_sql($sql);

		$this->data_saya->isi_parameter("a", $kiriman['k_bayar']);
		$this->data_saya->isi_parameter("b", $kiriman['j_jenis']);

		$this->data_saya->jalankan_sql();
	}


	public function update_data($kiriman)
	{
		$sql = "UPDATE j_pembayaran SET kode_bayar= :a, pembayaran= :b WHERE id= :x";
		$this->data_saya->isi_sql($sql);

		$this->data_saya->isi_parameter("a", $kiriman['k_bayar']);
		$this->data_saya->isi_parameter("b", $kiriman['j_jenis']);
		$this->data_saya->isi_parameter("x", $kiriman['nmr_id']);

		$this->data_saya->jalankan_sql();
 
	}

	public function hapus_data($nomor_id)
	{
		$sql = "DELETE FROM j_pembayaran WHERE id= :x";
		$this->data_saya->isi_sql($sql);

		$this->data_saya->isi_parameter("x", $nomor_id);

		$this->data_saya->jalankan_sql();
	}


}

?>