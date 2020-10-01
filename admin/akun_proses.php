<?php
require_once '../setting/crud.php';
require_once '../setting/koneksi.php';
require_once '../setting/tanggal.php';
require_once '../setting/fungsi.php';

if(isset($_POST['tambah']))
{	
//Proses penambahan akun
	$stmt = $mysqli->prepare("INSERT INTO tb_akun 
		(kode_akun,nama_akun) 
		VALUES (?,?)");

	$stmt->bind_param("ss", 
		mysqli_real_escape_string($mysqli, $_POST['kode_akun']),
		mysqli_real_escape_string($mysqli, $_POST['nama_akun']));	

	if ($stmt->execute()) { 
		echo "<script>alert('Data akun Berhasil Disimpan')</script>";
		echo "<script>window.location='index.php?hal=akun';</script>";	
	} else {
		echo "<script>alert('Data akun Gagal Disimpan')</script>";
		echo "<script>window.location='javascript:history.go(-1)';</script>";
	}

}else if(isset($_POST['ubah'])){

//Proses ubah data
	$stmt = $mysqli->prepare("UPDATE tb_akun  SET 
		nama_akun=?
		where kode_akun=?");
	$stmt->bind_param("ssss",
		mysqli_real_escape_string($mysqli, $_POST['nama_akun']),
		mysqli_real_escape_string($mysqli, $_POST['kode_akun']));	

	if ($stmt->execute()) { 
		echo "<script>alert('Data akun Berhasil Diubah')</script>";
		echo "<script>window.location='index.php?hal=akun';</script>";	
	} else {
		echo "<script>alert('Data akun Gagal Diubah')</script>";
		echo "<script>window.location='javascript:history.go(-1)';</script>";
	}

}else if(isset($_GET['hapus'])){

	//Proses hapus
	$stmt = $mysqli->prepare("DELETE FROM tb_akun where kode_akun=?");
	$stmt->bind_param("s",mysqli_real_escape_string($mysqli, $_GET['hapus'])); 

	if ($stmt->execute()) { 
		echo "<script>alert('Data akun Berhasil Dihapus')</script>";
		echo "<script>window.location='index.php?hal=akun';</script>";	
	} else {
		echo "<script>alert('Data akun Gagal Dihapus')</script>";
		echo "<script>window.location='javascript:history.go(-1)';</script>";
	}

}
?>