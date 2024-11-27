<?php

namespace App\Http\Controllers\Admin;

use App\Department;
use App\Employee;
use App\Expense;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    public function index() {
        $expenses = Expense::all();
        $expenses = $expenses->map(function($expense, $key) {
            $employee = Employee::find($expense->employee_id);
            $employee->department = Department::find($employee->department_id)->name;
            $expense->employee = $employee;
            return $expense;
        });
        return view('admin.expenses.index')->with('expenses', $expenses);
    }

    public function setting_index() {
        $departments = Department::all();
        $departments =$departments->map(function($department, $key) {
            $employee = Employee::find($department->id);
            $employee->department = Department::find($employee->department_id)->name;
            $employee->overtime_cost = Department::find($employee->department_id)->overtime_cost;
            $department->employee = $employee;
            return $department;
        });
        return view('admin.expenses.setting_index')->with('departments', $departments);
    }

    public function setting_update(Request $request, $department_id)
    {
        $department = Department::findOrFail($department_id);
        $this->validate($request, [
            'name' => 'required',
        ]);
        $department->name = $request->name;
        $department->overtime_start = $request->overtime_start;
        $department->overtime_end = $request->overtime_end;
        $department->overtime_cost = $request->overtime_cost;
        $department->save();
        $request->session()->flash('success', 'Update Setting Lembur berhasil');
        return redirect()->route('admin.expenses.setting_index');
    }

    public function setting_edit($department_id)
    {
        $department = Department::findOrFail($department_id);

        return view('admin.expenses.setting_edit')->with('department', $department);
    }

    public function update(Request $request, $expense_id){
        $this->validate($request, [
            'status' => 'required'
        ]);
        $expense = Expense::find($expense_id);
        $expense->status = $request->status;
        $expense->save();
        $request->session()->flash('success', 'Status Lembur Berhasil Di Update');
        
        return back();
    }
}
