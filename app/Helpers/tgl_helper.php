<?php

function tgl_bulanTahun($tanggal){
	$bulan = array (
		1 =>   'Januari',
		'Februari',
		'Maret',
		'April',
		'Mei',
		'Juni',
		'Juli',
		'Agustus',
		'September',
		'Oktober',
		'November',
		'Desember'
	);
	$pecahkan = explode('-', $tanggal);
	
	// variabel pecahkan 0 = bulan
	// variabel pecahkan 1 = tanggal
	// variabel pecahkan 2 = tahun

	return $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
}