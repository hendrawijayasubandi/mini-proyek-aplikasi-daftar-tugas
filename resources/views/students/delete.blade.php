@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Hapus Siswa
                        <a href="{{ route('students.index') }}" class="btn btn-secondary float-right">Kembali</a>
                    </div>
                    <div class="card-body">
                        <p>Anda yakin ingin menghapus siswa "{{ $student->name }}"?</p>
                        <form method="post" action="{{ route('students.destroy', $student->id) }}">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
