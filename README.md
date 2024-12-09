<p align="center">
     <img src="https://cdn.icon-icons.com/icons2/928/PNG/512/optimization_icon-icons.com_72195.png" width="400" alt="Laravel Logo">
</p>

# CBT 5 TYPE SOAL PENYEMPURNAAN OPTIMASI
> [!NOTE]
> [ November 2024 ]
> Latar belakang optimasi karena ada kampus yang menggunakan CBT 5 tipe dengan user 100 dengan jumlah 100 mengalami masalah pada server.
> Dikarenakan data pada kolom jawabother terlalu banyak ( 20.000 baris ).
> Penyimpanan data jawaban vertikal jadi banyak sekali

> [!CAUTION]
> Ubah type kolom `jawaban` pada tabel `nilaihasil` dan kolom `jawabansiswa` pada tabel `jawaban` menjadi `longtext` karena akan digunakan untuk menyimpan data jawaban siswa 


## Optimasi
Alur | Lama | Optimasi |
---- | ---- | -------- |
Simpan jawaban| Data jawaban siswa disimpan vertikal dan ditampilkan pada hasil jawaban dari tabel `jawabother` dan tidak dihapus | Jawaban siswa disimpan pada `jawabother` kemudian ketika selesai maka jawaban siswa akan disimpan pada tabel `nilaihasil` dikolom `jawaban` bentuk json. Dan data jawaban siswa ditabel `jawabother` akan dihapus | 
Siswa jawab soal | Ketika siswa jawab 1 soal maka akan cek `GET` di tabel `jawabother` apakah sudah ada atau belum, jika sudah maka `update` jika belum maka `create` | Ketika siswa jawab soal pertama kali maka id_jawaban siswa akan disimpan pada `SESSION`. Jadi setiap siswa menjawab akan dicek di `session` apakah siswa pernah soal tersebut atau belum, jika sudah maka `update` dan jika belum `create`. Intinya kita tidak perlu `GET` data dari tabel `jawabother` ketika menjawab setiap soal ( meminimalisir query ke database) |
|Lihat jawaban| Lihat jawaban siswa pada admin ambil dari tabel `jawabother` ( datanya banyak sekali ) | Data diambil dari kolom `jawaban` pada tabel `nilaihasil` yang sudah disimpan sebelumnya dengan bentuk `json`|
Autosave berkala | Akan ada `request` berkala setiap beberapa detik untuk mengirim jawaban siswa | Fitur dihapus karena tidak berguna, fitur hanya berguna untuk yang 2 tipe soal |
Menampilkan nilai hasil | Pada program sebelumnya pada halaman admin nilai hasil, nilainya dihitung lagi dari jawaban siswa (diloop) benar salahnya dikalkulasi saat menampilkan data hasil | Hanya menampilkan data yang sudah ada pada tabel `nilaihasil` karena sudah ada data `nilai`, `benar`, `salah` dkk ( mengurangi proses kalkulasi )

## Penyempurnaan Lanjutan
- Ada sebuah alert peringatan jika fitur `autosubmit` diaktifkan, ada 3 kesepatan untuk siswa jika pindah ketab lain berupa alert. Jadi lebih informatif tidak langsung jawaban terkirim
- Menambah fitur validasi saat import soal, kodemapel, jenis dan kodesoal harus sama dengan yang ada pada data `tabel` ujian, karena akan menjadi error jika relasinya tidak sama

## Fixing Bug
### November
- Preiview soal untuk benar salah belum benar
- Siswa tidak bisa `copy` dan `inspect` saat mengerjakan soal


## Thank to All Contribute this Code
- *Syafii* (2019)
- *Hisyam* (2020)
- *Muchtarom* (2021)
- *Novi* (2022)
- *Imam* (2024)
- *Feri* (2021)
