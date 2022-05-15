<?php
// Declare function to calculate possibility to push through the door an object
function pushThrough ($x, $y, $z, $x1, $y1) {
	$door_area = $x1*$y1;
	$possible = 'IT`S POSSIBLE';
	$impossible = 'IT`S IMPOSSIBLE';
	
	if (($x*$y < $door_area) or ($x*$z < $door_area) or ($y*$z < $door_area)) {
		return $possible;
	} else {
		return $impossible;
	}
}

$x = $y = $z = $x1 = $y1 = 0;
$result = '';

// Check form info is send
if (isset($_POST['button'])) {
	$x = $_POST['object_height'];
	$y = $_POST['object_width'];
	$z = $_POST['object_length'];
	$x1 = $_POST['door_height'];
	$y1 = $_POST['door_width'];

	$result = pushThrough($x, $y, $z, $x1, $y1);
}
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>TASK</title>
  </head>
  <body>
		<div class="container">
			<div class="row">
				<div class="col-lg-5 mx-auto">
					<div class="card my-3">
						<div class="card-header">
							Calculate the possibility of pushing an object through a door
						</div>
						<div class="card-body">
							<?php if ($result != ''): ?>
							<div class="alert alert-primary" role="alert">
								<p class="fw-bold">RESULT: <?=$result?>!</p>
								<ul class="list-unstyled">
									<li>Object height in centimeters: <?=$x?></li>
									<li>Object width in centimeters: <?=$y?></li>
									<li>Object length in centimeters: <?=$z?></li>
									<li>Door height in centimeters: <?=$x1?></li>
									<li>Door width in centimeters: <?=$y1?></li>
								</ul>
							</div>
							<?php endif; ?>
							<form method="post">
								<div class="mb-3">
										<label for="height" class="form-label">Object height in centimeters</label>
										<input type="number" name="object_height" class="form-control" id="height" placeholder="200" min="1" required>
								</div>
								<div class="mb-3">
										<label for="width" class="form-label">Object width in centimeters</label>
										<input type="number" name="object_width" class="form-control" id="width" placeholder="80" min="1" required>
								</div>
								<div class="mb-3">
										<label for="length" class="form-label">Object length in centimeters</label>
										<input type="number" name="object_length" class="form-control" id="length" placeholder="145" min="1" required>
								</div>
								<div class="mb-3">
										<label for="door_height" class="form-label">Door height in centimeters</label>
										<input type="number" name="door_height" class="form-control" id="door_height" placeholder="250" min="1" required>
								</div>
								<div class="mb-3">
										<label for="door_width" class="form-label">Door width in centimeters</label>
										<input type="number" name="door_width" class="form-control" id="door_width" placeholder="160" min="1" required>
								</div>
								<div class="d-grid">
									<input type="submit" name="button" value="Calculate" class="btn btn-primary">
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>
