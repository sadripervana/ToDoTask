<?php
require_once("includes/mysqli_connect.php");
if (isset($_GET['edit'])) {
    $id = (int)$_GET['edit'];
}
if(isset($_POST['textarea'])){
    $text = $_POST['textarea'];
    $conn->query("UPDATE  todo SET text='$text' WHERE id = '$id'");


    header('Location: index.php');
}
if(isset($_GET['delete'])){
    $id = (int) $_GET['delete'];
    $conn->query("DELETE FROM todo WHERE id = '$id'");
    header('Location: index.php');
}

?>
<!doctype html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>jQuery Sortable</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    </head>
    <body>
        <div class="container" style="margin-top: 100px;">
            <div class="row justify-content-center">
                <div class="col-md-4 col-md-offset-4">
                    <table class="table table-stripped table-hover table-bordered">
                        <thead>
                            <?php
                            $sql = $conn->query("SELECT title,text FROM todo WHERE id = '$id'");
                            
                            while($data = $sql->fetch_array()) : ?>
                                <tr>
                                    <td><?=$data['title'];?></td>
                                </tr>
                        </thead>
                        <tbody>
                            <tr> 
                                <td>
                                    <form action="" method="post">
                                    <textarea rows="15" cols="50" name="textarea"><?=$data['text'];?></textarea>
                                    <input type="submit" placeholder="Edit">
                                    <a href="task.php?delete=<?=$id;?>"class="btn btn-sm btn-success">Delete</i></a>
                                    </form>
                                </td>
                            </tr>
                    <?php endwhile; ?>
                        </tbody>
                     </table>
                </div>
            </div>
        </div>

<?php include_once('includes/footer.php') ?>