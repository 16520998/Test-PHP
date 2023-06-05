<?php
include("src/controller/CreateToDo.php");
include("src/controller/EditToDo.php");
include("src/controller/UpdateToDo.php");
$editTask = editTaskById();
$createTask = createTask();
if (isset($_GET['edit-task'])) {
    $createTask = updateTaskById();
}

if (isset($_GET['delete-task'])) {
    $deleteTask = deleteTaskById();
}
?>
<form method="post">
    <p class="text-danger">
        <?php
        echo $createTask['taskMsg'] ?? '';
        ?>
    </p>

    <p class="text-success">
        <?php
        echo $createTask['success'] ?? '';
        echo $deleteTask['success'] ?? '';
        ?>
    </p>

    <div class="row">
        <div class="form-group mb-3">
            <label for="task">Task name:</label>
            <input type="text"
                   class="form-control"
                   placeholder="Enter Something..."
                   name="task"
                   id="task"
                   value="<?php echo $editTask['task'] ?? ''; ?>">
        </div>

        <div class="form-group mb-3">
            <div class="row">
                <div class="col-sm-6">
                    <label for="startDate">Start date:</label>
                    <input type="text" name="startDate" class="form-control" id="startDate"/>
                </div>
                <div class="col-sm-6">
                    <label for="startDate">End date:</label>
                    <input type="text" name="endDate" class="form-control" id="endDate"/>
                </div>
            </div>
        </div>
        <div class="form-group d-flex justify-content-center">
            <button type="submit" class="btn btn-primary"
                    name="<?php echo count($editTask) ? 'update' : 'add'; ?>"><?php echo count($editTask) ? 'update' : 'add'; ?></button>
        </div>
    </div>
</form>