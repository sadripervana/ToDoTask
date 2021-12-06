<?php
require_once 'core/init.php';

require_once("includes/header.php");
include 'includes/navigation.php'; 

if (isset($_POST['update'])) {
	foreach($_POST['positions'] as $position) {
		$index = $position[0];
		$newPosition = $position[1];

		$db->query("UPDATE todo SET position = '$newPosition' WHERE id='$index'");
	}

	exit('success');
}
?>

		<div class="container" style="margin-top: 100px;">
			<div class="row justify-content-center">
				<div class="col-md-6 col-md-offset-6">
					<table class="table table-stripped table-hover table-bordered">
						<thead>
							<tr>
								<td>Tasks</td>
								<td>Deadline</td>
								<td>Edit</td>
							</tr>
						</thead>
						<tbody>
							<?php
							$sql = $db->query("SELECT id, title, position, priority, deadline  FROM todo WHERE user_data='$user_id' ORDER BY position");
							while($data = $sql->fetch_array()) :?>
								<tr data-index="<?=$data['id'];?>" data-position="<?=$data['position'];?>"
									<?php 
									if($data['priority'] == 'hight'){
										echo 'class="danger"';
									} elseif ($data['priority'] == 'medium'){
										echo 'class="medium"';
									}
									?>
									>
								<td>
									<div class="task">
										<input type="checkbox" id="<?=$data['id'];?>"/>
										<label for="<?=$data['id'];?>">
              			<span class="custom-checkbox"></span>
             				 <?=$data['title'];?>
            				</label>
          				</div>
        				</td>
								<td><?=$data['deadline'];?></td>
								<td> <a href="task.php?edit=<?=$data['id'];?>"  class="btn btn-sm btn-success"><i class="fas fa-bars"></i></a>
								</td>
								</tr>
								
							<?php endwhile; ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<template id="task-template">
      <div class="task">
        <input type="checkbox" />
        <label>
          <span class="custom-checkbox"></span>
        </label>
      </div>
    </template>

		<?php include_once('includes/footer.php') ?>