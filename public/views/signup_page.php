<!DOCTYPE html>

<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <script type="text/javascript" src="public/js/script.js" defer></script>
    <title>SIGNUP</title>
</head>

<body>
<div class="container">
    <div class="logo">
        <img src="public/img/logo.svg" style="width: 100%">
    </div>
    <div class="login-container">
        <form class="register" action="signup" method="POST">
            <div class="messages">
                <?php
                if(isset($messages)){
                    foreach($messages as $message) {
                        echo $message;
                    }
                }
                ?>
            </div>
            <input name="email" type="text" placeholder="email@email.com">
            <input name="password" type="password" placeholder="password">
            <input name="confirmedPassword" type="password" placeholder="confirm password">
            <input name="username" type="text" placeholder="name">
            <button type="submit">SIGN UP</button>
        </form>
    </div>
</div>
</body>