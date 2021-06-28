<?php
class m_barang
{

	private $data_saya = '';

	public function __construct()
	{
		$this->data_saya = new database;
	}

	public function ambil_semua_barang()
	{
		// (bisa ini bisa yg dibawah) $this->data_saya->isis_sql("SELECT * FROM tb_barang");

		$sql = "SELECT tb_barang.*, tb_kategori.nama_kategori, IFNULL(rekap_barang_jual.kode_barang, '-') AS kode_barang_jual
		FROM tb_barang 
		INNER JOIN tb_kategori
		ON tb_barang.kd_kategori = tb_kategori.kode_kategori
		LEFT JOIN (SELECT kode_barang FROM jual_detail GROUP BY kode_barang)rekap_barang_jual 
		ON tb_barang.kode_barang = rekap_barang_jual.kode_barang";
		/*select=> ambil semua data dari tb_barang, ambil jga data dri tebel tb_kategori yang diambil adalah nama_kategori
		from=> ambil ari tb_barang
		inner join=> ikut bergabung juga tabel tb_kategori
		on=>  hubungkan antara tabel barang kolom kode_kategori dihubungkan dengan tabel kategori kolom kode_kategori */

		$this->data_saya->isi_sql($sql);

		return $this->data_saya->ambil_banyak_baris();
		
	}

	public function ambil_satu_barang($nomor_id)
	{

		$sql = "SELECT tb_barang. *, tb_kategori.nama_kategori 
		FROM tb_barang 
		INNER JOIN tb_kategori
		ON tb_barang.kd_kategori = tb_kategori.kode_kategori
		WHERE tb_barang.id= :x";

		$this->data_saya->isi_sql($sql);

		$this->data_saya->isi_parameter("x", $nomor_id);

		return $this->data_saya->ambil_satu_baris();
	}

	public function hapus_data($nomor_id)
	{
		$sql = "DELETE FROM tb_barang WHERE id= :x";
		$this->data_saya->isi_sql($sql);

		$this->data_saya->isi_parameter("x", $nomor_id);

		$this->data_saya->jalankan_sql();
	}

	public function update_data($kiriman)
	{
		$sql = "UPDATE tb_barang SET kode_barang= :a, nama_barang= :b, satuan= :c, harga_jual= :d, kd_kategori= :e, wkt_ubah= :f WHERE id= :x";
		$this->data_saya->isi_sql($sql);

		$this->data_saya->isi_parameter("a", $kiriman['k_barang']);
		$this->data_saya->isi_parameter("b", $kiriman['n_barang']);
		$this->data_saya->isi_parameter("c", $kiriman['s_barang']);
		$this->data_saya->isi_parameter("d", $kiriman['h_barang']);
		$this->data_saya->isi_parameter("e", $kiriman['k_kategori']);
		$this->data_saya->isi_parameter("f", date("Y-m-d H:i:s"));
		$this->data_saya->isi_parameter("x", $kiriman['nmr_id']);

		$this->data_saya->jalankan_sql();
 
	}

	public function tambah_data($kiriman)
	{
		$sql = "INSERT INTO tb_barang (kode_barang, nama_barang, satuan, harga_jual, kd_kategori)
		VALUES(:a, :b, :c, :d, :e)";

		$this->data_saya->isi_sql($sql);

		$this->data_saya->isi_parameter("a", $kiriman['k_barang']);
		$this->data_saya->isi_parameter("b", $kiriman['n_barang']);
		$this->data_saya->isi_parameter("c", $kiriman['s_barang']);
		$this->data_saya->isi_parameter("d", $kiriman['h_barang']);
		$this->data_saya->isi_parameter("e", $kiriman['k_kategori']);

		$this->data_saya->jalankan_sql();
	}
}
?>