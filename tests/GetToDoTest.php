<?php

use App\Util\MysqliResultWrapper;
use PHPUnit\Framework\TestCase;

require("src/controller/GetToDo.php");
require("Util/MysqliResultWrapper.php");

class GetToDoTest extends TestCase
{
    public function testGetTodoData()
    {
        $host = 'database';
        $user = 'user';
        $pass = '123';
        $database = 'ToDoList';

        $mysqli = new mysqli($host, $user, $pass, $database);
        $listData = [
            [
                'id' => 1,
                'task' => 'Task 1',
                'startDate' => '2023-06-05 10:00:00',
                'endDate' => '2023-06-05 12:00:00'
            ],
            [
                'id' => 2,
                'task' => 'Task 2',
                'startDate' => '2023-06-05 10:00:00',
                'endDate' => '2023-06-05 12:00:00'
            ]
        ];

        $connMock = $this->getMockBuilder(mysqli::class)
            ->getMock();

        $resultMock = $this->getMockBuilder(MysqliResultWrapper::class)
            ->disableOriginalConstructor()
            ->setConstructorArgs([$mysqli])
            ->getMock();

        $resultMock->expects($this->never())
            ->method('close');

        $connMock->expects($this->once())
            ->method('query')
            ->willReturn($resultMock);

        $resultMock->expects($this->once())
            ->method('num_rows')
            ->willReturn(2);

        $resultMock
            ->expects($this->once())
            ->method('fetch_all')
            ->willReturn($listData);

        $GLOBALS['conn'] = $connMock;

        $data = getTask();

        $expectedData = [
            'data' => $listData,
        ];

        $this->assertEquals($expectedData, $data);
    }
}
