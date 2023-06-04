<?php
include('src/controller/GetToDo.php');
$getTask = getTask();
?>

<?php
if (count($getTask['data'])) {
    ?>
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Task</th>
            <th scope="col">Start Date</th>
            <th scope="col">End Date</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($getTask['data'] as $task) {
            ?>
            <tr>
                <th scope="row"> <?php
                    echo $task['id'];
                    ?></th>
                <td> <?php
                    echo $task['task'];
                    ?></td>
                <td> <?php
                    echo $task['start_date'];
                    ?></td>
                <td> <?php
                    echo $task['end_date'];
                    ?></td>
                <td>
                    <a href="../../index.php?edit-task=<?php echo $task['id']; ?>"
                       class="text-success text-decoration-none">
                        <i class='fas fa-edit'></i>
                    </a>
                    <span style="margin-left: 15px">
                        <a href="../../index.php?delete-task=<?php echo $task['id']; ?>"
                           class="text-danger text-decoration-none">
                            <i class='fas fa-trash-alt'></i>
                        </a>
                    </span>
                </td>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>
    <?php
}
?>