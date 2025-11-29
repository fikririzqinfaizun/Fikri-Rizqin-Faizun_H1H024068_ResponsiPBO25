## PBO RESPONSI POKEMON PARAS

NAMA : Fikri Rizqin Faizun
NIM : H1H024068
SHIFT AWAL : C
SHIFT AKHIR : D

## Penjelasan singkat kode dan aplikasi:
Aplikasi PokéCare adalah sebuah simulasi sederhana untuk merawat dan melatih Pokémon, khususnya Pokémon Paras, menggunakan bahasa PHP, HTML, dan CSS tanpa framework tambahan.
    
a. Pokemon.php (Class Abstrak)
⦁	Merupakan class induk yang berisi:
⦁	Properti private (name, type, hp, level, specialMove) menerapkan Encapsulation
⦁	Method getter dan setter
⦁	Method abstrak specialMove() → menerapkan Abstraction
⦁	Method train() untuk memproses perubahan level dan HP Pokémon

b. Bellsprout.php (Class Turunan)
⦁	Meng-extend class Pokemon → Inheritance
⦁	Mengisi data: tipe Grass/Poison, level awal, HP awal, jurus Vine Whip
⦁	Override method specialMove() → Polymorphism

2. Halaman Utama (index.php)
Menampilkan:
⦁	Nama Pokémon
⦁	Gambar Bellsprout
⦁	Tipe, level, HP
⦁	Jurus spesial
⦁	Tombol menuju halaman latihan & riwayat
Session digunakan untuk menyimpan objek Pokémon sehingga data level & HP tidak hilang saat berpindah halaman.

3. Halaman Latihan (train.php)
Fitur:
⦁	Form untuk memilih jenis latihan (Attack, Defense, Speed)
⦁	Input intensitas
⦁	Proses latihan memanggil train() dan specialMove()
⦁	Menampilkan hasil perubahan level dan HP
⦁	Mencatat riwayat ke dalam session

4. Halaman Riwayat (history.php)
⦁	Menampilkan seluruh sesi latihan:
⦁	Jenis latihan
⦁	Intensitas
⦁	Level sebelum & sesudah
⦁	HP sebelum & sesudah
⦁	Timestamp
⦁	Data riwayat disimpan dalam $_SESSION["history"].

5. style.css
Mengatur tampilan:
⦁	Card layout
⦁	Tombol navigasi
⦁	Gambar Pokémon
⦁	Layout responsif sederhana

##Cara Menjalankan Aplikasi
1. Pastikan laragon sudah diaktifkan
2. Buka browser lalu masuk ke localhost dan folder dimana program disimpan
   (http://localhost/Fikri_Rizqin_Faizun_H1H024068_ResponsiPBO25/index.php)
3. Setelah masuk, aplikasi siap digunakan
4. Pada halaman depan bisa terlihat informasi dasar mengenai pokemon nya
5. Terdapat pilihan menu mulai latihan dan riwayata latihan
6. Pencet tombol Mulai Latihan, untuk melakukan latihan
7. Didalamnya dapat memilih jenis latihan yang mau dilakukan dan intensistas latihan yang mau
   dilakukan
8. Setelah memencet latihan, akan muncul hasil latihan
9. Pencet Riwayat latihan untuk melihat semua hasil latihan yang telah dilakukan.
10. Pencet tombol kembali untuk balik ke halaman depan.

DEMO SINGKAT

![demo video paras pokemon](https://github.com/user-attachments/assets/dcac361e-8be2-44c9-a5d4-a1e51eaeb953)



