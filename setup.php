<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <h1>Setting up Database data</h1>
    <?php
    require_once 'core/init.php';
    
    function query($db, $sql){
      $query = $db->prepare($sql);
      $query->execute();
      return $query;
    }

    function createTable($db, $name, $query){
     query($db,"CREATE TABLE IF NOT EXISTS $name($query)");
     echo "Table '$name' created or already exists.<br>";
    }

    // createDatabase($pdo, 'checkin');
    
 // Duke krijuar tabelen
    createTable($db,'`todo`',
    'id MEDIUMINT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `title` varchar(250) NOT NULL,
    `text` longtext NOT NULL,
    `position` int DEFAULT NULL,
    `priority` varchar(250) ,
    `user_data` tinyint NOT NULL,
    `deadline` text NOT NULL'
   );

    //Krijo tabelen users
    createTable($db,'users',
      'id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
      full_name varchar(255) NOT NULL,
      email varchar(175) NOT NULL,
      password varchar(255) NOT NULL,
      join_date datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
      last_login datetime DEFAULT NULL,
      permissions varchar(255) NOT NULL'
    );



    $sql =" INSERT INTO `todo` (`id`, `title`, `text`, `position`, `priority`, `user_data`, `deadline`) VALUES
(3, 'Task 1', 'hey hey haw you doing? hello there???', 2, 'hight', 8, '10-12-2021'),
(4, 'Task 2', 'Hello There this is a task 2', 4, 'low', 8, '9-12-2021'),
(5, 'Task 4', 'This is a task 4...', 2, 'medium', 10, '10-12-2021'),
(6, 'Task 5', 'Hello there how are you?', 3, 'low', 10, '10-12-2021'),
(8, 'Task 7', 'This is a new task 7', 5, 'medium', 10, '10-12-2021'),
(10, 'Task 3', 'Task 3 is here', 2, 'hight', 11, '10-12-2021'),
(11, 'Task 4 ', 'Hello there', 3, 'low', 11, '8-12-2021'),
(12, 'Task 4', 'HEllo there this is a task 4', 1, 'medium', 11, '9-11-2021'),
(13, 'Task New', 'This is a new Task', 1, 'medium', 8, '9-12-2021'),
(14, 'Food Remainder', 'This is a food remainder. Order lunch', 3, 'medium', 8, '10-12-2020');
";
// Insertin data
 query($db, $sql);

$sqli = "INSERT INTO `users` (`id`, `full_name`, `email`, `password`, `join_date`, `last_login`, `permissions`) VALUES
(8, 'sadri pervana', 'sadripervana1@gmail.com', '$2y$10$C3ajJRcHhfmS9PtAePrVuuK.BUg1MbxSETL7HnqFfmkkK6pNCEy4C', '2021-11-28 16:18:46', '2021-12-06 16:15:53', 'admin,editor'),
(10, 'Diu Diu', 'diudiu@gmail.com', '$2y$10$4//3814QVAkNMC1xcfwdSeDkCHVXLpsdDPP/.qV39eDfohvbYWUA6', '2021-12-06 15:24:32', '2021-12-06 15:45:36', 'editor'),
(11, 'test test', 'test1@gmail.com', '$2y$10$tANDCVDvcvfaCcPqNnND1e1nKkjHWCGQG9LgTnj3YqkjbizAFh/zK', '2021-12-06 15:48:57', '2021-12-06 15:49:06', 'editor')";
var_dump($sqli);die;
// insertin admin data
query($db, $sqli);
    ?>
  </body>
</html>
