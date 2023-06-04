<?php
function deleteTaskById()
{
    global $conn;
    if (isset($_GET['delete-task']) && !empty($_GET['delete-task'])) {
        $id = $_GET['delete-task'];

        /* sql query*/
        $query = "DELETE from todo where id=$id";

        $result = $conn->query($query);
        echo $result . 'sdssd';
        if ($result) {
            $data['success'] = "Task is delete successfully!";
            echo "<script>window.location='index.php'</script>";
        }

        else {
            $data['fail'] = "Task is delete fail!";
        }

        return $data;
    }
}

?>