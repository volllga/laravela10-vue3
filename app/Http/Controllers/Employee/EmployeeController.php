<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Http\Requests\Employee\PatchEmployeeRequest;
use App\Http\Requests\Employee\PostEmployeeRequest;
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

    public function store(PostEmployeeRequest $request)
    {
        try {
            $employee = Employee::create($request->validated());
            return new EmployeeResource($employee);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to create employee', 'message' => $e->getMessage()], 500);
        }
    }

    public function update(PatchEmployeeRequest $request, Employee $employee)
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
