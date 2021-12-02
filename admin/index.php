<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/PHPProjects/ToDoTask/core/init.php';
// require_once $_SERVER['DOCUMENT_ROOT'].'/eCommerce/core/init.php';
if(!is_loged_in()){
	login_error_redirect();
}
include 'includes/head.php';
include 'includes/navigation.php';

//Delete Product
if(isset($_GET['delete'])){
	$id = sanitize($_GET['delete']);
	$db->query("DELETE FROM tod WHERE id ='$id'");
	$_SESSION['success_flash'] = 'Product successfuly deleted.';
	header('Location: index.php');
}
$dbpath = '';


if(isset($_GET['add']) || isset($_GET['edit'])){

	$title = ((isset($_POST['title'])?$_POST['title']:''));
	$text = ((isset($_POST['text'])?$_POST['text']:''));

	$saved_image = '';



	if(isset($_GET['edit'])){
		$variablesEdit = [];
		$edit_id = (int)$_GET['edit'];
		$productResults = $db->query("SELECT * FROM todo WHERE id = '$edit_id'");

		$product = mysqli_fetch_assoc($productResults);
		
		$title = ((isset($_POST['title'])?$_POST['title']:$product['title']));
		$text = ((isset($_POST['text'])?$_POST['text']:$product['text']));

		
		
	}
   else {
		$sizesArray = [];
	}

	if($_POST){
		$errors = [];
		$require = ['title','text'];
		$allowed = ['png', 'jpg', 'jpeg', 'gif'];
		$tmpLoc = [];
		$uploadPath = [];
		foreach ($require as $field) {
			if($_POST[$field] == '') {
				$errors[] = 'All Fields With and Astrisk are required.';
				break;
			}
		}


		
		if(!empty($errors)){
			echo display_errors($errors);
		} else {
			$insertSql = "INSERT INTO todo(`title`, `text`, `position`) VALUES ('$title', '$text', null)";
			
			if(isset($_GET['edit'])){
				$insertSql = "UPDATE todo SET title = '$title', text = '$text'  WHERE id = '$edit_id'";
			}
			$db->query($insertSql);
			header('Location: index.php');
		}
	}
	?>
	<h2 class="text-center"><?=((isset($_GET['edit']))?'Edit':'Add a New');?> Album</h2>
	<form action="index.php?<?=((isset($_GET['edit']))?'edit=' . $edit_id :'add=1'); ?>" method="post" enctype="multipart/form-data">
		<div class="form-group col-md-3">
			<label for="title">Title*:</label>
			<input type="text" name="title" class="form-control" id="title" value="<?=$title;?>">
		</div>
		
	
	<div class="form-group col-md-6">
		
			<label for="photo">Text</label>
			<textarea rows="15" cols="50" id="text" name="text"><?=$text;?></textarea>
	</div>
	<div class="form-group pull-right">
		<a href="index.php" class="btn btn-default">Cancel</a>
		<input type="submit" value="<?=((isset($_GET['edit']))?'Edit':'Add a New');?> Task" class="btn btn-success " >
	</div>
	<div class="clearfix"></div>
</form>

<?php
} else {
	$sql = "SELECT * FROM todo";
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
				</tr>

			<?php endwhile; ?>
		</tbody>
	</table>



<?php } include 'includes/footer.php'; ?>

