<?php
session_start();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php
setcookie('gameRes', rand(1, 10), time()+60);
?>
<form action="index.php" method="post">
    <label>Введите число</label><br>
    <input type="text" name="number"><br>
    <input type="submit" value="Угадать"><br>
</form>
<?php
//echo $randNumber;
$_SESSION['gameSession']=$_COOKIE['gameRes'];
//echo "<input type='text' value='{$_SESSION['gameSession']}'>";
if (isset($_POST['number'])&&!empty($_POST['number'])&&$_POST['number']>=0){
    if ($_POST['number']==$_SESSION['gameSession']){
        echo '<div>Вы угадали загаданое число: '.$_SESSION['gameSession'].'</div><br>';
    }else{
        echo '<div>Попробуйте ещё раз. Число которое загадали: '.$_SESSION['gameSession'].'</div><br>';
    }
}else{
    if (empty($_POST['number'])){
        echo '<div>Введите число. Поле пустое</div><br>';
    }elseif ($_POST['number']<1){
        echo '<div>Введённое число долно быть больше'.'"0"</div><br>';
    }
}
?>
</body>
</html>