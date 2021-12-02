<?php
require_once("includes/mysqli_connect.php");
require_once("includes/header.php");
include 'includes/navigation.php'; 

if (isset($_POST['update'])) {
	foreach($_POST['positions'] as $position) {
		$index = $position[0];
		$newPosition = $position[1];

		$conn->query("UPDATE todo SET position = '$newPosition' WHERE id='$index'");
	}

	exit('success');
}
?>

		<div class="container" style="margin-top: 100px;">
			<div class="row justify-content-center">
				<div class="col-md-4 col-md-offset-4">
					<table class="table table-stripped table-hover table-bordered">
						<thead>
							<tr>
								<td>Tasks</td>
								<td>Edit</td>
							</tr>
						</thead>
						<tbody>
							<?php
							$sql = $conn->query("SELECT id, title, position FROM todo ORDER BY position");
							while($data = $sql->fetch_array()) {
								echo '
								<tr data-index="'.$data['id'].'" data-position="'.$data['position'].'">
								<td>'.$data['title'].'</td>
								<td> <a href="task.php?edit='.$data['id'].'"  class="btn btn-sm btn-success"><i class="fas fa-bars"></i></a>
								</td>
								</tr>
								';
							}
							?>
						</tbody>
					</table>
				</div>
			</div>
		</div>

		<?php include_once('includes/footer.php') ?>