<?php 

include 'koneksi.php';


$nama = $_POST['namaspeda'];
$model = $_POST['modelspeda'];
$tgl = $_POST['tglspeda'];
$merk = $_POST['merkspeda'];
$qty = $_POST['qtyspeda'];

if ($nama && $model && $tgl && $merk && $qty){
	
	$sepeda = mysqli_query($koneksi, "SELECT * FROM keluar WHERE nama = '$nama'");
	while($data = mysqli_fetch_array($sepeda)){
	$qtyakhir = $data['qty'] + $qty;
	echo $qtyakhir;

	mysqli_query($koneksi,"update keluar set model='$model', merk='$merk',tgl = '$tgl', qty='$qtyakhir' where nama='$nama'");
	header('location:keluar.php');
	}
}
else{
	header("location:keluar.php?pesan=semua");
}
?>