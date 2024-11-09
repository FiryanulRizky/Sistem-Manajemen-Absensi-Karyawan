<?php

namespace App\Http\Controllers\Employee;
use App\Http\Controllers\Controller;

use App\Leave;
use App\Rules\DateRange;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class LeaveController extends Controller
{
    public function index() {
        $employee = Auth::user()->employee;
        $data = [
            'employee' => $employee,
            'leaves' => $employee->leave
        ];
        return view('employee.leaves.index')->with($data);
    }
    public function create() {
        $employee = Auth::user()->employee;
        $data = [
            'employee' => $employee
        ];

        return view('employee.leaves.create')->with($data);
    }

    public function store(Request $request, $employee_id) {
        $red=route('employee.leaves.create');
        $cb = $request->input('date');
        $cb2 = strtotime("+3 Days");
        $cb3 = date("d",$cb2);
        $cb4 = date('d',(strtotime ( '-1 day' , strtotime ($cb))));
            //$start = $request->input('start_date');
            [$start, $end] = explode(' - ', $request->input('date_range'));
            $start = Carbon::parse($start);
            $end = Carbon::parse($end);
            $str=date('d',strtotime($start));
        if($request->input('reason')=="Sakit" && ($cb3<=date('d', strtotime($cb)) || $cb3<=$str || $cb<date('d') || $str<date('d'))) {
             echo'<script>alert("'.$str.' Izin Sakit hanya bisa diajukan maksimal H+3 sejak tanggal ketidakhadiran");window.location="'.$red.'";</script>';
        }
        else if($request->input('reason')=="Cuti" && (date('d', strtotime($cb)>=$cb4 || $str>=$cb4 || $cb>date('d') || $str>date('d')))) {
             echo'<script>alert("Izin Cuti hanya bisa diajukan maksimal H-1 sejak tanggal ketidakhadiran");window.location="'.$red.'";</script>';
        } else {
        $data = [
            'employee' => Auth::user()->employee
        ];
        if($request->input('multiple-days') == 'ya') {
            $this->validate($request, [
                'reason' => 'required',
                'description' => 'required',
                'date_range' => new DateRange
            ]);
        } else {
            $this->validate($request, [
                'reason' => 'required',
                'description' => 'required'
            ]);
        }
        
        $values = [
            'employee_id' => $employee_id,
            'reason' => $request->input('reason'),
            'description' => $request->input('description'),
            'half_day' => $request->input('half-day')
        ];
        if($request->input('multiple-days') == 'ya') {
            [$start, $end] = explode(' - ', $request->input('date_range'));
            $values['start_date'] = Carbon::parse($start);
            $values['end_date'] = Carbon::parse($end);
        } else {
            $values['start_date'] = Carbon::parse($request->input('date'));
        }
        Leave::create($values);
        $request->session()->flash('success', 'Pengajuan Cuti Anda berhasil, tunggu persetujuan atasan.'); return redirect()->route('employee.leaves.create')->with($data); }
    }

    public function edit($leave_id) {
        $leave = Leave::findOrFail($leave_id);
        Gate::authorize('employee-leaves-access', $leave);
        return view('employee.leaves.edit')->with('leave', $leave);
    }

    public function update(Request $request, $leave_id) {
        $leave = Leave::findOrFail($leave_id);
        Gate::authorize('employee-leaves-access', $leave);
        if($request->input('multiple-days') == 'ya') {
            $this->validate($request, [
                'reason' => 'required',
                'description' => 'required',
                'date_range' => new DateRange
            ]);
        } else {
            $this->validate($request, [
                'reason' => 'required',
                'description' => 'required'
            ]);
        }

        $leave->reason = $request->reason;
        $leave->description = $request->description;
        $leave->half_day = $request->input('half-day');
        if($request->input('multiple-days') == 'ya') {
            [$start, $end] = explode(' - ', $request->input('date_range'));
            $start = Carbon::parse($start);
            $end = Carbon::parse($end);
            $leave->start_date = $start;
            $leave->end_date = $end;
        } else {
            $leave->start_date = Carbon::parse($request->input('date'));
        }

        $leave->save();

        $request->session()->flash('success', 'Update Pengajuan Cuti Anda berhasil');
        return redirect()->route('employee.leaves.index');
    }

    public function destroy($leave_id) {
        $leave = Leave::findOrFail($leave_id);
        Gate::authorize('employee-leaves-access', $leave);
        $leave->delete();
        request()->session()->flash('success', 'Pengajuan Cuti Anda berhasil dihapus');

        return redirect()->route('employee.leaves.index');
    }
}
