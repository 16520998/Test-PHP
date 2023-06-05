<!DOCTYPE html>
<html lang="en">
<head>
    <title>PHP To Do List</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"
          integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css"/>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css"/>

</head>
<body>

<div class="container my-5">

    <h2>To Do List Calendar</h2>

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
            <div id='calendar'></div>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            $('#startDate').daterangepicker({
                timePicker: true,
                singleDatePicker: true,
                showDropdowns: true,
                startDate: moment().startOf('hour'),
            }, function (start, end, label) {

            });

            $('#endDate').daterangepicker({
                timePicker: true,
                singleDatePicker: true,
                showDropdowns: true,
                startDate: moment().startOf('hour'),
            }, function (start, end, label) {
            });

            var calendar = $('#calendar').fullCalendar({
                editable: true,
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay'
                },
                events: 'script/loadCalendar.php',
                selectable: true,
                selectHelper: true,
            });
        });
    </script>
</div>

</body>
</html>