<?php
require_once '../setting/crud.php';
require_once '../setting/koneksi.php';
require_once '../setting/tanggal.php';
require_once '../setting/fungsi.php';

if(isset($_POST['tambah']))
{	
//Proses penambahan index
	$stmt = $mysqli->prepare("INSERT INTO tb_user 
		(nama_user,nama_lengkap_user,username,password,id_unit) 
		VALUES (?,?,?,?,?)");

	$stmt->bind_param("sssss", 
		$_POST['nama_user'],
		$_POST['nama_lengkap_user'],
		$_POST['username'],
		$_POST['password'],
		$_POST['id_unit']);	

	if ($stmt->execute()) { 
		echo "<script>alert('Data user Berhasil Disimpan')</script>";
		echo "<script>window.location='index.php?hal=user';</script>";	
	} else {
		echo "<script>alert('Data user Gagal Disimpan')</script>";
		echo "<script>window.location='javascript:history.go(-1)';</script>";
	}

}else if(isset($_POST['ubah'])){

//Proses ubah data
	$stmt = $mysqli->prepare("UPDATE tb_user  SET 
		nama_user=?,
		nama_lengkap_user=?,
		username=?,
		password=?,
		id_unit=?
		where id_user=?");
	$stmt->bind_param("ssssss",
		$_POST['nama_user'],
		$_POST['nama_lengkap_user'],
		$_POST['username'],
		$_POST['password'],
		$_POST['id_unit'],
		$_POST['id_user']);	

	if ($stmt->execute()) { 
		echo "<script>alert('Data user Berhasil Diubah')</script>";
		echo "<script>window.location='index.php?hal=user';</script>";	
	} else {
		echo "<script>alert('Data user Gagal Diubah')</script>";
		echo "<script>window.location='javascript:history.go(-1)';</script>";
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