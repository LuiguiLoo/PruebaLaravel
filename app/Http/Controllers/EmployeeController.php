<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Company;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index() {
        $employees = Employee::paginate(10);
        return view('employees.index', compact('employees'));
    }
    public function create() {
        $companies = Company::all();
        return view('employees.create', compact('companies'));
    }

    public function store(Request $request) {
        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'company_id' => 'required|exists:companies,id',
            'email' => 'required|email|unique:employees',
            'phone' => 'nullable|string|max:20'
        ]);
        try {
            Employee::create($validatedData);
            return redirect()->route('employees.index')->with('success', 'Empleado creado correctamente.');
        } catch (\Exception $e) {
            return redirect()->route('companies.index')->with('error', $e->getMessage());
        }
    }


    public function show(Employee $employee) {
        return view('employees.show', compact('employee'));
    }

    public function edit(Employee $employee) {
        $companies = Company::all();
        return view('employees.edit', compact('employee', 'companies'));
    }
    public function update(Request $request, Employee $employee) {
        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'company_id' => 'required|exists:companies,id',
            'email' => 'required|email|unique:employees,email,' . $employee->id,
            'phone' => 'nullable|string|max:20'
        ]);
        try {
            $employee->update($validatedData);
            return redirect()->route('employees.index')->with('success', 'Empleado actualizado correctamente.');
        } catch (\Exception $e) {
            return redirect()->route('companies.index')->with('error', $e->getMessage());
        }
    }

    public function destroy(Employee $employee) {
        try {
            $employee->delete();
            return redirect()->route('employees.index')->with('success', 'Empleado eliminado correctamente.');
        } catch (\Exception $e) {
            return redirect()->route('companies.index')->with('error', $e->getMessage());
        }
    }

}
