<?php
require_once('./controllers/todo.php');
?>

<!doctype html>
<html lang="en">

<head>
    <title>Todo App</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <link rel="stylesheet" href="./styles/style.css" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>
    <header>
        <!-- place navbar here -->
    </header>
    <main class="container mt-5">
        <div class="card">
            <div class="card-header">TODO List</div>
            <div class="card-body">
                <div class="mb-3">
                    <form action="" method="post">
                        <label for="" class="form-label">Task:</label>
                        <input type="text" class="form-control" name="task" id="task" aria-describedby="helpId" placeholder="Write your task here" />

                        <input name="add-task" id="add-task" class="btn btn-primary mt-3 w-100" type="submit" value="Save" autocomplete="off" />


                    </form>
                </div>

                <ul class="list-group list-group">
                    <?php
                    foreach ($todos as $todo) { ?>
                        <li class="list-group-item ">
                            <div class="form-check">

                                <form action="" method="POST">
                                    <input type="hidden" name="task_id" id="task_id" value="<?php echo $todo["task_id"]; ?>">
                                    <input class="form-check-input" name="completed" id="completed" type="checkbox" value="" onChange="this.form.submit()" <?php echo ($todo["completed"] == 1) ? 'checked' : ''; ?> />
                                </form>

                                <label class="form-check-label <?php echo ($todo["completed"] == 1) ? 'completed' : ''; ?>" for=""> <?php echo $todo["task_nm"]; ?></label>
                                <a class="btn btn-danger float-end" href="?task_id=<?php echo $todo["task_id"]; ?>">
                                    <span><i class="bi bi-trash"></i></span>
                                </a>
                            </div>
                        </li>
                    <?php } ?>
                </ul>

            </div>
        </div>

    </main>
    <footer>
        <!-- place footer here -->
    </footer>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>