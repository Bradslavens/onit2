<?php

namespace App\custom;

use Illuminate\Support\Facades\Auth;

class TeamLeader
{

    public $id;

    public function __construct()
    {   
        $user = \App\User::find(Auth::id());

        $this->id = $user['teamLeader'];
    }
}
