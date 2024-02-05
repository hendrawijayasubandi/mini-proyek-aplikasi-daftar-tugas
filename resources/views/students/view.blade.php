@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Detail Siswa
                        <a href="{{ route('students.index') }}" class="btn btn-secondary float-right">Kembali</a>
                    </div>
                    <div class="card-body">
                        <p><strong>Nama Siswa:</strong> {{ $student->name }}</p>
                        <p><strong>Kelas:</strong> {{ $student->class }}</p>
                        <p><strong>Status:</strong> {{ $student->status == 1 ? 'Aktif' : 'Non-Aktif' }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
