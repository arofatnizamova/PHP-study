
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Todos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    
    <?php if (isset($_SESSION['user_id'])): ?>
        <?php
            session_start();
            include 'components/Todos.php';
            include 'data-base.php';

            $tasks = new Todos($tasksBD);
        ?>
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="w-100">
                            <h1 class="text-primary">Your Todo list</h1>
                            <table class="table">
                                <thead>
                                    <tr>
                                    <th scope="col">№</th>
                                    <th scope="col">Your task</th>
                                    <th scope="col">Change</th>
                                    <th scope="col">Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($tasks->getTasks() as $index => $item) : ?>
                                        <tr>
                                            <th><?= $index; ?></th>
                                            <td><?= $item['task']; ?></td>
                                            <td>
                                                <div class="bg-black text-white p-4">
                                                    <i class="bi bi-pencil-fill fs-3"></i>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="bg-black text-white p-4">
                                                    <i class="bi bi-trash-fill fs-3"></i>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="w-100">
                            <form action="handler-todos.php" method="post">
                                <textarea name="task" id="task" placeholder="write your task" class="form-control mb-4"></textarea>
                                <button type="submit" class="btn btn-primary">
                                    Add task
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
    <?php else: ?>
        <div class="alert alert-warning">Please <a href="login.html">sign in</a></div>
    <?php endif; ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>