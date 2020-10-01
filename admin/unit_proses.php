<?php
require_once '../setting/crud.php';
require_once '../setting/koneksi.php';
require_once '../setting/tanggal.php';
require_once '../setting/fungsi.php';

if(isset($_POST['tambah']))
{	
//Proses penambahan index
	$stmt = $mysqli->prepare("INSERT INTO tb_unit 
		(nama_unit,jenis_usaha) 
		VALUES (?,?)");

	$stmt->bind_param("ss", 
		mysqli_real_escape_string($mysqli, $_POST['nama_unit']),
		mysqli_real_escape_string($mysqli, $_POST['jenis_usaha']));	

	if ($stmt->execute()) { 
		echo "<script>alert('Data unit Berhasil Disimpan')</script>";
		echo "<script>window.location='index.php?hal=unit';</script>";	
	} else {
		echo "<script>alert('Data unit Gagal Disimpan')</script>";
		echo "<script>window.location='javascript:history.go(-1)';</script>";
	}

}else if(isset($_POST['ubah'])){

//Proses ubah data
	$stmt = $mysqli->prepare("UPDATE tb_unit  SET 
		nama_unit=?,
		jenis_usaha=?
		where id_unit=?");
	$stmt->bind_param("sss",
		mysqli_real_escape_string($mysqli, $_POST['nama_unit']),
		mysqli_real_escape_string($mysqli, $_POST['jenis_usaha']),
		mysqli_real_escape_string($mysqli, $_POST['kode']));	

	if ($stmt->execute()) { 
		echo "<script>alert('Data unit Berhasil Diubah')</script>";
		echo "<script>window.location='index.php?hal=unit';</script>";	
	} else {
		echo "<script>alert('Data unit Gagal Diubah')</script>";
		echo "<script>window.location='javascript:history.go(-1)';</script>";
	}

}else if(isset($_GET['hapus'])){

	//Proses hapus
	$stmt = $mysqli->prepare("DELETE FROM tb_unit where id_unit=?");
	$stmt->bind_param("s",mysqli_real_escape_string($mysqli, $_GET['hapus'])); 

	if ($stmt->execute()) { 
		echo "<script>alert('Data unit Berhasil Dihapus')</script>";
		echo "<script>window.location='index.php?hal=unit';</script>";	
	} else {
		echo "<script>alert('Data unit Gagal Dihapus')</script>";
		echo "<script>window.location='javascript:history.go(-1)';</script>";
	}

}
?>