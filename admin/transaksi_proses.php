<?php
require_once '../setting/crud.php';
require_once '../setting/koneksi.php';
require_once '../setting/tanggal.php';
require_once '../setting/fungsi.php';
session_start();

$id_user='1';

if(isset($_POST['tambah'])){	
	//Simpan Ke Sesi
	$_SESSION['tanggal']=$_POST['tanggal'];
	$_SESSION['keterangan']=$_POST['keterangan'];
	
	//Simpan Ke Tabel Sementara
	simpan($mysqli,
		$id_user,
		$_POST['id_akun'],
		$_POST['id_index'],
		$_POST['debet'],
		$_POST['kredit']);

	echo "<script>alert('Data berhasil ditambah')</script>";
	echo "<script>window.location='index.php?hal=transaksi_input&get';</script>";	

}else if(isset($_GET['hapus'])){

	//Proses hapus
	$stmt = $mysqli->prepare("DELETE FROM temp_transaksi where id=?");
	$stmt->bind_param("s",$_GET['hapus']); 

	if ($stmt->execute()) { 
		echo "<script>alert('Data Input transaksi Berhasil Dihapus')</script>";
		echo "<script>window.location='index.php?hal=transaksi_input&get';</script>";	
	} else {
		echo "<script>alert('Data admin Gagal Dihapus')</script>";
		echo "<script>window.location='javascript:history.go(-1)';</script>";
	}

}else if(isset($_GET['hapusall'])){

	//Proses hapus
	$stmt = $mysqli->prepare("DELETE FROM temp_transaksi where id_user=?");
	$stmt->bind_param("s",$_GET['hapusall']); 

	if ($stmt->execute()) { 
		echo "<script>alert('Data Input transaksi Berhasil Dihapus')</script>";
		echo "<script>window.location='index.php?hal=transaksi_input&get';</script>";	
	} else {
		echo "<script>alert('Data admin Gagal Dihapus')</script>";
		echo "<script>window.location='javascript:history.go(-1)';</script>";
	}

}else if(isset($_POST['simpan'])){	
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

}e


//Hapus Isi data

function simpan($mysqli,$id_user,$id_akun,$id_index,$debet,$kredit){
	$stmt = $mysqli->prepare("INSERT INTO temp_transaksi 
		(id_user,id_akun,id_index,debet,kredit) 
		VALUES (?,?,?,?,?)");

	$stmt->bind_param("sssss", 
		$id_user,
		$id_akun,
		$id_index,
		$debet,
		$kredit);	
	$stmt->execute();

}


?>