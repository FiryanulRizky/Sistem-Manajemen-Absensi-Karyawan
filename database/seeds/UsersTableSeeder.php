<?php

use App\Attendance;
use App\Department;
use \DateTime as DateTime;
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

        $admin = User::create([
            'name' => 'Firyanul Rizky',
            'email' => 'firyan2903@gmail.com',
            'password' => Hash::make('123')
        ]);
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('pw111018')
        ]);

        $employee = User::create([
            'name' => 'Anul Emp',
            'email' => 'anul29@mail.com',
            'password' => Hash::make('123456')
        ]);
        $employee = User::create([
            'name' => 'Manajemen',
            'email' => 'manajemen@gmail.com',
            'password' => Hash::make('petugas123')
        ]);
        $employee = User::create([
            'name' => 'Perawat',
            'email' => 'perawat@gmail.com',
            'password' => Hash::make('petugas123')
        ]);
        $employee = User::create([
            'name' => 'Bidan',
            'email' => 'bidan@gmail.com',
            'password' => Hash::make('petugas123')
        ]);
        $employee = User::create([
            'name' => 'Dokter',
            'email' => 'dokter@gmail.com',
            'password' => Hash::make('petugas123')
        ]);
        $employee = User::create([
            'name' => 'Kasir',
            'email' => 'kasir@gmail.com',
            'password' => Hash::make('petugas123')
        ]);
        $employee = User::create([
            'name' => 'Farmasi',
            'email' => 'farmasi@gmail.com',
            'password' => Hash::make('petugas123')
        ]);
        $employee = User::create([
            'name' => 'Front Office',
            'email' => 'front_office@gmail.com',
            'password' => Hash::make('petugas123')
        ]);
        $employee = User::create([
            'name' => 'Petugas Kebersihan',
            'email' => 'petugas_kebersihan@gmail.com',
            'password' => Hash::make('petugas123')
        ]);

        $dob = new DateTime('1999-03-29');
        $join = new DateTime('2021-09-15');
        $admin = Employee::create([
            'user_id' => 1,
            'first_name' => 'Firyanul',
            'last_name' => 'Rizky',
            'dob' => $dob->format('Y-m-d'),
            'sex' => 'Male',
            'desg' => 'Manager',
            'department_id' => 1,
            'join_date' => $join->format('Y-m-d'),
            'salary' => 6500000,
            'photo' => 'download.png'
        ]);
        $admin = Employee::create([
            'user_id' => 2,
            'first_name' => 'Admin',
            'last_name' => '',
            'dob' => $dob->format('Y-m-d'),
            'sex' => 'Male',
            'desg' => 'Manager',
            'department_id' => 1,
            'join_date' => $join->format('Y-m-d'),
            'salary' => 6500000,
            'photo' => 'admin.png'
        ]);
        $employee = Employee::create([
            'user_id' => 3,
            'first_name' => 'Anul',
            'last_name' => 'Emp',
            'dob' => $dob->format('Y-m-d'),
            'sex' => 'Male',
            'desg' => 'Staff',
            'department_id' => 9,
            'join_date' => $join->format('Y-m-d'),
            'salary' => 300000,
            'photo' => 'download_1639112200.png'
        ]);
        $employee = Employee::create([
            'user_id' => 4,
            'first_name' => 'Manajemen',
            'last_name' => '',
            'dob' => $dob->format('Y-m-d'),
            'sex' => 'Male',
            'desg' => 'Manager',
            'department_id' => 1,
            'join_date' => $join->format('Y-m-d'),
            'salary' => 6500000,
            'photo' => 'manajemen.png'
        ]);
        $employee = Employee::create([
            'user_id' => 5,
            'first_name' => 'Perawat',
            'last_name' => '',
            'dob' => $dob->format('Y-m-d'),
            'sex' => 'Female',
            'desg' => 'Staff',
            'department_id' => '2',
            'join_date' => $join->format('Y-m-d'),
            'salary' => 300000,
            'photo' => 'perawat.png'
        ]);
        $employee = Employee::create([
            'user_id' => 6,
            'first_name' => 'Bidan',
            'last_name' => '',
            'dob' => $dob->format('Y-m-d'),
            'sex' => 'Female',
            'desg' => 'Staff',
            'department_id' => '3',
            'join_date' => $join->format('Y-m-d'),
            'salary' => 300000,
            'photo' => 'bidan.png'
        ]);
        $employee = Employee::create([
            'user_id' => 7,
            'first_name' => 'Dokter',
            'last_name' => '',
            'dob' => $dob->format('Y-m-d'),
            'sex' => 'Female',
            'desg' => 'Staff',
            'department_id' => '4',
            'join_date' => $join->format('Y-m-d'),
            'salary' => 300000,
            'photo' => 'dokter.png'
        ]);
        $employee = Employee::create([
            'user_id' => 8,
            'first_name' => 'Kasir',
            'last_name' => '',
            'dob' => $dob->format('Y-m-d'),
            'sex' => 'Female',
            'desg' => 'Staff',
            'department_id' => '5',
            'join_date' => $join->format('Y-m-d'),
            'salary' => 300000,
            'photo' => 'kasir.png'
        ]);
        $employee = Employee::create([
            'user_id' => 9,
            'first_name' => 'Farmasi',
            'last_name' => '',
            'dob' => $dob->format('Y-m-d'),
            'sex' => 'Female',
            'desg' => 'Staff',
            'department_id' => '6',
            'join_date' => $join->format('Y-m-d'),
            'salary' => 300000,
            'photo' => 'farmasi.png'
        ]);
        $employee = Employee::create([
            'user_id' => 10,
            'first_name' => 'Front',
            'last_name' => 'Office',
            'dob' => $dob->format('Y-m-d'),
            'sex' => 'Male',
            'desg' => 'Staff',
            'department_id' => '7',
            'join_date' => $join->format('Y-m-d'),
            'salary' => 300000,
            'photo' => 'front_office.png'
        ]);
        $employee = Employee::create([
            'user_id' => 11,
            'first_name' => 'Petugas',
            'last_name' => 'Kebersihan',
            'dob' => $dob->format('Y-m-d'),
            'sex' => 'Female',
            'desg' => 'Staff',
            'department_id' => '8',
            'join_date' => $join->format('Y-m-d'),
            'salary' => 300000,
            'photo' => 'petugas_kebersihan.png'
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

        for($j=1;$j<=$admin->id;$j++) {
            DB::table('role_user')->insert([
                'role_id' => 1,
                'user_id' => $j
            ]);
        }

        for($i=3;$i<=$employee->id;$i++) {
            DB::table('role_user')->insert([
                'role_id' => 2,
                'user_id' => $i
            ]);
        }

        for($k=3;$k<=$employee->id;$k++) { 
            $attendance = Attendance::create([
                'employee_id' => $k,
                'entry_ip' => '127.0.0.1',
                'entry_location' => '',
                'created_at' => $create
            ]);
            $attendance->exit_ip = '127.0.0.1';
            $attendance->exit_location = '';
            $attendance->registered = 'ya';
            $attendance->updated_at = $update;
            $attendance->save();
            $create->addDay();
            $update->addDay();
        }
    }
}
