<p align="center">
    <img src="https://mysch.id/cms_web/upload/picture/aplikasi-ujian-online-berbasis-web.jpg" 
        width="400" alt="Laravel Logo">
</p>

## CBT 5 TYPE SOAL PENYEMPURNAAN
## Septermber 2024
### Tipe Soal
- 1 = Pilihan Ganda
- 2 = Uraian
- 3 = Benar salah
- 4 = Pilihan Ganda Kompleks
- 5 = Menjodohkan

## Penyempurnaan
### Keterangan Siswa / User
- Menambahkan status siswa (aktif dan nonaktif), jika aktif dapat login ke CBT, jika nonaktif tidak dapat login ke CBT
- Menambahkan kolom agama dan jurusan di bagian siswa, yang nantinya digunakan untuk validasi soal atau ujian

### Validasi Bank Soal
- Menambah validasi ujian dengan menyamakan jurusan, agama, kelas siswa dengan data siswa, agar ujian yang tampil pada halaman siswa sudah sesuai dengan data siswa
- menambahkan inputan identitas mapel dan jurusan

### Setting Autologout
- menambahkan fitur untuk dapat memilih autologout pada CBT aktif atau tidak yang berada di dalam menu setting
- jika aktif maka saat siswa mengerjakan dan membuka tab baru maka akan otomatis logout
- jika nonaktif maka siswa dapat membuka tab lain saat mengerjakan ujian

### Nilai Hasil
- memperbaiki nilai hasil dari segi tampilan dan penghitungan
- menambahkan fitur atau tombol cetak seluruh hasil siswa
- memperbaiki urutan hasil jawaban siswa
- memperbaiki penilaian ujian yang memiliki tipe soal uraian

## Installation
1. Buat database baru lalu import database 'cbt_5type_soal.sql'.
2. Setting database (nama db, username db, dan password db) pada folder koneksi dan file config.php

## Thank to All Contribute this Code
- *Syafii* (2019)
- *Hisyam* (2020)
- *Muchtarom* (2021)
- *Novi* (2022)
- *Imam* (2024)
- *Feri* (2021)
