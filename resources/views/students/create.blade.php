@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Tambah Siswa Baru</div>
                    <div class="card-body">
                        <form id="create-student-form">
                            @csrf
                            <div class="form-group">
                                <label for="name">Nama Siswa</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="class">Kelas</label>
                                <select class="form-control" id="class" name="class" required>
                                    <option value="9">Kelas 9</option>
                                    <option value="10">Kelas 10</option>
                                    <option value="11">Kelas 11</option>
                                    <option value="12">Kelas 12</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select class="form-control" id="status" name="status" required>
                                    <option value="1">Aktif</option>
                                    <option value="0">Non-Aktif</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Tambah</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Include jQuery for Ajax -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Include your custom script for handling Ajax submission -->
    <script>
        $(document).ready(function() {
            // Form submission using Ajax
            $('#create-student-form').submit(function(e) {
                e.preventDefault();
                $.ajax({
                    type: 'POST',
                    url: "{{ route('students.store') }}",
                    data: $(this).serialize(),
                    success: function(response) {
                        alert(response.message);
                        // Clear form fields
                        $('#create-student-form')[0].reset();
                        // Reload DataTable after adding a new student
                        $('#students-table').DataTable().ajax.reload();
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            });
        });
    </script>
@endsection
