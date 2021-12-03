@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if ( Session::get('success'))
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>Success!</strong> {{Session::get('success')}}

                            </div>
                        </div>
                    </div>
                    @endif
                    <a href="{{ route('home.create') }}" class="btn btn-success mb-2 "> Add User</a>
                    <table class="table " id="myTable">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Username</th>
                                <th scope="col">Email</th>
                                <th scope="col">Alamat</th>
                                <th scope="col">Pekerjaan</th>
                                <th scope="col">Pendidikan Terakhir</th>
                                <th scope="col">Nomor Telpon</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $i => $user)
                            <tr>
                                <th scope="row">{{ $i+1 }}</th>
                                <td>{{ $user->username }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->profile->alamat_ktp }}</td>
                                <td>{{ $user->profile->pekerjaan }}</td>
                                <td>{{ $user->profile->pendidikan_terakhir }}</td>
                                <td>{{ $user->profile->nomor_telpon }}</td>
                                <td class="d-flex justify-content-between">
                                    <a href="/home/edit/{{ $user->id }}" class="btn btn-primary"> Edit</a>
                                    <form action="/home/delete/{{ $user->id }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="button" id="" class="btn btn-danger myButton">Delete</button>
                                    </form>
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
@endsection
@push('js')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script>
    $(function(){
        $('#myTable').DataTable();
        const swalWithBootstrapButtons = Swal.mixin({
                    customClass: {
                        confirmButton: 'btn btn-success',
                        cancelButton: 'btn btn-danger mr-2'
                    },
                        buttonsStyling: false
                    });
        $('.myButton').on('click',function(e){
            e.preventDefault();
            swalWithBootstrapButtons.fire({
                title: 'Are you sure?',
                text: "You you will delete this data!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    $(this).parent().submit();
                }
            })
        })
    });
</script>
@endpush