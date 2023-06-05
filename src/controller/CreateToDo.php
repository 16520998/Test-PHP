<?php
function createTask()
{
    global $conn;
    if (isset($_POST['add'])) {
        $task = $_POST['task'];
        $startDate = date_format(date_create($_POST['startDate']), "Y-m-d H:i:s");
        $endDate = date_format(date_create($_POST['endDate']), "Y-m-d H:i:s");
        $data['taskMsg'] = '';
        if (empty($task)) {
            $data['taskMsg'] = "Empty Task Field!";
        }

        if ($startDate > $endDate) {
            $data['taskMsg'] = "Start date must not be greater than end date!";
        }

        $validation = false;
        if (empty($data['taskMsg'])) {
            $validation = true;
        }

        if ($validation) {
            $query = "INSERT INTO todo";
            $query .= "(task, start_date, end_date) ";
            $query .= "VALUES ('$task', '$startDate', '$endDate')";
            $result = $conn->query($query);
            if ($result) {
                $data['success'] = "Task is added successfully!";
            }
        }
        $_POST['task'] = '';
        return $data;
    }
}
