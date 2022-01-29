<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/sessions.css">
    <title>MAIN PAGE</title>
</head>
<body>
    <div class="sessions-container">
        <header>
            <a class="main_page_logo" href="/main">
                <img src="public/img/logo.svg " style="width: 100%;height: 100%;">
            </a>
            <a class="main_page_profile" href="/profile">
                <img src="public/img/profile.svg ">
            </a>
        </header>
        <section class="sessions">
            <?php foreach ($sessions as $session): ?>
                <div id="session-1">
                    <div class ="title-container">
                        <h2><?= $session->getTitle()?></h2>
                    </div>
                    <div class = "content">
                        <p>Buy In:  <?= $session->getBuyIn()?></p>
                        <p>Cashout: <?= $session->getCashout()?></p>
                        <p>Result:  <?= $session->getResult()?></p>
                    </div>
                </div>
            <? endforeach; ?>
        </section>
    </div>
</body>
</html>