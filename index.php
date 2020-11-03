<!DOCTYPE HTML>
<html>
	<head>
		<title>Vigenere Cipher - Nomor 5</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
	<body>

	<?php

	
	$key = "";
	$text = "";
	$error = "";
	$valid = true;
	$color = "#FF0000";


if ($_SERVER['REQUEST_METHOD'] == "POST")
{
	
	require_once('vigenere.php');
	
	
	$key = $_POST['key'];
	$text = $_POST['text'];
	
	
	if (empty($_POST['key']))
	{
		$error = "Masukkan key";
		$valid = false;
	}
	
	
	else if (empty($_POST['text']))
	{
		$error = "Masukkan teks";
		$valid = false;
	}
	
	
	else if (isset($_POST['key']))
	{
		if (!ctype_alpha($_POST['key']))
		{
			$error = "Key yang dimasukkan harus huruf";
			$valid = false;
		}
	}
	
	
	if ($valid)
	{
		
		if (isset($_POST['encrypt']))
		{
			$text = encrypt($key, $text);
			$error = "Teks berhasil dienkripsi";
			$color = "#526F35";
		}
			
		
		if (isset($_POST['decrypt']))
		{
			$text = decrypt($key, $text);
			$error = "Teks berhasil didekripsi";
			$color = "#526F35";
		}
	}
}

?>


			<section id="main" class="wrapper">
				<div class="container">
					
			
			<section>
				<h3>Kriptografi - Vigenere Cipher Modifikasi</h3>
					<form method="post" action="#">
						<div class="row uniform 50%">								
							<div class="12u$">
								<label for="Kunci">Key (Harus lebih dari 1 huruf)</label>
								<input type="text" class="form-control" name="key" required="true" id="kunci" aria-describedby="inputKunci" placeholder="Masukkan Key" value="<?php echo $key; ?>">
							</div>

							<div class="6u 12u$(xsmall)">
								<label for="Plaintext">Plainteks atau Cipherteks</label>
								<textarea class="form-control" name="text" required="true" id="text" rows="5"><?php echo $text; ?></textarea>
							</div>

							<div class="12u$">
								<button type="submit" name="encrypt" value="Encrypt">Enkripsi</button>
								<button type="submit" name="decrypt" value="Decrypt">Dekripsi</button>
							</div>
						</div>
					</form>
				</section>

				

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>