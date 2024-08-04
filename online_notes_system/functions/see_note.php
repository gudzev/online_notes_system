<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Original Note Text</title>
</head>
<body>

    <?php

    require_once("config.php");

    if(isset($_GET['note_id']) == true)
    {
        $note_id = $_GET['note_id'];

        $sql = "SELECT * FROM notes WHERE note_id = ?";

        $run = $connect -> prepare($sql);
        $run -> bind_param("i", $note_id);

        if($run -> execute() == true)
        {
            $results = $run -> get_result();

            $result = $results -> fetch_assoc();

            echo nl2br(htmlspecialchars($result['note_text']));
        }

        $connect -> close();
        $run -> close();
    }

    ?>
    
</body>
</html>