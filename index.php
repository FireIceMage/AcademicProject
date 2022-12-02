<?php
    date_default_timezone_set('Europe/Moscow');
    include 'connection.php';
    include 'comment.php';

?>

<!DOCTYPE html>
<html lang="ru">
<html>
<head>
    <meta charset="UTF-8">
    <title>Meow</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
<h1>Основы программирования</h1>
<?php

echo "<form method='POST' action='".setComments($conn)."'>
    <input type='hidden' name='uid' value='Аноним'>
    <input type='hidden' name='date' value='".date('Y-m-d H:i:s')."'>
    <input type='hidden' name='likes' value='0'>
    <textarea name='message' required></textarea><br>
    <button type='submit' class='commentSubmit' name='commentSubmit'>Оставить сообщение</button>
    <hr class='hr'>
</form>";

?>

<div class="flex-container">
<?php

echo "<form method='POST' action='".getComments($conn)."'>
</form>";
?>
</div>

</body>

</html>