 <?php

class home extends Controller
{
	
	public function home()
	{

		$this->tampilkan_view("halaman_cafe");
		
	}

	public function tentang()
	{
		echo "ini adalah halaman tentang";
	}

	public function coba_css_js()
	{
		$this->deppatori("halaman_css_js");
	}

	public function kosong()
	{
		$this->deppatori("halaman_kosong");
	}

	public function kosong_modif()
	{
		$this->deppatori("halaman_kosong_modif");
	}
}
?> 
