<?php

use PHPUnit\Framework\TestCase;

require("src/controller/UpdateToDo.php");

class UpdateToDoTest extends TestCase
{
    public function testUpdateTodo()
    {
        $connMock = $this->getMockBuilder(mysqli::class)
            ->getMock();

        $connMock->expects($this->once())
            ->method('query')
            ->with("UPDATE todo SET task ='Updated Task', start_date ='2023-06-05 10:00:00', end_date='2023-06-05 12:00:00' WHERE id =1")
            ->willReturn(true);

        $GLOBALS['conn'] = $connMock;

        $_GET['edit-task'] = 1;
        $_POST = [
            'update' => true,
            'task' => 'Updated Task',
            'startDate' => '2023-06-05 10:00:00',
            'endDate' => '2023-06-05 12:00:00'
        ];

        $data = updateTaskById();

        $this->assertEmpty($data['taskMsg']);
    }
}
