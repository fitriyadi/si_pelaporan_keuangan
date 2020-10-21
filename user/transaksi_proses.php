<?php
require_once '../setting/crud.php';
require_once '../setting/koneksi.php';
require_once '../setting/tanggal.php';
require_once '../setting/fungsi.php';
session_start();

$id_user=$_SESSION['id'];

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

	//print_r($_POST);	
	//Proses penambahan index
	$query      = "SELECT * from temp_transaksi where id_user='$id_user'";
	$result     = $mysqli->query($query);
	$num_result = $result->num_rows;
	if ($num_result > 0) {
		while ($data = mysqli_fetch_assoc($result)) {
			//print_r($data);
			extract($data);

			$stmt = $mysqli->prepare("INSERT INTO tb_transaksi 
				(id_transaksi,tanggal,id_unit,kode_akun,id_index,keterangan,debet,kredit) 
				VALUES (?,?,?,?,?,?,?,?)");

			$stmt->bind_param("ssssssss", 
				$_POST['id_transaksi'],
				$_POST['tanggal'],
				$_POST['id_unit'],
				$id_akun,
				$id_index,
				$_POST['keterangan'],
				$debet,
				$kredit);	

			$stmt->execute();
		}
	}	

	//Clear Data
	mysqli_query($mysqli,"DELETE FROM temp_transaksi where id_user='$id_user'");

	//Notif
	echo "<script>alert('Transaksi Berhasil Disimpan')</script>";
	echo "<script>window.location='index.php?hal=transaksi_data';</script>";	
}


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