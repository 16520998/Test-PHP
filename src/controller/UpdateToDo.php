<?php
function updateTaskById()
{
    global $conn;

    if (isset($_POST['update']) && isset($_GET['edit-task']) && !empty($_GET['edit-task'])) {

        $id = $_GET['edit-task'];

        $task = $_POST['task'];
        $startDate = date_format(date_create($_POST['startDate']), "Y-m-d H:i:s");
        $endDate = date_format(date_create($_POST['endDate']), "Y-m-d H:i:s");

        $data['taskMsg'] = '';
        $validation = false;

        if (empty($task)) {
            $data['taskMsg'] = "task Field is required";
        }

        if (empty($data['taskMsg'])) {
            $validation = true;
        }

        if ($validation) {
            $query = "UPDATE todo SET ";
            $query .= "task ='$task', start_date ='$startDate', end_date='$endDate'";
            $query .= " WHERE id =$id";

            $result = $conn->query($query);

            if ($result) {
                echo "<script>window.location='index.php'</script>";
            }
        }
        return $data;
    }
}

?>s