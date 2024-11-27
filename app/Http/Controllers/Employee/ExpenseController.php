<?php

namespace App\Http\Controllers\Employee;

use App\Expense;
use App\Employee;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Intervention\Image\ImageManagerStatic as Image;

class ExpenseController extends Controller
{
    public function index () {
        $employee = Auth::user()->employee;
        $data = [
            'employee' => $employee,
            'expenses' => $employee->expense
        ];
        return view('employee.expenses.index')->with($data);
    }

    public function create () {
        $departemen = DB::table('departments')->where('id',Employee::find(Auth::user()->employee->id)->department_id)->get();
        $absen = DB::table('attendances')->where('employee_id',Auth::user()->employee->id)->get();
        $out = date('H',strtotime($absen[0]->updated_at));
        if($out > date('H',strtotime($departemen[0]->overtime_start)) && $out <= date('H',strtotime($departemen[0]->overtime_end))) {
            $jumlah_jam_lembur = $out - date('H',strtotime($departemen[0]->overtime_start));
            $upah_lembur = $departemen[0]->overtime_cost*$jumlah_jam_lembur;
        } else {
            $upah_lembur = "Jam Lembur adalah lewat dari ".$departemen[0]->overtime_start."";
        }
        $data = [
            'employee' => Auth::user()->employee,
            'jam_absen_out' => $out,
            'jumlah_jam_lembur' => $jumlah_jam_lembur ?? 0,
            'overtime_cost' => $departemen[0]->overtime_cost,
            'upah_lembur' => $upah_lembur
        ];
        return view('employee.expenses.create')->with($data);
    }

    public function store(Request $request, $employee_id) {
        $data = [
            'employee' => Auth::user()->employee
        ];
        $this->validate($request, [
            'reason' => 'required',
            'description' => 'required',
            'amount' => 'required | numeric',
            'receipt' => 'image | nullable'
        ]);

        // Photo upload
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
            // $path = $request->file('receipt')->storeAs('public'.DIRECTORY_SEPARATOR.'employee_photos', $filename_store);
            // add new file name
            $image = $request->file('receipt');
            $image_resize = Image::make($image->getRealPath());              
            $image_resize->resize(300, 300);
            $image_resize->save(public_path(DIRECTORY_SEPARATOR.'storage'.DIRECTORY_SEPARATOR.'receipts'.DIRECTORY_SEPARATOR.$filename_store));
        }
        Expense::create([
            'employee_id' => $employee_id,
            'reason' => $request->input('reason'),
            'description' => $request->input('description'),
            'amount' => $request->input('amount'),
            'receipt' => $filename_store
        ]);
        $request->session()->flash('success', 'Pengajuan Lembur Berhasil Dikirim, silahkan tunggu status approval');
        return redirect()->route('employee.expenses.create')->with($data);
    }

    public function edit($expense_id) {
        $expense = Expense::findOrFail($expense_id);
        Gate::authorize('employee-expenses-access', $expense);
        return view('employee.expenses.edit')->with('expense', $expense);
    }

    public function update(Request $request, $expense_id) {
        $expense = Expense::findOrFail($expense_id);
        Gate::authorize('employee-expenses-access', $expense);
        $data = [
            'employee' => Auth::user()->employee
        ];
        $this->validate($request, [
            'reason' => 'required',
            'description' => 'required',
            'amount' => 'required | numeric',
            'receipt' => 'image | nullable'
        ]);
        $expense->reason = $request->reason;
        $expense->description = $request->description;
        $expense->amount = $request->amount;
        if ($request->hasFile('receipt')) {
            $old_filepath = public_path(DIRECTORY_SEPARATOR.'storage'.DIRECTORY_SEPARATOR.'receipts'.DIRECTORY_SEPARATOR. $expense->receipt);
            if(file_exists($old_filepath)) {
                unlink($old_filepath);
            }    
            // GET FILENAME
            $filename_ext = $request->file('receipt')->getClientOriginalName();
            // GET FILENAME WITHOUT EXTENSION
            $filename = pathinfo($filename_ext, PATHINFO_FILENAME);
            // GET EXTENSION
            $ext = $request->file('receipt')->getClientOriginalExtension();
            //FILNAME TO STORE
            $filename_store = $filename.'_'.time().'.'.$ext;
            // UPLOAD IMAGE
            // $path = $request->file('receipt')->storeAs('public'.DIRECTORY_SEPARATOR.'employee_photos', $filename_store);
            // add new file name
            $image = $request->file('receipt');
            $image_resize = Image::make($image->getRealPath());              
            $image_resize->resize(300, 300);
            $image_resize->save(public_path(DIRECTORY_SEPARATOR.'storage/receipts/'.DIRECTORY_SEPARATOR.$filename_store));
            $expense->receipt = $filename_store;
        }
        $expense->save();
        $request->session()->flash('success', 'Pengajuan Lembur Berhasil Di Update');
        return redirect()->route('employee.expenses.index');
    }

    public function destroy($expense_id) {
        $expense = Expense::findOrFail($expense_id);
        Gate::authorize('employee-expenses-access', $expense);
        $filepath = public_path(DIRECTORY_SEPARATOR.'storage'.DIRECTORY_SEPARATOR.'receipts'.DIRECTORY_SEPARATOR. $expense->receipt);
        if (file_exists($filepath)) {
            File::delete($filepath);
        }
        $expense->delete();
        request()->session()->flash('success', 'Data Pengajuan Lembur Berhasil Di Hapus');
        return redirect()->route('employee.expenses.index');
    }
}
