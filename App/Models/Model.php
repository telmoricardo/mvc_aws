<?php

namespace App\Models;

use App\Traits\CollectionDb;

abstract class Model
{
    public $conn;
    use CollectionDb;

    public function __construct() {
        $this->connection = Connection::connection();
    }


}