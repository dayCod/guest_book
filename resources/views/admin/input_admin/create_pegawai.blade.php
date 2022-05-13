@extends('layouts.main')
@section('content')
@section('title','Input User')

<div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
            <a href="{{ route('pegawai_new.index') }}" class="btn btn-sm btn-warning"><i class="fa fa-arrow-left"></i> Kembali</a></br>
            <br>
            <form action="{{ route('pegawai_new.store') }}" method="POST">@csrf
              <div class="form-group">
              	<label>NIP</label>
              	<input type="number" class="form-control" name="nip">
              </div>

              <div class="form-group">
              	<label>Nama</label>
              	<input type="text" class="form-control" name="nama">
              </div>

              <div class="form-group">
              	<label>Divisi</label>
              	<input type="text" class="form-control" name="divisi">
              </div>

              <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" name="email">
              </div>
              
              <button type="submit" class="btn btn-info"><i class="fa fa-save"></i> Simpan</button>
            </div>
            </form>
          </div>
        </div>
      </div>

@endsection