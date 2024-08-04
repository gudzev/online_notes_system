<?php

require_once("config.php");

if($_SERVER['REQUEST_METHOD'] == "POST")
{
    $note_name = $_POST["note_name"];
    $note_text = $_POST["note_text"];

    if($note_name != "" && $note_text != "")
    {
        $sql = "INSERT INTO notes(note_name, note_text) VALUES(?, ?)";

        $run = $connect -> prepare($sql);
        $run -> bind_param("ss", $note_name, $note_text);
        $run -> execute();
    
        $run -> close();
        $connect -> close();
    }
}

header("location: ../index.php");
exit;

?>