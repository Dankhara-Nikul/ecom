<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class shipping extends Controller
{
    function getData(){
        return ["name"=>"Nikul","city"=>"surat","email"=>"admin@gmail.com"];
    }
}
