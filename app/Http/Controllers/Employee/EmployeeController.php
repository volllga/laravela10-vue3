<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Http\Requests\Employee\EmployeeRequest;
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

    public function store(EmployeeRequest $request)
    {
        try {
            $employee = Employee::create($request->validated());
            return new EmployeeResource($employee);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to create employee', 'message' => $e->getMessage()], 500);
        }
    }

    public function update()
    {

    }

    public function destroy()
    {

    }
}
