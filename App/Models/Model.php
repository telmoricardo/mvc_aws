<?php

namespace App\Models;

use App\Classes\Bind;
use App\Traits\CollectionDb;
use App\Traits\PersistDb;

abstract class Model
{
    public $conn;
    use CollectionDb, PersistDb;

    public function __construct() {
        $this->connection = Connection::connection();

        Bind::bind('connection', $this->connection);
    }


}