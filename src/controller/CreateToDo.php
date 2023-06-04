<?php
function createTask()
{
    global $conn;
    if (isset($_POST['add'])) {
        /* validation */
        $task = $_POST['task'];
        $startDate = date_format(date_create($_POST['startDate']), "Y-m-d H:i:s");
        $endDate = date_format(date_create($_POST['endDate']), "Y-m-d H:i:s");
        $data['taskMsg'] = '';
        if (empty($task)) {
            $data['taskMsg'] = "Empty Task Field!";
        }

        $validation = false;
        if (empty($data['taskMsg'])) {
            $validation = true;
        }

        if ($validation) {
            /* insert query*/
            $query = "INSERT INTO todo";
            $query .= "(task, start_date, end_date) ";
            $query .= "VALUES ('$task', '$startDate', '$endDate')";
            echo 'quey ' . $query;
            $result = $conn->query($query);
            echo '$result ' . $result;
            if ($result) {
                $data['success'] = "Task is added successfully";
            }
        }
        $_POST['task'] = '';
        return $data;
    }
}

?>