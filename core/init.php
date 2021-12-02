
<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$db = mysqli_connect('localhost','admin','admin','ToDo');
session_start();

require_once $_SERVER['DOCUMENT_ROOT'].'/PHPProjects/ToDoTask/helpers/helpers.php';

define('BASEURL', $_SERVER['DOCUMENT_ROOT'].'/PHPProjects/ToDoTask/');

if(isset($_SESSION['SBUser'])){
  $user_id = $_SESSION['SBUser'];
  $query = $db->query("SELECT * FROM users WHERE id = '$user_id'");
  $user_data = mysqli_fetch_assoc($query);
  $fn = explode(' ', $user_data['full_name']);
  $user_data['first'] = $fn[0];
  $user_data['last'] = $fn[1];
}
 ?>