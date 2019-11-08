@extends('layouts.main')
@section('title','profil')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-4 my-3">
                <h5 class="my-3">Ubah Profil</h5>
                <form method="post" action="/profil">
                    @method('put')
                    @csrf
                  <div class="form-group">
                    <label for="nip">NIM</label>
                    <input type="hidden">
                    <input type="text" class="form-control @error('nip') is-invalid @enderror" name="nip" id="nip" placeholder="Masukan NIP" value="{{ Auth::user()->nip }}">
                    @error('nip')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" id="nama" placeholder="Masukan Nama" value="{{ Auth::user()->name }}">
                    @error('nama')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="Masukan Email" value="{{ Auth::user()->email }}">
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>
                    <button type="submit" class="btn btn-success" >Update Data</button>
                  </div>
                </form>
            </div>
        </div>
    </div>
@endsection