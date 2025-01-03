<!DOCTYPE html>
<html>
<head>
	<title>Hasil Kalkulator Sederhana</title>
</head>
<body>
	<h2>Hasil Kalkulator Sederhana</h2>
	<?php
		$angka1 = $_POST["angka1"];
		$angka2 = $_POST["angka2"];
		$operator = $_POST["operator"];

		if ($operator == "tambah") {
			$hasil = $angka1 + $angka2;
			echo "<p>Hasil dari $angka1 + $angka2 adalah $hasil</p>";
		} elseif ($operator == "kurang") {
			$hasil = $angka1 - $angka2;
			echo "<p>Hasil dari $angka1 - $angka2 adalah $hasil</p>";
		} elseif ($operator == "kali") {
			$hasil = $angka1 * $angka2;
			echo "<p>Hasil dari $angka1 x $angka2 adalah $hasil</p>";
		} elseif ($operator == "bagi") {
			$hasil = $angka1 / $angka2;
			echo "<p>Hasil dari $angka1 / $angka2 adalah $hasil</p>";
		} else {
			echo "<p>Operator tidak dikenali</p>";
		}
	?>
</body>
</html>