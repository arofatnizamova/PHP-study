<?php
if(isset($_GET['id'])){
    include __DIR__ . '/../components/Todos.php';
    include 'data-base.php';

    $todo = new Todos($pdo);
?>
  
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Todos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

</head>
<body>

  <div class="container">
      <form action="todo-form-update.php" class="mt-5" method="post">
          <input type="hidden" name="id" class="form-control mb-2" value="<?=$_GET['id'] ?>">  
          <input type="text" name="task" class="form-control mb-2" value="<?= $_GET['task'] ?>">  
          <button type="submit" class="btn bg-black text-white mt-3">Сохранить изменения</button>
      </form>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php
} else {
    die("ERROR");
}