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
        <section class="add-note">
        <form action="addNote" method="POST">
            <?php if(isset($messages)){
                foreach ($messages as $message){
                    echo $message;
                }
            }
            ?>
            <input name="title" type="text" placeholder="title">
            <textarea name="description" rows="5" type="text" placeholder="description"></textarea>
            <button type="submit">ADD NOTE</button>
        </form>
        </section>
    </div>
</body>
</html>