<!DOCTYPE html>
<html lang="en">
<head>
	<title>Table V04</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="table/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="table/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="table/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="table/vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="table/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="table/vendor/perfect-scrollbar/perfect-scrollbar.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="table/css/util.css">
	<link rel="stylesheet" type="text/css" href="table/css/main.css">
<!--===============================================================================================-->
</head>
<?php
	include 'connect_db.php';

	$sql_text1 = "SELECT * FROM users;";

	$query1 = $connection->query($sql_text1);
?>
<body>
	<div class="limiter">
		<div class="container-table100">
			<div class="wrap-table100">
				<h1 style="text-align: center;">Users Configuration</h1><br>
				<div class="table100 ver3 m-b-110">
					<div class="table100-head">
						<table>
							<thead>
								<tr class="row100 head">
									<th class="cell100 column1" style="width: 6%; border: 1px solid black;">UserID</th>
									<th class="cell100 column2" style="width: 15%; text-align: center;border: 1px solid black;">Email</th>
									<th class="cell100 column3" style="width: 25%; text-align: center;border: 1px solid black;">Password</th>
									<th class="cell100 column3" style="width: 10%; text-align: center;border: 1px solid black;">Name</th>
									<th class="cell100 column3" style="width: 10%; text-align: center;border: 1px solid black;">Surname</th>
									<th class="cell100 column3" style="width: 10%; text-align: center;border: 1px solid black;">Registered Date</th>
									<th class="cell100 column3" style="width: 8%; text-align: center;border: 1px solid black;">Delete?</th>
								</tr>
							</thead>
						</table>
					</div>

					<div class="table100-body js-pscroll">
						<table>
							<tbody>
								<?php
									if ($query1->num_rows>0) {
									while ($row = $query1->fetch_assoc()) {
										?>
										<tr class="row100 body">
										<td class="cell100 column1" style="width: 6%;"><?php echo $row['id']; ?></td>
										<td class="cell100 column2" style="width: 15%; text-align: center;"><?php echo $row['email'];?></td>
										<td class="cell100 column3" style="width: 25%; text-align: center;"><?php echo $row['password']; ?></td>
										<td class="cell100 column4" style="width: 10%; text-align: center;"><?php echo $row['name']; ?></td>
										<td class="cell100 column5" style="width: 10%; text-align: center;"><?php echo $row['surname']; ?></td>
										<td class="cell100 column1" style="width: 10%; text-align: center;"><?php echo $row['register_date']; ?></td>
										<td class="cell100 column2" style="width: 8%; text-align: center;">
											<form action="deleteuser.php" method="POST">
											<input type="hidden" name="userid" value=<?php echo "\"" . $row['id'] . "\"";?>>
											<button type="submit" class="allpostbutton"><strong style="border-bottom: 1px solid; color: #B9B9B9">Delete</strong></button>
											</form>
										</td>
										</tr>
										
										<?php
									}
								}
								?>
								
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>


<!--===============================================================================================-->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
	<script>
		$('.js-pscroll').each(function(){
			var ps = new PerfectScrollbar(this);

			$(window).on('resize', function(){
				ps.update();
			})
		});
			
		
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>