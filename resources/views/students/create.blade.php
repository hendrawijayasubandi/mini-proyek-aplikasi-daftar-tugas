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
                                <input type="hidden" name="status" value="0">
                                <!-- Hidden input for non-checked status -->
                                <input type="checkbox" name="status" id="statusToggle"
                                    {{ old('status') == 1 ? 'checked' : '' }}>
                            </div>
                            <button type="submit" class="btn btn-primary">Tambah</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#statusToggle').on('change', function() {
                if ($(this).prop('checked')) {
                    $(this).val('1'); // Aktif
                } else {
                    $(this).val('0'); // Non-Aktif
                }
            });

            $('#create-student-form').submit(function(e) {
                e.preventDefault();
                $.ajax({
                    type: 'POST',
                    url: "http://localhost:8000/students",
                    data: $(this).serialize(),
                    success: function(response) {
                        alert(response.message);
                        $('#create-student-form')[0].reset();
                        $('#students-table').DataTable().ajax.reload();

                        window.location.href = response.redirect;
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            });
        });
    </script>
@endsection
