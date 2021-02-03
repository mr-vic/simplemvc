<!DOCTYPE html>
<html>
    <head>
        <title>Разработка MVC-фреймворка на PHP</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    </head>
    <body>
        <h1>Hello world!</h1>
        <ul class="list-group">
        <?php foreach ($users as $user): ?>
            <li class="list-group-item">
                <?=$user->name;?>
            </li>
        <?php endforeach; ?>
        </ul>
    </body>
</html>