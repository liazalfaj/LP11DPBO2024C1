<?php

/******************************************
Asisten Pemrogaman 13
 ******************************************/

class TabelPasien extends DB
{
	function getPasien()
	{
		// Query mysql select data pasien
		$query = "SELECT * FROM pasien";
		// Mengeksekusi query
		return $this->execute($query);
	}

	function getPasienById($id)
	{
		// Query mysql select data pasien berdasarkan id
		$query = "SELECT * FROM pasien WHERE id = $id";
		// Mengeksekusi query
		return $this->execute($query);
	}

	function deletePasien($id)
	{
		// Query mysql delete data pasien berdasarkan id
		$query = "DELETE FROM pasien WHERE id = $id";
		// Mengeksekusi query
		return $this->execute($query);
	}

	function createPasien($data){
		$nik = $data['nik'];
		$nama = $data['nama'];
		$tempat = $data['tempat'];
		$tl = $data['tl'];
		$gender = $data['gender'];
		$email = $data['email'];
		$telp = $data['telp'];
		// Query mysql insert data pasien
		$query = "insert into pasien values('','$nik','$nama','$tempat','$tl','$gender','$email','$telp')";

        // Mengeksekusi query
        return $this->execute($query);
	}

	function updatePasien($data){
		$id = $data['id'];
		$nik = $data['nik'];
		$nama = $data['nama'];
		$tempat = $data['tempat'];
		$tl = $data['tl'];
		$gender = $data['gender'];
		$email = $data['email'];
		$telp = $data['telp'];
		// Query mysql update data pasien	  
		$query = "update pasien set nik='$nik', nama='$nama', tempat='$tempat', tl='$tl', gender='$gender', email='$email', telp='$telp' where id='$id'";

		// Mengeksekusi query
		return $this->execute($query);
	}

	
}
