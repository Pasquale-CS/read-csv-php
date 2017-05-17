<?php
	
	require_once('../src/pcs/read-csv/PcsReadCsv.php');

	$upload = false;

	if(isset($_FILES['csv']) && !empty($_FILES['csv']))
	{
		$csv = new PcsReadCsv($_FILES['csv']);

		if(isset($_POST['is-title']))
			$csv->set_is_title(true);

		if(!empty($_POST['length']))
			$csv->set_rows_number($_POST['length']);

		if(!empty($_POST['delimiter']))
			$csv->set_delimiter($_POST['delimiter']);

		if(!empty($_POST['enclosure']))
			$csv->set_enclosure($_POST['enclosure']);

		if(!empty($_POST['escape']))
			$csv->set_escape($_POST['escape']);

		$upload = true;
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Read CSV</title>

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>

	<div class="container">
		<h3>Read CSV</h3>
		<form class="form-inline" method="post" enctype="multipart/form-data">
			<div class="form-group">
				<label class="sr-only" for="csv">Upload file CSV *</label>
				<input type="file" id="csv" name="csv" placeholder="Upload file CSV">
			</div>
			<div class="checkbox">
				<label>
					First row is title? <input type="checkbox" name="is-title">
				</label>
			</div>
			<br><br>
			<div class="form-group">
				<label class="sr-only" for="length">Length</label>
				<input type="number" class="form-control" id="length" name="length" placeholder="Length">
			</div>
			<div class="form-group">
				<label class="sr-only" for="delimiter">Delimiter</label>
				<input type="text" class="form-control" id="delimiter" name="delimiter" placeholder="Delimiter (Default: ;)">
			</div>
			<div class="form-group">
				<label class="sr-only" for="enclosure">Enclosure</label>
				<input type="text" class="form-control" id="enclosure" name="enclosure" placeholder='Enclosure (Default: ")'>
			</div>
			<div class="form-group">
				<label class="sr-only" for="escape">Escape</label>
				<input type="text" class="form-control" id="escape" name="escape" placeholder="Escape (Default: \)">
			</div>
			<button type="submit" class="btn btn-primary">Read CSV</button>
		</form>

		<hr>

		<?= ($upload) ? $csv->print_table('table') : '' ?>
	</div>

</body>
</html>