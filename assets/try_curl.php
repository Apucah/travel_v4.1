<?php
  $ch = curl_init(); //buat resourcce cURL

	

  $data = array(
		'id' => '73282378237'
	);
  //set opsi URL dan opsi RETURNTRANSFER
  curl_setopt($ch, CURLOPT_URL, "http://id.apiku.net/cnote.php");
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_POST, true);
  curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

  //dapatkan halaman URL dan berikan ke variabel $output
  $output = curl_exec($ch);

  //tutup resource cURL
  curl_close($ch);

  //ganti kata 'gedex' dengan 'dini'
  $output = str_replace('gedex', 'dini', $output);

  //cetak output
  echo $output;
?>
