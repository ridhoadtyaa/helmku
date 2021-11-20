<?php 
function format_rupiah($angka){
	$hasil_rupiah = "Rp. " . number_format($angka,0,',','.');
	return $hasil_rupiah;
}
function format_angka($angka){
	$hasil_rupiah = number_format($angka,0,',','.');
	return $hasil_rupiah;
}
?>