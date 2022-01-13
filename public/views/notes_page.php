<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <title>MAIN PAGE</title>
</head>
<body>
    <div class="base-container">
        <header>
            <div class="main_page_logo">
                <img src="public/img/logo.svg " style="width: 100%;height: 100%;">
            </div>
            <div class="main_page_profile">
                <img src="public/img/profile.svg ">
            </div>
        </header>
        <div>
            <h2><?= $note->getTitle()?></h2>
            <h3><?= $note->getDescription()?></h3>
        </div>
    </div>
</body>
</html>