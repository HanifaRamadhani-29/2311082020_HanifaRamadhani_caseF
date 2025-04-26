@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4>Tambah Data Reservasi Meja Restoran</h4>
                        <a href="{{ route('reservasi.index') }}" class="btn btn-success">Kembali</a>
                    </div>

                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('reservasi.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="nama_pelanggan" class="form-label">Nama Pelanggan <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('nama_pelanggan') is-invalid @enderror"
                                    id="nama_pelanggan" name="nama_pelanggan" value="{{ old('nama_pelanggan') }}" required>
                                @error('nama_pelanggan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="nomor_meja" class="form-label">Nomor Meja <span class="text-danger">*</span></label>
                                <input type="int" class="form-control @error('nomor_meja') is-invalid @enderror" id="nomor_meja"
                                    name="nomor_meja" value="{{ old('nomor_meja') }}" required>
                                @error('nomor_meja')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="jumlah_orang" class="form-label">Jumlah Orang <span class="text-danger">*</span></label>
                                <input type="int" class="form-control @error('jumlah_orang') is-invalid @enderror"
                                    id="jumlah_orang" name="jumlah_orang" value="{{ old('jumlah_orang') }}" required>
                                @error('jumlah_orang')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="tanggal_reservasi" class="form-label">Tanggal Reservasi</label>
                                <input type="date" 
                                       class="form-control @error('tanggal_reservasi') is-invalid @enderror" 
                                       id="tanggal_reservasi" 
                                       name="tanggal_reservasi" 
                                       value="{{ old('tanggal_reservasi') }}">
                                @error('tanggal_reservasi')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            

                            <div class="mb-3">
                                <label for="waktu_reservasi" class="form-label">Waktu Reservasi <span class="text-danger">*</span></label>
                                <input type="time" class="form-control @error('waktu_reservasi') is-invalid @enderror"
                                    id="waktu_reservasi" name="waktu_reservasi" value="{{ old('waktu_reservasi') }}" required>
                                @error('waktu_reservasi')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="catatan_khusus" class="form-label">Catatan Khusus <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('catatan_khusus') is-invalid @enderror"
                                    id="catatan_khusus" name="catatan_khusus" value="{{ old('catatan_khusus') }}" required>
                                @error('catatan_khusus')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="status" class="form-label">Status Reservasi</label>
                                <select class="form-control @error('status') is-invalid @enderror"
                                    id="status" name="status">
                                    <option value="">-- Pilih Status --</option>
                                    <option value="terjadwal" {{ old('status') == 'terjadwal' ? 'selected' : '' }}>Terjadwal</option>
                                    <option value="hadir" {{ old('status') == 'hadir' ? 'selected' : '' }}>Hadir</option>
                                    <option value="dibatalkan" {{ old('status') == 'dibatalkan' ? 'selected' : '' }}>Dibatalkan</option>
                                </select>
                                @error('status')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection