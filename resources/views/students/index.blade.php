@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Daftar Siswa
                        <a href="{{ route('students.create') }}" class="btn btn-primary float-right">Tambah Data</a>
                    </div>
                    <div class="card-body">
                        <table class="table" id="students-table">
                            <thead>
                                <tr>
                                    <th>Nama Siswa</th>
                                    <th>Kelas</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($students as $student)
                                    <tr>
                                        <td>{{ $student->name }}</td>
                                        <td>{{ $student->class }}</td>
                                        <td>{{ $student->status == 1 ? 'Aktif' : 'Non-Aktif' }}</td>
                                        <td>
                                            <a href="{{ route('students.show', $student->id) }}" class="btn btn-info btn-sm">Lihat</a>
                                            <a href="{{ route('students.edit', $student->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                            <a href="{{ route('students.delete', $student->id) }}" class="btn btn-danger btn-sm">Hapus</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Include DataTables CSS and JS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>

    <!-- Include your custom script for DataTables initialization -->
    <script>
        $(document).ready(function() {
            $('#students-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('students.index') }}",
                columns: [
                    { data: 'name', name: 'name' },
                    { data: 'class', name: 'class' },
                    { data: 'status', name: 'status' },
                    { data: 'action', name: 'action' },
                ]
            });
        });
    </script>
@endsection
