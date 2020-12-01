<?php
require_once '../setting/crud.php';
require_once '../setting/koneksi.php';
require_once '../setting/tanggal.php';
require_once '../setting/fungsi.php';

if(isset($_POST['tambah']))
{	
//Proses penambahan index
	$password=$_POST['password'];
	$uppercase = preg_match('@[A-Z]@', $password);
	$lowercase = preg_match('@[a-z]@', $password);
	$number    = preg_match('@[0-9]@', $password);
	$symbol    = preg_match('/[^\p{L}\d\s@#]/u', $password);

	echo $uppercase;
	echo $lowercase;
	echo $number;
	echo $symbol;


	if(!$uppercase || !$lowercase || !$number || !$symbol || strlen($password) < 8) {
		echo "<script>alert('Password minimal 8 Character dengan ada huruf kecil, besar, symbol dan Nomor')</script>";
		echo "<script>window.location='javascript:history.go(-1)';</script>";

	}else{
		$stmt = $mysqli->prepare("INSERT INTO tb_user 
			(nama_user,nama_lengkap_user,username,password,id_unit,level_user) 
			VALUES (?,?,?,?,?,?)");

		$stmt->bind_param("ssssss", 
			$_POST['nama_user'],
			$_POST['nama_lengkap_user'],
			$_POST['username'],
			$_POST['password'],
			$_POST['id_unit'],
			$_POST['level_user']);	

		if ($stmt->execute()) { 
			echo "<script>alert('Data user Berhasil Disimpan')</script>";
			echo "<script>window.location='index.php?hal=user';</script>";	
		} else {
			echo "<script>alert('Data user Gagal Disimpan')</script>";
			echo "<script>window.location='javascript:history.go(-1)';</script>";
		}
	}

}else if(isset($_POST['ubah'])){

//Proses ubah data
	$password=$_POST['password'];
	$uppercase = preg_match('@[A-Z]@', $password);
	$lowercase = preg_match('@[a-z]@', $password);
	$number    = preg_match('@[0-9]@', $password);
	$symbol    = preg_match('/[^\p{L}\d\s@#]/u', $password);


	if(!$uppercase || !$lowercase || !$number || !$symbol || strlen($password) < 8) {
		echo "<script>alert('Password minimal 8 Character dengan ada huruf kecil, besar, symbol dan Nomor')</script>";
		echo "<script>window.location='javascript:history.go(-1)';</script>";

	}else{
		$stmt = $mysqli->prepare("UPDATE tb_user  SET 
			nama_user=?,
			nama_lengkap_user=?,
			username=?,
			password=?,
			id_unit=?,
			level_user=?
			where id_user=?");
		$stmt->bind_param("sssssss",
			$_POST['nama_user'],
			$_POST['nama_lengkap_user'],
			$_POST['username'],
			$_POST['password'],
			$_POST['id_unit'],
			$_POST['level_user'],
			$_POST['id_user']);	

		if ($stmt->execute()) { 
			echo "<script>alert('Data user Berhasil Diubah')</script>";
			echo "<script>window.location='index.php?hal=user';</script>";	
		} else {
			echo "<script>alert('Data user Gagal Diubah')</script>";
			echo "<script>window.location='javascript:history.go(-1)';</script>";
		}
	}

}else if(isset($_GET['hapus'])){

	//Proses hapus
	$stmt = $mysqli->prepare("DELETE FROM tb_user where id_user=?");
	$stmt->bind_param("s",$_GET['hapus']); 

	if ($stmt->execute()) { 
		echo "<script>alert('Data user Berhasil Dihapus')</script>";
		echo "<script>window.location='index.php?hal=user';</script>";	
	} else {
		echo "<script>alert('Data user Gagal Dihapus')</script>";
		echo "<script>window.location='javascript:history.go(-1)';</script>";
	}

}
?>