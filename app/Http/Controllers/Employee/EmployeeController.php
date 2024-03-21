<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Http\Requests\Employee\FilterEmployeeRequest;
use App\Http\Requests\Employee\PatchEmployeeRequest;
use App\Http\Requests\Employee\PostEmployeeRequest;
use App\Http\Resources\Employee\EmployeeResource;
use App\Models\Employee;

class EmployeeController extends Controller
{
    public function index(FilterEmployeeRequest $request)
    {
        $query = Employee::query();

        if ($request->has('first_name')) {
            $query->where('first_name', 'like', '%' . $request->input('first_name') . '%');
        }

        if ($request->has('last_name')) {
            $query->where('last_name', 'like', '%' . $request->input('last_name') . '%');
        }

        if ($request->has('position')) {
            $query->where('position', 'like', '%' . $request->input('position') . '%');
        }

        if ($request->has('active')) {
            $query->where('active', $request->input('active'));
        }

        $employees = $query->get();

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

    public function destroy(Employee $employee)
    {
        $employee->delete();

        return response()->json(['message' => 'Employee deleted successfully'], 204);
    }
}
