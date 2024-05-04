<?php


include("KontrakView.php");
include("presenter/ProsesPasien.php");

class TampilPasien implements KontrakView
{
	private $prosespasien; //presenter yang dapat berinteraksi langsung dengan view
	private $tpl;

	function __construct()
	{
		//konstruktor
		$this->prosespasien = new ProsesPasien();
	}

	function tampil()
	{
		$this->prosespasien->prosesDataPasien();
		$data = null;

		//semua terkait tampilan adalah tanggung jawab view
		for ($i = 0; $i < $this->prosespasien->getSize(); $i++) {
			$no = $i + 1;
			$data .= "<tr>
			<td>" . $no . "</td>
			<td>" . $this->prosespasien->getNik($i) . "</td>
			<td>" . $this->prosespasien->getNama($i) . "</td>
			<td>" . $this->prosespasien->getTempat($i) . "</td>
			<td>" . $this->prosespasien->getTl($i) . "</td>
			<td>" . $this->prosespasien->getGender($i) . "</td>
			<td>" . $this->prosespasien->getEmail($i) . "</td>
			<td>" . $this->prosespasien->getTelp($i) . "</td>
			<td>
											<a class='btn btn-success' href='edit.php?id=".$this->prosespasien->getId($i)."'>Edit</a>
											<a class='btn btn-danger' href='delete.php?id=".$this->prosespasien->getId($i)."'>Delete</a>
										</td>";
		}
		// Membaca template skin.html
		$this->tpl = new Template("templates/skin.html");

		// Mengganti kode Data_Tabel dengan data yang sudah diproses
		$this->tpl->replace("DATA_TABEL", $data);

		// Menampilkan ke layar
		$this->tpl->write();
	}
	function delete($id)
	{
		$result = $this->prosespasien->hapusDataPasien($id);
		echo "<script>
		alert('Data berhasil dihapus');
		document.location.href = 'index.php';
		</script>";
		$this->tampil(); // Menampilkan data terbaru setelah penghapusan
	}
	function add($data){
		$formAdd = ' <form method="post" action = "create.php">
		<div class="form-group">
		  <label for="nik">NIK</label>
		  <input type="text" class="form-control" name = "nik" id="nik" placeholder="Masukkan NIK">
		</div>
		<div class="form-group">
		  <label for="nama">Nama</label>
		  <input type="text" class="form-control" name ="nama" id="nama" placeholder="Masukkan Nama">
		</div>
		<div class="form-group">
		  <label for="tempat">Tempat Lahir</label>
		  <input type="text" class="form-control" name ="tempat" id="tempat" placeholder="Masukkan Tempat Lahir">
		</div>
		<div class="form-group">
		  <label for="tl">Tanggal Lahir</label>
		  <input type="date" class="form-control" name = "tl" id="tl" placeholder="YYYY/MM/DD">
		</div>
		<div class="form-group">
		  <label for="gender">Jenis Kelamin</label>
		  <select class="form-control" name = "gender" id="gender">
			<option>Laki-laki</option>
			<option>Perempuan</option>
		  </select>
		</div>
		<div class="form-group">
		  <label for="email">Email</label>
		  <input type="email" class="form-control" name = "email" id="email" placeholder="Masukkan Email">
		</div>
		<div class="form-group">
		  <label for="telp">Nomor Telepon</label>
		  <input type="text" class="form-control" name = "telp" id="telp" placeholder="Masukkan Nomor Telepon">
		</div>
		<button type="submit" class="btn btn-primary" name = "Submit">Submit</button>
		<button type="submit" class="btn btn-primary" name = "Cancel" href "index.php">Cancel</button>
	  </form>';
	  // Membaca template form.html
		$this->tpl = new Template("templates/form.html");

		// Mengganti kode Data_Tabel dengan data yang sudah diproses
		$this->tpl->replace("DATA_FORM", $formAdd);
		$this->tpl->replace("TYPE", "TAMBAH");
		// Menampilkan ke layar
		$this->tpl->write();

		if (isset($_POST['Submit'])) {
			$this->prosespasien->addDataPasien($data);
			echo "<script>
			alert('Data berhasil ditambahkan');
			document.location.href = 'index.php';
			</script>";
		}else if(isset($_POST['Cancel'])){
			header("Location: index.php");
		}
	}

	function edit($id)
	{
		$data = $this->prosespasien->getDataPasienById($id);

		// $id = $data->getId();
		$nik = $data->getNik();
		$nama = $data->getNama();
		$tempat = $data->getTempat();
		$tl = $data->getTl();
		$gender = $data->getGender();
		$email = $data->getEmail();
		$telp = $data->getTelp();

		// var_dump($data->getId());
		// die();

		$formEdit = ' <form method="post" action="">
		<input type="hidden" name="id" value="' . $id . '">
		<div class="form-group">
			<label for="nik">NIK</label>
			<input type="text" class="form-control" name="nik" id="nik" placeholder="Masukkan NIK" value="' . $nik . '">
		</div>
		<div class="form-group">
			<label for="nama">Nama</label>
			<input type="text" class="form-control" name="nama" id="nama" placeholder="Masukkan Nama" value="' . $nama . '">
		</div>
		<div class="form-group">
			<label for="tempat">Tempat Lahir</label>
			<input type="text" class="form-control" name="tempat" id="tempat" placeholder="Masukkan Tempat Lahir" value="' . $tempat . '">
		</div>
		<div class="form-group">
			<label for="tl">Tanggal Lahir</label>
			<input type="date" class="form-control" name="tl" id="tl" placeholder="YYYY/MM/DD" value="' . $tl . '">
		</div>
		<div class="form-group">
			<label for="gender">Jenis Kelamin</label>
			<select class="form-control" name="gender" id="gender">
				<option value="Laki-laki" ' . ($gender == 'Laki-laki' ? 'selected' : '') . '>Laki-laki</option>
				<option value="Perempuan" ' . ($gender == 'Perempuan' ? 'selected' : '') . '>Perempuan</option>
			</select>
		</div>
		<div class="form-group">
			<label for="email">Email</label>
			<input type="email" class="form-control" name="email" id="email" placeholder="Masukkan Email" value="' . $email . '">
		</div>
		<div class="form-group">
			<label for="telp">Nomor Telepon</label>
			<input type="text" class="form-control" name="telp" id="telp" placeholder="Masukkan Nomor Telepon" value="' . $telp . '">
		</div>
		<button type="submit" class="btn btn-primary" name="Submit">Submit</button>
		<button type="submit" class="btn btn-primary" name="Cancel" href="index.php">Cancel</button>
		</form>';

		// Membaca template form.html
		$this->tpl = new Template("templates/form.html");

		// Mengganti kode DATA_FORM dengan data yang sudah diproses
		$this->tpl->replace("DATA_FORM", $formEdit);
		$this->tpl->replace("TYPE", "EDIT");

		// Menampilkan ke layar
		$this->tpl->write();

		if (isset($_POST['Submit'])) {
			$result = $this->prosespasien->editDataPasien($_POST);
			echo "<script>
			alert('Data berhasil diubah');
			document.location.href = 'index.php';
			</script>";
		} elseif (isset($_POST['Cancel'])) {
			header("Location: index.php");
		}
	}
}
