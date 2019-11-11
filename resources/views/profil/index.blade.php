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
                <div class="show-image">
                    <img src="{{ asset('/storage/foto/default.jpg') }}" alt="" width="294px">
                    <form action="/profil/tam" method="POST" class="d-inline" enctype="multipart/form-data">
                        @csrf
                        <input type="file" name="foto" class="infile form-control-file @error('foto') is-invalid @enderror">
                        @error('foto')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <button type="submit" name="tambah" class="tambah btn btn-success">Tambah</button>
                    </form>
                </div>
            @else
                <div class="show-image">
                    <img src="{{ asset('/storage').'/'.Auth::user()->foto }}" alt="" width="294px">
                    <form action="/profil/ubah" method="POST" enctype="multipart/form-data">
                        @method('put')
                        @csrf
                        <input type="file" name="foto" class="infile form-control-file @error('foto') is-invalid @enderror">
                        @error('foto')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <button type="submit" name="ubah" class="update btn btn-primary">Ubah</button>
                    </form>
                    <form id="form-delete" action="/profil/del" method="POST" class="d-inline">
                        @method('delete')
                        @csrf
                        <button type="submit" name="hapus" class="delete btn btn-danger">Hapus</button>
                    </form>
                </div>
                @endif
                <h5 class="card-title">{{ Auth::user()->name }}</h5>
                <h6 class="card-subtitle mb-2 text-muted">{{ Auth::user()->nip }}</h6>
                <p class="card-text">{{ Auth::user()->email }}</p>
                <a href="profil/edit" class="btn btn-primary">Edit</a>
            </div>
        </div>
    </div>
    <!-- <script>
      function phapus() {
        swal({
          title: 'Hapus data ?',
          text: "Klik Hapus untuk menghapus data !",
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Hapus'
        }).then((result) => {
          if (result.value) {
            $('#form-delete').submit();
          }
        })
      }
    </script> -->
@endsection
