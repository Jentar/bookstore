<?php

require_once 'db_connection.php';
$id = $_GET['id'];
$stmt = $pdo->prepare('SELECT * FROM books WHERE id=:id');
$stmt->execute(['id' => $id]);
$book = $stmt->fetch();


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?=$book['title'] ?> </title>
</head>
<body>

    <h1><?=$book['title'] ?></h1>
    <div class="info">
        <p><?=$book['release_date'] ?> </p>
        <P>Type: <?=$book['type'] ?></p>
        <P>Pages: <?=$book['pages'] ?></p>
        <P>Language: <?=$book['language'] ?></p>
        <p>Price: <?=round($book['price'],2) ?> € </p>
        <p>Stock: <?=$book['stock_saldo'] ?></p>
    </div>
        <p class="summary"> <?=$book['summary'] ?></p>
        
    
    

    
    
    <img src="<?=$book['cover_path'] ?>" alt="">
    <a class="button" href="">Delete</a>
</body>
</html>