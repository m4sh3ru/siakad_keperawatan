<?php

class Konversi {


	public static function formatRupiah($input) {
		return 'Rp. '.number_format($input, 0, ',', '.');
	}

	public static function formatTanggal($input) {
		
	//	$date = date('d-m-Y H:i:s');

		$month = ['Januari', 'Februari', 'Maret', 'April',
		'Mei', 'Juni', 'Juli', 'Agustus', 'September',
		'Oktober', 'Nopember', 'Desember'];
		$input = explode('-',$input );
		return $input[2].'-'.$month[$input[1]-1].'-'.$input[0];
	}

}