<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/notes.css">
    <script src="https://kit.fontawesome.com/a956a3a1ab.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="./public/js/search.js" defer></script>
    <title>MAIN PAGE</title>
</head>
<body>
    <div class="notes-container">
        <?php include('header.php')?>
        <div class="search-bar">
            <a class="back" href="\notes">
                <i class="fas fa-undo-alt"></i>
            </a>
            <input placeholder="search note">
        </div>
        <section class="notes">
            <?php foreach ($notes as $note): ?>
                <div id="note-1">
                 <a href="\note_description">
                    <i class="fas fa-user" ></i>
                    <h2><?= $note->getTitle()?></h2>
                    <h3><?= $note->getDescription()?></h3>
                </a>
            </div>
            <? endforeach; ?>
        </section>
        <a class="new-note-button" href="/add_note">+</a>
    </div>
</body>
</html>

<template id="note-template">
    <div id="">
        <a href="\note_description">
            <i class="fas fa-user"></i>
            <h2>title</h2>
            <h3>description</h3>
        </a>
    </div>
</template>