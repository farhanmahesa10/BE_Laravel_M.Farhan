@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit user') }}</div>

                <div class="card-body">
                    <form method="post" action="{{ url('/home/update/'.$user->id) }}">
                        @csrf
                        @method('put')
                        <h3 class="">Account</h3>
                        <div class="form-group mb-2">
                            <label for="">Email address</label>
                            <input type="email" name="email" value="{{ $user->email }}" class="form-control" id=""
                                aria-describedby="emailHelp" placeholder="Enter email">
                            @error('email')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group mb-2">
                            <label for="">Username</label>
                            <input type="text" name="username" value="{{ $user->username }}" class="form-control" id=""
                                placeholder="Enter username">
                            @error('username')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <h3 class="mt-4">Profile</h3>
                        <div class="form-group mb-2">
                            <label for="">Nama Lengkap</label>
                            <input value="{{ $user->profile->nama_lengkap }}" type="text" name="nama_lengkap"
                                class="form-control" id="" placeholder="Nama Lengkap">
                            @error('nama_lengkap')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group mb-2">
                            <label for="">Pekerjaan</label>
                            <input value="{{ $user->profile->pekerjaan }}" type="text" class="form-control"
                                name="pekerjaan" id="" placeholder="Pekerjaan">
                            @error('pekerjaan')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group mb-2">
                            <label for="">Pendidikan terakhir</label>
                            <input value="{{ $user->profile->pendidikan_terakhir }}" type="text"
                                name="pendidikan_terakhir" class="form-control" id="" placeholder="Pendidikan terakhir">
                            @error('pendidikan_terakhir')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group mb-2">
                            <label for="">No Telp</label>
                            <input value="{{ $user->profile->nomor_telpon }}" type="text" name="no_telpon"
                                class="form-control" id="" placeholder="No Telp">
                            @error('no_telpon')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group mb-2">
                            <label for="">Alamat</label>
                            <textarea name="alamat" class="form-control" id="" cols="30"
                                rows="10">{{ $user->profile->alamat_ktp }}</textarea>
                            @error('alamat')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <button type="submit" class="btn mt-2 btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection