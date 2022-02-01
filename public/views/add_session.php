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
        <?php include('header.php')?>
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
                <input name="duration" type="number" placeholder="duration">
                <button type="submit">submit</button>
            </form>
        </div>
    </div>
</body>
</html>