@extends('layouts.main')
@section('title','home')
@section('content')
    <div class="container-fluid">
        <div class="card mt-3" style="width: 21rem;">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <div class="card-body">
            @if(Auth::user()->foto == null)
                <img src="{{ asset('/storage/foto/default.jpg') }}" alt="" width="294px">
                <div class="overlay">
                    <div class="text">
                        <form action="/profil/ubah" method="POST" class="d-inline">
                            @csrf
                            <input type="file" class="form-control-file">
                            <button type="submit" name="tambah" class="btn btn-success">Tambah</button>
                        </form>
                        {{-- <a href="" class="btn btn-primary d-inline">Ubah</a> --}}
                        {{-- <a href="/profil/del" class="btn btn-danger d-inline">Hapus</a> --}}
                    </div>
                </div>
            @else
                <div class="foto">
                    <img src="{{ asset('/storage').'/'.Auth::user()->foto }}" alt="">
                    <div class="overlay">
                        <div class="text">
                            <form action="/profil/ubah" method="POST" class="d-inline">
                                @method('put')
                                @csrf
                                <button type="submit" name="ubah" class="btn btn-primary">Ubah</button>
                            </form>
                            <form action="/profil/del" method="POST" class="d-inline">
                                @method('delete')
                                @csrf
                                <button type="submit" name="hapus" class="btn btn-danger">Hapus</button>
                            </form>
                            {{-- <a href="" class="btn btn-primary d-inline">Ubah</a> --}}
                            {{-- <a href="/profil/del" class="btn btn-danger d-inline">Hapus</a> --}}
                        </div>
                    </div>
                </div>
                    
                @endif
                <h5 class="card-title">{{ Auth::user()->name }}</h5>
                <h6 class="card-subtitle mb-2 text-muted">{{ Auth::user()->nip }}</h6>
                <p class="card-text">{{ Auth::user()->email }}</p>
                <a href="profil/edit" class="btn btn-primary">Edit</a>
            </div>
        </div>
    </div>
@endsection