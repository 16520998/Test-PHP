<?php

use PHPUnit\Framework\TestCase;
include("src/controller/EditToDo.php");
class EditToDoTest extends TestCase
{
    public function testEditTaskById()
    {
        $host = 'database';
        $user = 'user';
        $pass = '123';
        $database = 'ToDoList';

        $mysqli = new mysqli($host, $user, $pass, $database);
        $editData = [
            'id' => 1,
            'task' => 'metting',
            'startDate' => '2023-06-05 10:00:00',
            'endDate' => '2023-06-05 12:00:00'
        ];

        $connMock = $this->getMockBuilder(mysqli::class)
            ->getMock();
        $resultMock = $this->getMockBuilder(mysqli_result::class)
            ->setConstructorArgs([$mysqli])
            ->getMock();

        $connMock->expects($this->once())
            ->method('query')
            ->willReturn($resultMock);

        $resultMock->expects($this->once())
            ->method('fetch_assoc')
            ->willReturn($editData);

        $GLOBALS['conn'] = $connMock;

        $_GET = [
            'edit-task' => 1,
        ];

        $data = editTaskById();

        $this->assertEquals($editData, $data);
    }
}
