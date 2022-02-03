<?php
require_once 'core/init.php';
require_once("includes/header.php");
if (isset($_GET['edit'])) {
    $id = (int)$_GET['edit'];
}
if(isset($_POST['textarea'])){
    $text = $_POST['textarea'];
    $db->query("UPDATE  todo SET text='$text' WHERE id = '$id'");
    header('Location: index.php');
}
if(isset($_GET['delete'])){
    $id = (int) $_GET['delete'];
    $db->query("DELETE FROM todo WHERE id = '$id'");
    header('Location: index.php');
}

?>
        <div class="container" style="margin-top: 100px;">
            <div class="row justify-content-center">
                <div class="col-md-4 col-md-offset-4">
                    <table class="table table-stripped table-hover table-bordered">
                        <thead>
                            <?php
                            $sql = $db->query("SELECT title,text FROM todo WHERE id = '$id'");
                            
                            while($data = $sql->fetch_array()) : ?>
                                <tr>
                                    <td><?=$data['title'];?></td>
                                </tr>
                        </thead>
                        <tbody>
                            <tr> 
                                <td>
                                    <form action="" method="post">
                                    <textarea rows="10" cols="35" name="textarea"><?=$data['text'];?></textarea>
                                    <button type="submit" class="btn btn-sm btn-success">Edit</button>
                                    <a href="task.php?delete=<?=$id;?>"class="btn btn-sm btn-danger">Delete</i></a>
                                    <button class="btn btn-sm btn-light" onclick="history.go(-1)">Cancel</button>
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