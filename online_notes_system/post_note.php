<?php

require_once("functions/config.php");

?>

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
        
        <form action="functions/post_this.php" method="POST" class="post-note">

            <label for="">Note Name:</label>
            <input type="text" required class="note-name" name="note_name">

            <label for="">Note Text:</label>
            <textarea required class="note-text" name="note_text"></textarea>

            <button type="submit" class="btn-submit">Submit</button>

        </form>

    </section>
    
</body>

</html>