<?php

use PHPUnit\Framework\TestCase;
include("src/controller/DeleteToDo.php");
class DeleteToDoTest extends TestCase
{
    public function testDeleteTaskById()
    {
        // Mock the global $conn variable and $_POST data
        $connMock = $this->getConnMock();

        $connMock->expects($this->once())
            ->method('query')
            ->willReturn(true);

        $GLOBALS['conn'] = $connMock;

        $_GET = [
            'delete-task' => 1,
        ];

        ob_start();
        $data = deleteTaskById();
        ob_end_clean();

        $this->assertEquals("Task is delete successfully!", $data['success']);
    }

    public function testDeleteTaskByIdFail()
    {
        // Mock the global $conn variable and $_POST data
        $connMock = $this->getConnMock();

        $connMock->expects($this->once())
            ->method('query')
            ->willReturn(false);

        $GLOBALS['conn'] = $connMock;

        $_GET = [
            'delete-task' => 1,
        ];

        ob_start();
        $data = deleteTaskById();
        ob_end_clean();

        $this->assertEquals("Task is delete fail!", $data['fail']);
    }
    //must write to handle case exception
    public function getConnMock()
    {
        return $this->getMockBuilder(mysqli::class)
            ->getMock();
    }
}
