<?php

use PHPUnit\Framework\TestCase;
include("src/controller/CreateToDo.php");
class CreateToDoTest extends TestCase
{
    public function testCreateTaskWithValidData()
    {
        // Mock the global $conn variable and $_POST data
        $connMock = $this->getConnMock();

        $connMock->expects($this->once())
            ->method('query')
            ->willReturn(true);

        $GLOBALS['conn'] = $connMock;

        $_POST = [
            'add' => true,
            'task' => 'Meeting',
            'startDate' => '2023-06-05 10:00:00',
            'endDate' => '2023-06-05 12:00:00',
        ];

        // Call the function and capture the returned data
        $data = createTask();

        // Assert that the task is added successfully
        $this->assertEquals("Task is added successfully", $data['success']);
    }

    public function testCreateTaskWithEmptyTaskField()
    {
        $_POST = [
            'add' => true,
            'task' => '',
            'startDate' => '2023-06-05 10:00:00',
            'endDate' => '2023-06-05 12:00:00',
        ];

        // Call the function and capture the returned data
        $data = createTask();

        // Assert that the taskMsg field is set to the expected error message
        $this->assertEquals("Empty Task Field!", $data['taskMsg']);
    }

    public function getConnMock()
    {
        return $this->getMockBuilder(mysqli::class)
            ->getMock();
    }
}
