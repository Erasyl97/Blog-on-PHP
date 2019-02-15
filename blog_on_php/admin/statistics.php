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
	$sql_text2 = "SELECT * FROM users WHERE online=1;";
	$sql_text3 = "SELECT * FROM posts;";

	$query1 = $connection->query($sql_text1);
	$query2 = $connection->query($sql_text2);
	$query3 = $connection->query($sql_text3);
?>
<body>
	<div class="limiter">
		<div class="container-table100">
			<div class="wrap-table100">
				<h1 style="text-align: center;">Statistics of the Blog.com</h1><br>
				<div class="table100 ver3 m-b-110">
					<div class="table100-head">
						<table>
							<thead>
								<tr class="row100 head">
									<th class="cell100 column1" style="width: 33%;">Number of Users</th>
									<th class="cell100 column2" style="width: 34%; text-align: center;">Online Users</th>
									<th class="cell100 column3" style="width: 33%; text-align: center;">Number of Posts</th>
								</tr>
							</thead>
						</table>
					</div>

					<div class="table100-body js-pscroll">
						<table>
							<tbody>
								<tr class="row100 body">
									<td class="cell100 column1" style="width: 33%;"><?php echo $query1->num_rows; ?></td>
									<td class="cell100 column2" style="width: 33%; text-align: center;"><?php echo $query2->num_rows; ?></td>
									<td class="cell100 column3" style="width: 33%; text-align: center;"><?php echo $query3->num_rows; ?></td>
								</tr>
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