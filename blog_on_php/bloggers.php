<?php 
include 'connect_db.php';

if (isset($user)) {
	?>
	<h2 style="text-align: center;">Bloggers</h2>
	<div style="height: 300px; overflow: auto; width: 600px; padding-left: 370px;">
		<input style="width: 600px; text-align: center;" type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name">
		<hr>
		<table style="width: 100%; border-collapse: collapse; border: 1px solid black;" id="myTable">
			<?php 
				$sql_text = "SELECT * FROM users";
				$query = $connection->query($sql_text);

				if ($query->num_rows>0) {
					while ($row = $query->fetch_assoc()) {
						if ($row['id']!=$user->id) {
						?>
						<tr>
							<td style="text-align: center; border: 1px solid black;">
								<form action="?page=userprofile" method="POST">
								<input type="hidden" name="userid" value=<?php echo "\"" . $row['id'] . "\"";?>>
								<button type="submit" class="allpostbutton"><strong style="border-bottom: 1px solid #444;"><?php echo $row['name'] . " " . $row['surname']; ?></strong></button>	
								</form>
							</td>
							<td style="border: 1px solid black; text-align: center;">
								<form action="?page=messages" method="POST">
								<input type="hidden" name="userid" value=<?php echo "\"" . $row['id'] . "\"";?>>
								<button type="submit" class="allpostbutton"><strong style="border-bottom: 1px solid #444;">Chat</strong></button></form>
							</td>
						</tr>
						<?php
						}
						/*else {
						?>
						<tr>
							<td style="text-align: center; width: 70%">
								<form action="?page=profile">
								<button type="submit" class="allpostbutton"><strong style="border-bottom: 1px solid #444;"><?php echo $row['name'] . " " . $row['surname']; ?></strong></button>	
								</form>
							</td>
							<td style="width: 30%;">asdad</td>
						</tr>
						<?php	
						}*/
					}
				}
			?>
			
		</table>
		<script>
			function myFunction() {
			  var input, filter, table, tr, td, i, txtValue;
			  input = document.getElementById("myInput");
			  filter = input.value.toUpperCase();
			  table = document.getElementById("myTable");
			  tr = table.getElementsByTagName("tr");
			  for (i = 0; i < tr.length; i++) {
			    td = tr[i].getElementsByTagName("td")[0];
			    if (td) {
			      txtValue = td.textContent || td.innerText;
			      if (txtValue.toUpperCase().indexOf(filter) > -1) {
			        tr[i].style.display = "";
			      } else {
			        tr[i].style.display = "none";
			      }
			    }       
			  }
			}
		</script>
	</div>
	<?php	
}
else {
	header("location: index.php");
}

?>