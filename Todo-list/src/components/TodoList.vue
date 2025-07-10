<template>
    <section>
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="w-100">
                            <h1 class="">Your Todo list</h1>
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
                                        <tr>
                                            <th>1</th>
                                            <td>todo</td>
                                            <td>
                                                <a href="todo-update.php?<?=http_build_query(['id' => $item['id'], 'task' => $item['task']])?>" class="bg-black text-white p-1 rounded-4 d-flex align-items-center justify-content-center">
                                                    <i class="bi bi-pencil-fill fs-6"></i>
                                                </a>
                                            </td>
                                            <td>
                                                <a href="todo-delete.php?<?=http_build_query(['id' => $item['id']])?>" class="bg-black text-white p-1 rounded-4 d-flex align-items-center justify-content-center">
                                                    <i class="bi bi-trash-fill fs-6"></i>
                                                </a>
                                            </td>
                                        </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="w-100">
                            <form action="handler-todos.php" method="post">
                                <textarea name="task" id="task" placeholder="write your task" class="form-control mb-4"></textarea>
                                <button type="submit" class="btn bg-black text-white">
                                    Add task
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
</template>