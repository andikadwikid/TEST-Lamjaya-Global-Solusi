@extends('layouts.master')
@section('content')
<div class="container mt-5">
    <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#Add">
        Tambah
    </button>
    @if ($errors->any())
    <div class="alert alert-danger mt-3">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Kode</th>
                <th>Nama Provinsi</th>
                <th>Active</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($provinsis as $provinsi)
            <tr>
                <td>{{ $provinsi->kode }}</td>
                <td>{{ $provinsi->nama }}</td>
                <td>
                    <input class="form-check-input" type="checkbox" id="checkboxNoLabel" value="" {{ $provinsi->active ?
                    "checked" :""
                    }} disabled>
                </td>
                <td>
                    <div class="d-inline-flex gap-2">
                        <button type="button" class="btn btn-primary edit-data" data-id="{{ $provinsi->id }}"
                            data-bs-toggle="modal" data-bs-target="#Update">
                            Edit
                        </button>
                        <form action="{{ route('provinsi-destroy', $provinsi->id) }}" method="POST">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $provinsis->links() }}

    <!-- Button trigger modal -->


    <!-- Modal -->
    <div class="modal fade" id="Update" tabindex="-1" aria-labelledby="UpdateLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="UpdateLabel">Edit Provinsi</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="id" id="id_provinsi">
                        <div class="mb-3">
                            <label for="kode" class="form-label">Kode</label>
                            <input type="text" class="form-control" id="kode_edit" name="kode"
                                aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="provinsi" class="form-label">Nama Provinsi</label>
                            <input type="text" class="form-control" id="provinsi_edit" name="nama">
                        </div>
                        <div class="mb-3 form-check">
                            <input class="form-check-input" type="checkbox" id="active_edit" name="active">
                            <label class="form-check-label" for="exampleCheck1">Active</label>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="Add" tabindex="-1" aria-labelledby="AddLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="AddLabel">Tambah Provinsi</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('provinsi-store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="kode" class="form-label">Kode</label>
                            <input type="text" class="form-control" id="kode" name="kode" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="provinsi" class="form-label">Nama Provinsi</label>
                            <input type="text" class="form-control" id="provinsi" name="nama">
                        </div>
                        <div class="mb-3 form-check">
                            <input class="form-check-input" type="checkbox" id="active" name="active">
                            <label class="form-check-label" for="exampleCheck1">Active</label>
                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

</div>

<script>
    $('.edit-data').on('click', async (e) => {
        e.preventdefault()
        idEdit = $('.edit-data').attr('data-id')
        console.log(idEdit)
        // $.ajax({
        //     type: "GET",
        //     dataType: "json",
        //     data:{name: name},
        //     url:"provinsi-getdata/" + idEdit,
        //     success:function(data)
        //     {
        //         alert('Get Success');
        //         console.log(data);
        //     }
        // })

let response = await fetch('/provinsi/'+ idEdit)
let data = await response.json()
console.log(data)
$('#kode_edit').val(data.kode)
$('#provinsi_edit').val(data.nama)
if(data.active == 1){
    $('#active_edit').attr('checked', true)
}
    })
</script>
@endsection