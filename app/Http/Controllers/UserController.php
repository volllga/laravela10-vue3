<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __invoke() {
        $users = [
            [
                'id' => 1,
                'name' => 'Tom',
                'age' => 34,
                'position' => 'QA',
                'active' => 1,
            ],
            [
                'id' => 2,
                'name' => 'Ira',
                'age' => 44,
                'position' => 'SEO',
                'active' => 1,
            ],
            [
                'id' => 3,
                'name' => 'Rick',
                'age' => 29,
                'position' => 'Developer',
                'active' => 1,
            ],
            [
                'id' => 4,
                'name' => 'Martin',
                'age' => 52,
                'position' => 'Developer',
                'active' => 0,
            ],
        ];
        return $users;
    }
}
