# Sistem-Manajemen-Absensi-Karyawan

Oleh : Muhammad Firyanul Rizky, email : firyan2903@gmail.com, no. hp : 0895606181117

Dibuat menggunakan Framework Laravel 12 dan PHP 8.4.5

Ketentuan demo aplikasi :
1. instalasi database pada file env dengan nama database: absensi
2. diberikan 3 pilihan untuk fill data pada database :
   - dengan seeder : jalankan php artisan migrate:fresh --seed
   - import data absensi.sql yang sudah disediakan
   - dengan eloquent orm
3. masuk sesi admin
   - email firyan2903@gmail.com dan password : 123
   - email admin@gmail.com dan password : pw111018
4. masuk sesi karyawan
   - email anul29@mail.com dan password :123456
   - email (sesuai data seeder : Perawat s/d Petugas Kebersihan) => password (semua akun sama) : petugas123

Update Aplikasi :
1. Fitur Register Admin terdapat pada awal sesi sebelum login
2. Sedangkan Fitur Register Karyawan terdapat dalam sesi Admin setelah login

NOTE : Penambahan admin selain melalui menu register bisa dilakukan juga menggunakan eloquent orm, untuk petunjuk bisa lihat screenshot paling bawah. Sedangkan Untuk karyawan bisa dilakukan pada fitur tambah karyawan pada sesi admin atau bisa juga memakai eloquent orm dengan ketentuan :
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

# 5. Menu Setting Lembur oleh Admin.
Admin bisa mengatur parameter hitung dari penentuan lembur tiap Department seperti jam awal/batas akhir dan upah lembur per jam nya melalui menu setting
![Screenshot 2024-11-27 180854](https://github.com/user-attachments/assets/d0b013b8-6d20-4254-a45b-c3037270363b)

# 6. Pengajuan Lembur oleh Karyawan.
Karyawan dapat mengajukan hak jam lemburnya

![Screenshot 2024-11-27 180424](https://github.com/user-attachments/assets/9681f8b8-957e-4e49-a8cd-0e2785699500)

dimana logika perhitungan lembur ditentukan sebagai berikut :

- Karyawan Melakukan Absen Keluar sesuai Range Lembur dan Jam harus menunjukkan lewat 1 Jam dari parameter setting awal lembur oleh admin, seperti contoh disini jam selesai menunjukkan pukul 21:11

![Screenshot 2024-11-27 180323](https://github.com/user-attachments/assets/c304b025-dc4f-4809-8fc9-d764b457d53d)

- Jumlah Jam Lembur = Selisih Jam Absen Keluar dengan parameter setting awal lembur oleh admin 
  (contoh : pukul 21:11 (dibulatkan 21:00) - pukul 17:00 = 4 Jam)
- Jumlah Upah Lembur = Perkalian Jumlah Jam Lembur dengan parameter setting upah lembur per jam oleh admin
  (contoh : Rp. 10.000,- x 4 Jam = Rp. 40.000,-)

Berikut adalah Operasi Logic Controller yang mengatur perhitungan gaji karyawan :

![Screenshot 2024-11-27 181539](https://github.com/user-attachments/assets/bac374ae-2eec-4d36-a717-b6baa1f03d1e)

# 7. Slip Gaji Karyawan.
Pada Sesi Karyawan terdapat menu Slip Gaji 1 Bulan Terakhir

![Screenshot 2024-11-28 045244](https://github.com/user-attachments/assets/637a0a7a-be74-49ad-a596-e27561597637)

Jika di tekan tombol Print maka akan mencetak dokumen pdf Slip Gaji

![Screenshot 2024-11-28 045320](https://github.com/user-attachments/assets/1178e24e-9dd8-4535-82c5-121d11528c9e)

Berikut adalah logika menampilkan Slip Gaji 1 bulan terakhir :

![Screenshot 2024-11-28 045512](https://github.com/user-attachments/assets/7884e74c-46d7-4658-8854-f30b25dda37e)
