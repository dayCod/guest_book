@extends('layouts.main')
@section('content')
@section('title','Edit User')

<div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
            <a href="{{ route('pegawai_new.index') }}" class="btn btn-sm btn-warning"><i class="fa fa-arrow-left"></i> Kembali</a></br>
            <br>
            <form action="{{ route('pegawai_new.update',$edit) }}" method="POST">@csrf @method('patch')
              <div class="form-group">
              	<label>NIP</label>
              	<input type="text" class="form-control" value="{{ $edit->nip }}" name="nip">
              </div>

              <div class="form-group">
              	<label>Nama</label>
              	<input type="text" class="form-control" value="{{ $edit->nama_p }}" name="nama_p">
              </div>

              <div class="form-group">
              	<label>Divisi</label>
              	<input type="text" class="form-control" value="{{ $edit->divisi }}" name="divisi">
              </div>

              <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" name="email" value="{{ $edit->email }}">
              </div>


              <button type="submit" class="btn btn-info"><i class="fa fa-save"></i> Simpan</button>
            </div>
            </form>
          </div>
        </div>
      </div>

@endsection