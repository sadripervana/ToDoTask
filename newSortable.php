<?php 
require ('includes/mysqli_connect.php');

if(isset($_POST['update'])){
	foreach($_POST['positions'] as $position){
		$index = $position[0];
		$newPosition = $position[1];
$q = "UPDATE todo set  display_order='$newPosition' WHERE id='$index'";
		$result= mysqli_query($dbcon, $q);
	}
	exit('success');

	}
 ?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>
<body>
	<div class="container" style="margin-top:100px;">
		<div class="row justify-content-center">
			<div class="col-md-4 col-md-offset-4">
				<table class="table table-stripped table-hover table-bordered">
					<thead>
						<th>
							Title
						</th>
					</thead>
					<tbody>
						<?php 
              $q = "SELECT * FROM todo ORDER BY display_order ASC";
							$result = mysqli_query($dbcon, $q);
              while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
              	echo ' <tr data-index="' . $row['id'] .'" data-position="' . $row['display_order'] .'"> 
                     <td> ' . $row['title'] .' </td>
                   <tr>
              	';
              }
						 ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>

	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

	<script src="https://code.jquery.com/ui/1.13.0/jquery-ui.min.js" integrity="sha256-hlKLmzaRlE8SCJC1Kw8zoUbU8BxA+8kR3gseuKfMjxA=" crossorigin="anonymous"></script>

	<script>
		$(document).ready(function(){
			$('table tbody').sortable({
				update:function(event, ui){
					$(this).children().each(function(index){
						if($(this).attr('data-position') != (index + 1)){
							$(this).attr('data-position', (index + 1)).addClass('updated');
						}
					});
					saveNewPositions();
				}
			});
		});

		function saveNewPositions(){
			var postions = [];
			$('updated').each(function(){
				positions.push([$(this).attr(data-index), $(this).attr(data-position)]);
				$(this).removeClass('updated');
			});

			$.ajax({
				url : 'newSortable.php',
				method: 'POST',
				dataType :'text',
				data:{
					update:1,
					possitions:positions
				}, success function(response){
					console.log(response);
				}
			})
		}
	</script>
</body>
</html>