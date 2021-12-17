<?php

namespace App\Models\admin;

use App\Models\Model;

class Admin extends Model
{
    protected $table = 'administrador';

    public $logado = 'admin_logado';

    public $dados = 'admin_dados';
}