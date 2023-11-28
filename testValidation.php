<?php

$question = "";
$text = "";

$questions = ["Kolik hrbů má velbloud dvouhrbý?", "Kolik očí má kočka?"];
$answers = ["dva", "dvě"];

if(sizeof($questions) == sizeof($answers)){
  $line = rand(0, sizeof($questions) - 1);
  $question = $questions[$line];
};

if($_SERVER["REQUEST_METHOD"] === "POST"){
    $userInput = $_POST["textInput"];
    $line = $_POST["line"];

    if($answers[$line] == $userInput){
        $text = "Sedí to...";
    }else{
        $text = "Nesedí to...";
    };
};


?>

<?php

if($text != ""){
    echo $text;
};

?>

<form action="" method="post">
    <label for="userInput"><?= $question ?></label>
    <input type="text" name="textInput" id="userInput">
    <input type="hidden" name="line" value="<?= $line ?>">
    <input type="submit" value="Odeslat">
</form>

