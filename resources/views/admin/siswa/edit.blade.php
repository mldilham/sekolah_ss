@extends('admin.layouts.app')
@section('content')
<body>
    <div class="container">
        <div class="row">
            <div class="rol-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('admin.siswa.update', $siswa->id) }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col">
                                    <label for="">Nisn</label>
                                    <input type="text" name="nisn" id="nisn" value="{{ old('nisn', $siswa->nisn) }}" class="form-control" required>
                                </div>
                                <div class="col">
                                    <label for="">Nama Siswa</label>
                                    <input type="text" name="nama_siswa" id="nama_siswa" value="{{ old('nama_siswa', $siswa->nama_siswa) }}" class="form-control" required>
                                </div>
                                <div class="col">
                                    <label for="">Jenis Kelamin</label>
                                    <select name="jenis_kelamin" id="jenis_kelamin" class="form-control" required>
                                        <option value="">-- Pilih --</option>
                                        <option value="Laki-laki" {{ old('jenis_kelamin', $siswa->jenis_kelamin) == 'Laki-laki' ? 'selected' : '' }}>Laki-Laki</option>
                                        <option value="Perempuan" {{ old('jenis_kelamin', $siswa->jenis_kelamin) == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                    </select>
                                </div>
                                <div class="col">
                                    <label for="">Tahun Masuk</label>
                                    <input type="number" name="tahun_masuk" id="tahun_masuk" value="{{ old('tahun_masuk', $siswa->tahun_masuk) }}" class="form-control" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="rol-12">
                                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                    <a href="{{ route('admin.siswa') }}" class="btn btn-danger">Kembali</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
@endsection
