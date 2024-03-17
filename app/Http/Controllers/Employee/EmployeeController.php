<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Http\Resources\Employee\EmployeeResource;
use App\Models\Employee;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::all();

        return EmployeeResource::collection($employees);
    }

    public function show()
    {

    }

    public function store()
    {

    }

    public function update()
    {

    }

    public function destroy()
    {

    }
}
