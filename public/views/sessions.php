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
        <?php include('header.php')?>
        <section class="sessions">
            <?php foreach ($sessions as $session): ?>
                <div id="session-1">
                    <div class ="title-container">
                        <h2><?= $session->getTitle()?></h2>
                    </div>
                    <div class = "content">
                        <p>Buy In:  <?= $session->getBuyIn()?>zl</p>
                        <p>Cashout: <?= $session->getCashout()?>zl</p>
                        <p>Result:  <?= $session->getResult()?>zl</p>
                        <p>Duration:  <?= $session->getDuration()?>hrs</p>
                    </div>
                </div>
            <? endforeach; ?>
        </section>
    </div>
</body>
</html>