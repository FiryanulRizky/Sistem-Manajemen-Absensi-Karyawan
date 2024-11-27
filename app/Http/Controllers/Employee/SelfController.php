<?php

namespace App\Http\Controllers\Employee;

use App\Holiday;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SelfController extends Controller
{
    public function holidays() {
        $data = [
            'holidays' => Holiday::all()
        ];

        return view('employee.self.holidays')->with($data);
    }

    public function expenseClaim () {
        $data = [
            'employee' => Auth::user()->employee
        ];
        return view('employee.self.expense-claim')->with($data);
    }

    public function expenseStore(Request $request, $employee_id) {
        $this->validate($request, [
            'reason' => 'required',
            'description' => 'required',
            'amount' => 'required | numeric',
            'receipt' => 'image | nullable'
        ]);

        if ($request->hasFile('receipt')) {
            // GET FILENAME
            $filename_ext = $request->file('receipt')->getClientOriginalName();
            // GET FILENAME WITHOUT EXTENSION
            $filename = pathinfo($filename_ext, PATHINFO_FILENAME);
            // GET EXTENSION
            $ext = $request->file('receipt')->getClientOriginalExtension();
            //FILNAME TO STORE
            $filename_store = $filename.'_'.time().'.'.$ext;
            // UPLOAD IMAGE
            $path = $request->file('receipt')->storeAs('public/receipts', $filename_store);
            } else {
            $filename_store = 'noimg.jpg';
            }
        dd($path);
    }

    public function salary_slip() {
        $employee = Auth::user()->employee;
        $expenses = DB::table('expenses')->where('employee_id',$employee->id)->orderBy('created_at','desc')->first();
        $users = DB::table('users')->where('id',$employee->user_id)->first();
        $departments = DB::table('departments')->where('id',$employee->department_id)->first();
        $data = [
            'employee' => $employee,
            'expenses' => $expenses,
            'users' => $users,
            'departments' => $departments
        ];
        return view('employee.self.salary')->with($data);
    }
    public function salary_slip_print() {
        $employee = Auth::user()->employee;
        $expenses = DB::table('expenses')->where('employee_id',$employee->id)->orderBy('created_at','desc')->first();
        $users = DB::table('users')->where('id',$employee->user_id)->first();
        $departments = DB::table('departments')->where('id',$employee->department_id)->first();
        $data = [
            'employee' => $employee,
            'expenses' => $expenses,
            'users' => $users,
            'departments' => $departments
        ];
        return view('employee.self.salary-print')->with($data);
    }
}
