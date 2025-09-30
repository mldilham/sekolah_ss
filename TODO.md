# TODO: Enkripsi ID untuk Edit Siswa

## Tujuan
Mengenkripsi ID siswa dalam URL untuk meningkatkan keamanan, sehingga ID tidak terlihat langsung.

## Perubahan yang Dilakukan

### 1. AdminController.php
- [x] Tambahkan `use Illuminate\Support\Facades\Crypt;`
- [x] Update `editSiswa()`: Tambahkan `$id = Crypt::decrypt($id);`
- [x] Update `updateSiswa()`: Tambahkan `$id = Crypt::decrypt($id);`
- [x] Update `destroySiswa()`: Tambahkan `$id = Crypt::decrypt($id);`

### 2. OperatorController.php
- [x] Tambahkan `use Illuminate\Support\Facades\Crypt;`
- [x] Update `editSiswa()`: Tambahkan `$id = Crypt::decrypt($id);`
- [x] Update `updateSiswa()`: Tambahkan `$id = Crypt::decrypt($id);`
- [x] Update `destroySiswa()`: Tambahkan `$id = Crypt::decrypt($id);`

### 3. resources/views/admin/siswa/index.blade.php
- [x] Update link edit: `Crypt::encrypt($item->id_siswa)`
- [x] Update form destroy: `Crypt::encrypt($item->id_siswa)`

### 4. resources/views/admin/siswa/edit.blade.php
- [x] Update form action: `Crypt::encrypt($siswa->id_siswa)`

### 5. resources/views/operator/siswa/index.blade.php
- [x] Update link edit: `Crypt::encrypt($item->id_siswa)`
- [x] Update form destroy: `Crypt::encrypt($item->id_siswa)`

### 6. resources/views/operator/siswa/edit.blade.php
- [x] Update form action: `Crypt::encrypt($siswa->id_siswa)`

## Pengujian
- [ ] Akses halaman admin/siswa dan klik edit untuk memastikan URL terenkripsi
- [ ] Lakukan update data siswa untuk memastikan fungsi tetap berjalan
- [ ] Lakukan delete siswa untuk memastikan fungsi tetap berjalan
- [ ] Ulangi untuk operator jika diperlukan

## Catatan
- URL sekarang akan terlihat seperti `/admin/siswa/edit/eyJpdiI6...` (terenkripsi)
- ID didekripsi di controller sebelum digunakan untuk query database
- Menggunakan Laravel Crypt facade untuk enkripsi/dekripsi
