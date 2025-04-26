@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4>Daftar sampah</h4>
                        
                    </div>

                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Peserta</th>
                                        <th>No Meja</th>
                                        <th>Jumlah Orang</th>
                                        <th>Tanggal Reservasi</th>
                                        <th>Waktu Reservasi</th>
                                        <th>Catatan Khusus</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($reservasi as $index => $reservasis)
                                        <tr>
                                            <td>{{ $reservasi->firstItem() + $index }}</td>
                                            <td>{{ $reservasis->nama_pelanggan }}</td>
                                            <td>{{ $reservasis->nomor_meja }}</td>
                                            <td>{{ $reservasis->jumlah_orang }}</td>
                                            <td>{{ $reservasis->tanggal_reservasi }}</td>
                                            <td>{{ $reservasis->waktu_reservasi }}</td>
                                            <td>{{ $reservasis->catatan_khusus }}</td>
                                            <td>{{ $reservasis->status }}</td>
                                            <td>
                                                <div class="d-flex">
                                                    <form action="{{ route('reservasi.restore', $reservasis->id) }}" method="POST" style="display:inline;">
                                                        @csrf
                                                        <button type="submit" class="btn btn-success btn-sm">Pulihkan</button>
                                                    </form>
                                                    <form action="{{ route('reservasi.forceDelete', $reservasis->id) }}" method="POST"
                                                        onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger">Hapus permanen</button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="10 " class="text-center">Tidak ada data Reservasi</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <a href="{{ route('reservasi.index') }}" class="btn btn-warning">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="pagination-container d-flex justify-content-center mt-4">
        {{ $reservasi->links('pagination::bootstrap-5') }}
    </div>
@endsection