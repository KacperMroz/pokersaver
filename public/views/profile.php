<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="public/css/profile_style.css">
    <title>PROFILE PAGE</title>
</head>
<body>
    <div class="base-container">
        <nav>
            <div class="profile_avatar">
                <img src="public/img/profile.svg ">
            </div>
            <div class="buttons_container">
                <a class='button' href='/main_page'>CURRENT SESSION</a>
                <a class='button' href='/notes'>YOUR NOTES</a>
            </div>
            <form class="logout-form" action="logout" method="POST">
                <button type="submit">LOGOUT</button>
            </form>
        </nav>
        <main>
            <div class="stats-container">
                <h1>SESSIONS PLAYED: <?php echo $sessionCount ?></h1>

                <h1>TOTAL RESULT: <?php echo $result ?></h1></h1>
                <h1>AVG RESULT PER SESSION: <?php echo $average ?></h1></h1>
            </div>
        </main>
    </div>
</body>
</html>