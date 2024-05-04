# LP11DPBO2024C1
## Janji
saya Amelia Zalfa Julianti dengan NIM 2203999 mengerjakan Latihan Praktikum 11 mata kuliah Desain dan Pemrograman Berorientasi Objek untuk keberkahanNya maka saya tidak melakukan kecurangan sesuai dengan apa yang tekah dispesifikasikan. Aamiin.

## Desain Program
1. **Model**
   - Kelas `DB`: Mengatur koneksi ke database dan melakukan operasi query.
   - Kelas `Pasien`: Merepresentasikan data pasien dengan atribut seperti id, nik, nama, tempat lahir, tanggal lahir, jenis kelamin, email, dan telepon.
   - Kelas `TabelPasien`: Bertanggung jawab untuk operasi CRUD (Create, Read, Update, Delete) pada tabel pasien di database.

2. **Presenter**
   - Antarmuka `KontrakPresenter`: Mendefinisikan kontrak (interface) untuk kelas presenter.
   - Kelas `ProsesPasien`: Mengimplementasikan antarmuka `KontrakPresenter` dan bertindak sebagai penghubung antara Model dan View. Kelas ini mengatur logika bisnis dan mengakses data dari Model serta menginstruksikan View untuk menampilkan data.

3. **View**
   - Antarmuka `KontrakView`: Mendefinisikan kontrak (interface) untuk kelas view.
   - Kelas `TampilPasien`: Mengimplementasikan antarmuka `KontrakView` dan bertanggung jawab untuk menampilkan data pasien dalam format yang dapat dibaca oleh pengguna. Kelas ini berinteraksi dengan Presenter (`ProsesPasien`) untuk mendapatkan data dan menampilkannya.
   - Terdapat juga file template HTML (`form.html` dan `skin.html`) yang digunakan oleh kelas `TampilPasien` untuk menampilkan antarmuka pengguna.
   
Program juga mencakup file-file seperti `create.php`, `delete.php`, dan `edit.php` yang bertanggung jawab untuk menangani operasi tambah, hapus, dan edit data pasien secara berturut-turut. File-file ini juga menggunakan kelas `TampilPasien` untuk menampilkan antarmuka dan berinteraksi dengan Presenter (`ProsesPasien`).

## Alur Program
1. Program dimulai dari `index.php`.
2. Objek `TampilPasien` dibuat, dan metode `tampil()` dipanggil.
3. Metode `tampil()` akan memanggil metode `prosesDataPasien()` pada objek `ProsesPasien` untuk mengambil data pasien dari database.
4. Data pasien yang diperoleh kemudian diolah dan ditampilkan dalam bentuk HTML menggunakan file template `skin.html`.
5. Untuk operasi CRUD (Create, Read, Update, Delete), file-file seperti `create.php`, `delete.php`, dan `edit.php` akan dijalankan, yang kemudian akan memanggil metode yang sesuai pada objek `TampilPasien` dan `ProsesPasien` untuk melakukan operasi tersebut.

## Dokumentasi
https://github.com/liazalfaj/LP11DPBO2024C1/assets/114666885/5193d0e2-a745-45f4-bea4-41010e370c52
![image](https://github.com/liazalfaj/LP11DPBO2024C1/assets/114666885/74c509ac-63b5-4624-a8e8-b77d9f37af94)

![image](https://github.com/liazalfaj/LP11DPBO2024C1/assets/114666885/1d1b03ed-620a-4efc-8ae0-8b3074c2777e)

![image](https://github.com/liazalfaj/LP11DPBO2024C1/assets/114666885/97e1fc60-523c-44ad-8245-df0ed3e75b25)




