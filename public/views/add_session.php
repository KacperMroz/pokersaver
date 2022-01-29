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
            <a class="main_page_logo" href="/main">
                <img src="public/img/logo.svg " style="width: 100%;height: 100%;">
            </a>
            <a class="main_page_profile" href="/profile">
                <img src="public/img/profile.svg ">
            </a>
        </header>
        <div class="add-session-container">
            <form class="register" action="addSession" method="POST">
                <div class="messages">
                    <?php
                    if(isset($messages)){
                        foreach($messages as $message) {
                            echo $message;
                        }
                    }
                    ?>
                </div>
                <input name="title" type="text" placeholder="session title">
                <input name="buyin" type="number" placeholder="buy in">
                <input name="cashout" type="number" placeholder="cashout">
                <button type="submit">submit</button>
            </form>
        </div>
    </div>
</body>
</html>