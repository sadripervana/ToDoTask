<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/PHPProjects/ToDoTask/core/init.php';
// require_once $_SERVER['DOCUMENT_ROOT'].'/eCommerce/core/init.php';
if(!is_loged_in()){
	login_error_redirect();
}
include 'includes/head.php';
include 'includes/navigation.php';

//Delete todo
if(isset($_GET['delete'])){
	$id = sanitize($_GET['delete']);
	$db->query("DELETE FROM todo WHERE id ='$id'");
	header('Location: index.php');
}


if(isset($_GET['add']) || isset($_GET['edit'])){

	$title = ((isset($_POST['title'])?$_POST['title']:''));
	$text = ((isset($_POST['text'])?$_POST['text']:''));
	$priority = ((isset($_POST['priority'])?$_POST['priority']:''));
	$deadline = ((isset($_POST['deadline'])?$_POST['deadline']:''));



	if(isset($_GET['edit'])){
		$edit_id = (int)$_GET['edit'];
		$todoResults = $db->query("SELECT * FROM todo WHERE id = '$edit_id'");

		$todo = mysqli_fetch_assoc($todoResults);
		
		$title = ((isset($_POST['title'])?$_POST['title']:$todo['title']));
		$text = ((isset($_POST['text'])?$_POST['text']:$todo['text']));
		$priority = ((isset($_POST['priority'])?$_POST['priority']:$todo['priority']));
		$deadline = ((isset($_POST['deadline'])?$_POST['deadline']:$todo['deadline']));
	}

	if($_POST){
		$errors = [];
		$require = ['title','text'];
		foreach ($require as $field) {
			if($_POST[$field] == '') {
				$errors[] = 'All Fields With and Astrisk are required.';
				break;
			}
		}

		if(!empty($errors)){
			echo display_errors($errors);
		} else {
			$insertSql = "INSERT INTO todo(`title`, `text`, `position`, `priority`, `user_data`, `deadline`) VALUES ('$title', '$text', null, '$priority', '$user_id', '$deadline')";
			
			if(isset($_GET['edit'])){
				$insertSql = "UPDATE todo SET title = '$title', text = '$text', priority = '$priority', user_data = '$user_id', deadline = '$deadline' WHERE id = '$edit_id'";
			}
			$db->query($insertSql);
			header('Location: index.php');
		}
	}
	?>
	<h2 class="text-center"><?=((isset($_GET['edit']))?'Edit':'Add a New');?> ToDo</h2>
	<form action="index.php?<?=((isset($_GET['edit']))?'edit=' . $edit_id :'add=1'); ?>" method="post" enctype="multipart/form-data">
		<div class="form-group col-md-3">
			<label for="title">Title*:</label>
			<input type="text" name="title" class="form-control" id="title" value="<?=$title;?>">
		</div>
		
	
	<div class="form-group col-md-4">
		
			<label for="text">Text</label>
			<textarea rows="15" cols="50" id="text" name="text"><?=$text;?></textarea>
	</div>
	<div class="form-group col-md-2">
			<label for="priority">Priority:</label>
			<select class="form-control" name="priority"  id="priority">
				<option value="low">low</option>
				<option value="medium">medium</option>
				<option value="high">high</option>
			</select>
		</div>
		<div class="form-group col-md-2">
			<label for="deadline">Deadline</label>
		<input type="text" placeholder="10-12-2021 exp" name="deadline" class="form-control" id="deadline" value="<?=$deadline;?>">
	</div>
	<div class="form-group pull-right">
		<a href="index.php" class="btn btn-default">Cancel</a>
		<input type="submit" value="<?=((isset($_GET['edit']))?'Edit':'Add a New');?> Task" class="btn btn-success " >
	</div>
	<div class="clearfix"></div>
</form>

<?php
} else {
	$sql = "SELECT id, title,text, position, priority, deadline  FROM todo WHERE user_data='$user_id' ORDER BY position";
	$presults = $db->query($sql);
	
	?>

	<h2 class="text-center">ToDO</h2>
	<a href="index.php?add=1" class="btn btn-success pull-right" id="add-product-btn">Add Task</a>
	<div class="clearfix"></div>
	<table class="table table-bordered table-condensed table-striped">
		<thead>
			<th>Edit or Delete</th>
			<th>Tasks</th>
			<th>Text</th>
			<th>Priority</th>
			<th>Deadline</th>
		</thead>
		<tbody>
			<?php while($todo = mysqli_fetch_assoc($presults)):
				
				?>
				<tr>
					<td>
						<a href="index.php?edit=<?=$todo['id'];?>" class="btn btn-xs btn-default"><i class="far fa-edit"></i></a>
						<a href="index.php?delete=<?=$todo['id'];?>" class="btn btn-xs btn-default"><i class="fal fa-times"></i></a>
					</td>
					<td>
						<?=$todo['title']; ?>
						
						
					</td>
					<td><?php echo $todo['text'];?></td>
					<td><?php echo $todo['priority'];?></td>
					<td><?php echo $todo['deadline'];?></td>
				</tr>

			<?php endwhile; ?>
		</tbody>
	</table>



<?php } include 'includes/footer.php'; ?>

