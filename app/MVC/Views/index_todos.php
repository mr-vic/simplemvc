<!DOCTYPE html>
<html>

<head>
    <title>Разработка MVC-фреймворка на PHP</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-6 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h1>Hello world</h1>
                        <ul class="list-group">
                            <?php foreach ($todos as $todo) : ?>
                                <li class="list-group-item">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <?= $todo->task ?>
                                        </div>
                                        <div>
                                            <form method="post" id="complete-<?= $todo->id ?>" action="/todos/<?= $todo->id ?>/complete">
                                                <input onchange="$('form#complete-<?= $todo->id ?>').submit()" type="checkbox" <?= $todo->complete ? "checked" : "" ?>>
                                            </form>
                                        </div>
                                    </div>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h2>Создать задачу</h2>
                        <form method="post" action="/todos/create">
                            <input name="task" required type="text" placeholder="Название задачи" class="form-control">
                            <input type="submit" class="btn btn-success mt-2" value="Добавить">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>