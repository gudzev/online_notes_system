<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Online Notes System</title>

    <link rel="stylesheet" href="css/style.css">

</head>

<body class="background">

    <header>

        <nav>

            <ul>

                <li><a href="index.php">Discover new notes</a></li>
                <li><a href="post_note.php">Post a note</a></li>

            </ul>

        </nav>

    </header>

    <section class="content">
        
    <?php

    require_once("functions/config.php");

    $sql = "SELECT * FROM notes";

    $run = $connect -> query($sql);
        
    $results = $run -> fetch_all(MYSQLI_ASSOC);

    foreach($results as $result)
    {
        echo nl2br("<div class='card'>
        <div class='card-row'>
            <h1 class='card-header'>" . htmlspecialchars($result['note_name']) .  "</h1>

            <h3 class='card-created'>" . htmlspecialchars($result['created_at']) .  "</h3>

            <button class='btn-copy' onclick='copyThis(" . $result['note_id'] . ")'>Copy text</button>

        </div>

        <p class='card-text' id='" . $result['note_id']  . "'>
        " . htmlspecialchars($result['note_text']) .  "</p>");

        echo "<form action='functions/see_note.php' method='get' class='form'>

            <input type='hidden' name='note_id' value='" . htmlspecialchars($result['note_id']) . "'>
            <button type='submit' class='btn'>See whole note</button>

        </form>
        </div>";
    }

    $connect -> close();
    $run -> close();

    ?>
    </section>

    <script>

    function copyThis(n) 
    {
        var text = document.getElementById(n).innerText;
        var elem = document.createElement("textarea");
        document.body.appendChild(elem);
        elem.value = text;
        elem.select();
        document.execCommand("copy");
        document.body.removeChild(elem);
    }

    </script>
    
</body>

</html>