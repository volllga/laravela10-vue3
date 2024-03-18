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

    public function show(Employee $employee)
    {
        return new EmployeeResource($employee);
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

    public function update(EmployeeRequest $request, Employee $employee)
    {
        try {
            $employee->update($request->validated());
            return $employee;
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to update employee', 'message' => $e->getMessage()], 500);
        }
    }

    public function destroy()
    {

    }
}
