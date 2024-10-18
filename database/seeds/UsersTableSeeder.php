<?php

namespace Database\Seeders;

use App\Attendance;
use App\Department;
use \DateTime as DateTime;
use App\Role;
use App\User;
use App\Employee;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        DB::table('role_user')->truncate();
        DB::table('employees')->truncate();
        DB::table('departments')->truncate();
        DB::table('attendances')->truncate();
        $employeeRole = Role::where('name', 'employee')->first();
        $adminRole =  Role::where('name', 'admin')->first();

        $admin = User::create([
            'name' => 'Firyanul Rizky',
            'email' => 'firyan2903@gmail.com',
            'password' => Hash::make('123')
        ]);

        $employee = User::create([
            'name' => 'Anul Emp',
            'email' => 'anul29@mail.com',
            'password' => Hash::make('123456')
        ]);

        // 
        $employee->roles()->attach($employeeRole);
        $dob = new DateTime('1999-03-29');
        $join = new DateTime('2021-09-15');
        $admin->roles()->attach($adminRole);
        $admin = Employee::create([
            'user_id' => $admin->id,
            'first_name' => 'Firyanul',
            'last_name' => 'Rizky',
            'dob' => $dob->format('Y-m-d'),
            'sex' => 'Male',
            'desg' => 'Manager',
            'department_id' => '1',
            'join_date' => $join->format('Y-m-d'),
            'salary' => 6500000,
            'photo' => 'download.png'
        ]);
        $employee = Employee::create([
            'user_id' => $employee->id,
            'first_name' => 'Anul',
            'last_name' => 'Emp',
            'dob' => $dob->format('Y-m-d'),
            'sex' => 'Male',
            'desg' => 'Staff',
            'department_id' => '9',
            'join_date' => $join->format('Y-m-d'),
            'salary' => 300000,
            'photo' => 'download_1639112200.png'
        ]);

        Department::create(['name' => 'Manajemen']);
        Department::create(['name' => 'Perawat']);
        Department::create(['name' => 'Bidan']);
        Department::create(['name' => 'Dokter']);
        Department::create(['name' => 'Kasir']);
        Department::create(['name' => 'Farmasi']);
        Department::create(['name' => 'Front Office']);
        Department::create(['name' => 'Petugas Kebersihan']);
        Department::create(['name' => 'Backend Developer']);

        // Attendance seeder
        $create = Carbon::create(2021, 8, 17, 10, 00, 23, 'Asia/Jakarta');
        $update = Carbon::create(2021, 8, 17, 17, 00, 23, 'Asia/Jakarta');
            $attendance = Attendance::create([
                'employee_id' => $employee->id,
                'entry_ip' => '127.0.0.1',
                'entry_location' => '',
                'created_at' => $create
            ]);
            $attendance->exit_ip = '127.0.0.1';
            $attendance->exit_location = '';
            $attendance->registered = 'yes';
            $attendance->updated_at = $update;
            $attendance->save();
            $create->addDay();
            $update->addDay();
    }
}
