# Sistem-Manajemen-Absensi-Karyawan

Oleh : Muhammad Firyanul Rizky, email : firyan2903@gmail.com, no. hp : 0895606181117

Dibuat menggunakan Framework Laravel 9

Ketentuan demo aplikasi :
1. instalasi database pada file env dengan nama database: absensi, kemudian lakukan migrasi : php artisan migrate, lalu tambah data dengan eloquent orm, atau bisa gunakan langsung databse sql yg sudah disediakan.
2. masuk sesi admin dengan email firyan2903@gmail.com dan password : 123
3. masuk sesi karyawan dengan email anul29@mail.com dan password :123456

Kekurangan Aplikasi :
fitur register baik admin dan karyawan belum rampung sepenuhnya pada index, sementara untuk penambahan admin bisa dilakukan menggunakan eloquent orm, untuk petunjuk bisa lihat screenshot paling bawah. Sedangkan Untuk karyawan bisa dilakukan pada fitur tambah karyawan pada sesi admin atau bisa juga memakai eloquent orm dengan ketentuan :
1. lakukan perintah php artisan tinker, lalu buat variabel baru $emp = new App\Employee
2. selanjutnya ikuti petunjuk pada screenshot paling bawah untuk menambahkan elemen 'user_id', 'first_name', 'last_name', 'sex', 'dob', 'join_date', 'desg', 'department_id', 'salary', 'photo'

# Berikut adalah ketentuan yang sudah terpenuhi :
# 1. Menggambarkan flow diagram / usecase diagram sederhana yang menggambarkan fitur sistem
![Catatan 2  Use Case Diagram](https://user-images.githubusercontent.com/60762912/145530391-7a20f130-c3ee-456a-93d6-707f64d82a69.png)

# 2. Mengatur Status Absen masuk yang dilakukan karyawan sebelum jam 09.00 pagi, sedangkan absen keluar dilakukan setelah jam 17.00 akan diberikan status tidak valid pada sistem.

Operasi Logic Controller yang mengatasi permasalahan no. 2
![15  Logic Controller dalam menampilkan status absensi](https://user-images.githubusercontent.com/60762912/145531107-963526e1-8a92-439d-b72b-dbb530f69888.PNG)

Operasi Logic View yang akan menampilkan masing-masing status absensi berdasarkan ketentuan.
![16  Logic View dalam menampilkan status absensi](https://user-images.githubusercontent.com/60762912/145531136-103e6c10-2332-4fab-bad2-cc880a9bee5e.PNG)

Hasil Implementasi masalah no. 2
-- Tampak Absensi Terlambat jika absensi dilakukan jam 09.00 pagi atau lebih, sedangkan sebelum jam 9 akan dinyatakan tepat waktu --
![9  Tampak Absensi Terlambat](https://user-images.githubusercontent.com/60762912/145530858-5721660f-9d0b-47c0-8328-f0d25a15ba87.PNG)

-- Tampak Absensi Tidak Valid jika absensi dilakukan diatas jam 17:00 sampai jam 7 Pagi --
![10  Tampak Absensi Tidak Valid](https://user-images.githubusercontent.com/60762912/145530876-22eb653d-7fc8-4a30-8cd7-28ba1387aba4.PNG)

# 2. menyediakan fitur pengajuan ketidakhadiran kerja dibagi menjadi 2 yaitu izin sakit dan izin cuti.

![11  Daftar Cuti Karyawan](https://user-images.githubusercontent.com/60762912/145538284-7e8ac00d-40d0-45aa-a2e5-84d92603a933.png)

Ketentuan masalah no. 2 adalah :

-- 1. Apabila karyawan sedang sakit, izin sakit bisa diinputkan maksimal H+3 sejak tanggal ketidakhadiran karyawan --
-- 2. Apabila karyawan ingin mengajukan cuti, karyawan dapat menginputkan izin cuti maksimal H-1 dari rencana ketidakhadiran karyawan --
Dibawah ini adalah operasi logic yang mengatur ketentuan 1 dan 2 untuk izin sakit dan cuti.

Operasi Logic untuk mengatasi ketentuan pertama dan kedua :

![17  Logic Controller dalam mengatur izin sakit atau cuti](https://user-images.githubusercontent.com/60762912/145531154-57799a09-1bc2-4f01-a110-5ed1d5a474af.PNG)

Apabila melanggar ketentuan pertama, maka akan tampil alert :

![12  Batasan Pengajuan Maksimum 3 Hari untuk Izin Sakit](https://user-images.githubusercontent.com/60762912/145538814-cfad2d6b-1418-42b0-9467-be5fb1879ef8.png)

Sedangkan, jika melanggar ketentuan kedua, maka akan tampil alert :

![13  Batasan Pengajuan Maksimum H-1 untuk Izin Cuti](https://user-images.githubusercontent.com/60762912/145538831-44081a28-bcdd-43ef-ad94-cb44ee28ccbc.png)

-- 3. Setelah izin cuti diinputkan, manajer/atasan karyawan dalam hal ini user dengan sesi admin harus melakukan approval terhadap izin cuti yang diajukan --

![3  List Cuti Karyawan](https://user-images.githubusercontent.com/60762912/145530688-110c23b7-7751-40e1-b293-f406fe3b4b7e.PNG)

![4  Ubah Status Cuti Karyawan](https://user-images.githubusercontent.com/60762912/145530702-23781829-3f15-4872-8ffd-b09791109f44.PNG)

# 3. Semua data yang terekam dari semua fitur diatas dapat ditampilkan menjadi sebuah laporan yang berisi ketidakhadiran dan absensi karyawan. 

Ketentuan Masalah No. 3 adalah : 

-- 1. Laporan ditampilkan per karyawan dan hanya dapat dilihat oleh HRD dan manajer/atasan -- 

Mengatasi masalah 1, sistem dibuat dengan 2 user, yakni admin dan karyawan, pada sesi admin user bisa melihat laporan per karyawan :

![2  Dashboard Admin](https://user-images.githubusercontent.com/60762912/145530637-608ce856-936c-4307-8df7-a557741b871f.PNG)

![3  List Absensi Karyawan](https://user-images.githubusercontent.com/60762912/145530667-b3a718ec-ab9c-4540-b541-e229ab49b48e.PNG)

-- 2. karyawan hanya bisa melihat rekaman data dirinya sendiri saja --
Mengatasi masalah 2, diperlukan sesi user karyawan yang hanya di autorisasi dan diizinkan untuk melihat laporannya sendiri :

![5  Dashboard Karyawan](https://user-images.githubusercontent.com/60762912/145530736-b326175a-0e7b-464a-bda1-cc166d5203bd.PNG)

![List Absensi Karyawan](https://user-images.githubusercontent.com/60762912/145540622-19727929-ea04-428d-bf06-5d6d25bc97aa.PNG)

# 4. Absen masuk dan keluar menggunakan geo-tagging dari tempat tertentu.
Berikut 2 dibawah adalah implementasinya, sistem sudah bisa menginputkan wilayah berdasarkan geo tagging lokasi.

Geo Tagging Untuk absen masuk :

![7  Absen Masuk Karyawan](https://user-images.githubusercontent.com/60762912/145530825-1cef1e14-fb4b-4351-9d8e-1af48ba33e03.PNG)

Geo Tagging Untuk absen keluar :

![8  Absen Keluar Karyawan](https://user-images.githubusercontent.com/60762912/145530842-aa1a05a3-c7fe-4b41-a582-01024cdf2ef2.PNG)

# 4. Menggunakan Eloquent ORM Laravel dalam melakukan interaksi database.
Berikut adalah implementasinya :
![14  Interaksi Database dengan Eloquent ORM Laravel](https://user-images.githubusercontent.com/60762912/145530517-386bf347-741b-4940-909c-ee07fcd59f30.PNG)