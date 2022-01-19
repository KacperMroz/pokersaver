<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/notes.css">
    <script src="https://kit.fontawesome.com/a956a3a1ab.js" crossorigin="anonymous"></script>
    <title>MAIN PAGE</title>
</head>
<body>
    <div class="base-container">
        <header>
            <a class="main_page_logo" href="/main">
                <img src="public/img/logo.svg " style="width: 100%;height: 100%;">
            </a>
            <a class="main_page_profile" href="/profile">
                <img src="public/img/profile.svg ">
            </a>
        </header>
        <section class="notes">
            <div id="note-1">
                <a href="\note_description">
                    <i class="fas fa-user" style="font-size: 1000%;"></i>
                    <h2><?= $note->getTitle()?></h2>
<!--                    <h3>--><?//= $note->getDescription()?><!--</h3>-->
                </a>
            </div>
        </section>
    </div>
</body>
</html>