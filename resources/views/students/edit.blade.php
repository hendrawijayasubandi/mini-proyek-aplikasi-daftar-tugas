@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Edit Siswa
                        <a href="{{ route('students.index') }}" class="btn btn-secondary float-right">Kembali</a>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('students.update', $student->id) }}">
                            @csrf
                            @method('put')
                            <div class="form-group">
                                <label for="name">Nama Siswa</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ $student->name }}" required>
                            </div>
                            <div class="form-group">
                                <label for="class">Kelas</label>
                                <select class="form-control" id="class" name="class" required>
                                    <option value="9" {{ $student->class == '9' ? 'selected' : '' }}>Kelas 9</option>
                                    <option value="10" {{ $student->class == '10' ? 'selected' : '' }}>Kelas 10</option>
                                    <option value="11" {{ $student->class == '11' ? 'selected' : '' }}>Kelas 11</option>
                                    <option value="12" {{ $student->class == '12' ? 'selected' : '' }}>Kelas 12</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="status">Status</label>
                                {{-- <select class="form-control" id="status" name="status" required>
                                    <option value="1" {{ $student->status == 1 ? 'selected' : '' }}>Aktif</option>
                                    <option value="0" {{ $student->status == 0 ? 'selected' : '' }}>Non-Aktif</option>
                                </select> --}}
                                <input type="checkbox" name="status" id="statusToggle" data-bootstrap-switch data-on-text="Aktif" data-off-text="Non-Aktif" {{ $student->status == 1 ? 'checked' : '' }}>
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<script src="https://cdn.jsdelivr.net/npm/bootstrap-switch@3.3.4/dist/js/bootstrap-switch.min.js"></script>
<script>
    $(document).ready(function () {
        $('#statusToggle').bootstrapSwitch();
    });
</script>
