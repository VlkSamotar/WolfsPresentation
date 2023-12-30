<?php

session_start();

require "classes/Url.php";

$question = "";
$text = "";

$questions = ["Kolik hrbů má velbloud dvouhrbý?", "Kolik očí má kočka?"];
$answers = ["dva", "dvě"];

if($_SERVER["REQUEST_METHOD"] === "POST"){
    $userInput = $_POST["textInput"];
    $line = $_POST["line"];

    if($answers[$line] == $userInput){        
        if(isset($_SESSION["validateText"])){
            $_SESSION["validateText"] = "";
        }
        Url::redirectUrl("/wolfsPresentation");
    }else{
        $_SESSION["validateText"] = "Zkus to ještě jednou";
        Url::redirectUrl("/wolfsPresentation/testValidation.php");
    };
};

if(sizeof($questions) == sizeof($answers)){
  $line = rand(0, sizeof($questions) - 1);
  $question = $questions[$line];
};

if(isset($_SESSION["validateText"])){
    $text = $_SESSION["validateText"];    
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test validation</title>
</head>
<body>
   <p><?= $text ?></p>

    <form action="" method="post">
        <label for="userInput"><?= $question ?></label>
        <input type="text" name="textInput" id="userInput">
        <input type="hidden" name="line" value="<?= $line ?>">
        <input type="submit" value="Odeslat">
    </form> 
</body>
</html>
