<!DOCTYPE html>
<html lang="en">
<head>
    <title>PHP To Do List</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

</head>
<body>

<div class="container my-5">

    <h2>PHP To Do List</h2>

    <div class="row">
        <div class="col-sm-6">
            <?php
            require("src/database/database.php");
            require("src/controller/DeleteToDo.php");
            require("src/view/ToDoForm.php");
            require("src/view/ToDoList.php");
            ?>

        </div>
        <div class="col-sm-6">
        </div>
    </div>

    <script>
        $(document).ready(function() {
            // Initialize the datetime picker
            $('#startDate').daterangepicker({
                timePicker: true,
                singleDatePicker: true,
                showDropdowns: true,
                startDate: moment().startOf('hour'),
            }, function(start, end, label) {

            });

            $('#endDate').daterangepicker({
                timePicker: true,
                singleDatePicker: true,
                showDropdowns: true,
                startDate: moment().startOf('hour'),
            }, function(start, end, label) {
            });
        });
    </script>
</div>

</body>
</html>