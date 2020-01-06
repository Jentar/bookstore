
<?php

require_once 'db_connection.php';

/* var_dump($_GET); */

$title = $_GET['title'];
$year = $_GET['year'];
$stmt = $pdo->prepare('SELECT * FROM books WHERE title LIKE :title AND release_date =:year');
$stmt->execute(['title' => '%' . $title . '%' ,'year'=> $year]);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
    <style>
        h1 { color: #ff00ae; }
    </style>
    
<body>

    <h1> Otsing </h1>
    <?php 
    require_once 'db_connection.php';

    $year = $_GET['year'];
    $title = $_GET['title']; 
    ?>

    </form>
    
    
    <form action="index.php" method="GET">
        <input id="otsi" name="title" type="text" placeholder="raamatu pealkiri" value="<?=$title;?>">
        <input id="otsi" name="year" type="text" placeholder="raamatu aasta" value="<?=$year;?>">
        <input id="submit" type="submit" style="font-face: 'Comic Sans MS'; font-size: larger; color: #ffffff ; background-color: #ff00ae; border: 3pt ridge lightgrey"  value="Otsi" class="button"/>
    </form>
    <ul>
<?php

echo '<ul>';
while ( $row = $stmt->fetch() ) {
    echo '<li> <a href=./book.php?id=' .$row['id'] . ">" . $row['title'] . '</a> </li>';
}
{
    echo '<li>' . $row['title'] . "<br><br>";
}
?>
    </ul>

</body>
</html>

