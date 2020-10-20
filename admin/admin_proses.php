<?php
require_once '../setting/crud.php';
require_once '../setting/koneksi.php';
require_once '../setting/tanggal.php';
require_once '../setting/fungsi.php';

if(isset($_POST['tambah']))
{	
//Proses penambahan index
	$stmt = $mysqli->prepare("INSERT INTO tb_admin 
		(nama_admin,nama_lengkap_admin,username,password) 
		VALUES (?,?,?,?)");

	$stmt->bind_param("ssss", 
		$_POST['nama_admin'],
		$_POST['nama_lengkap_admin'],
		$_POST['username'],
		$_POST['password']);	

	if ($stmt->execute()) { 
		echo "<script>alert('Data admin Berhasil Disimpan')</script>";
		echo "<script>window.location='index.php?hal=admin';</script>";	
	} else {
		echo "<script>alert('Data admin Gagal Disimpan')</script>";
		echo "<script>window.location='javascript:history.go(-1)';</script>";
	}

}else if(isset($_POST['ubah'])){

//Proses ubah data
	$stmt = $mysqli->prepare("UPDATE tb_admin  SET 
		nama_admin=?,
		nama_lengkap_admin=?,
		username=?,
		password=?
		where id_admin=?");
	$stmt->bind_param("sssss",
		$_POST['nama_admin'],
		$_POST['nama_lengkap_admin'],
		$_POST['username'],
		$_POST['password'],
		$_POST['id_admin']);	

	if ($stmt->execute()) { 
		echo "<script>alert('Data admin Berhasil Diubah')</script>";
		echo "<script>window.location='index.php?hal=admin';</script>";	
	} else {
		echo "<script>alert('Data admin Gagal Diubah')</script>";
		echo "<script>window.location='javascript:history.go(-1)';</script>";
	}

}else if(isset($_GET['hapus'])){

	//Proses hapus
	$stmt = $mysqli->prepare("DELETE FROM tb_admin where id_admin=?");
	$stmt->bind_param("s",$_GET['hapus']); 

	if ($stmt->execute()) { 
		echo "<script>alert('Data admin Berhasil Dihapus')</script>";
		echo "<script>window.location='index.php?hal=admin';</script>";	
	} else {
		echo "<script>alert('Data admin Gagal Dihapus')</script>";
		echo "<script>window.location='javascript:history.go(-1)';</script>";
	}

}
?>