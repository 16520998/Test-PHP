<?php

namespace App\Util;

use mysqli_result;

class MysqliResultWrapper extends mysqli_result
{
    private $result;

    public function __construct($result)
    {
        $this->result = $result;
    }

    public function num_rows()
    {
        return $this->result->num_rows;
    }
}
