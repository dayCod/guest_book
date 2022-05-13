@extends('layouts.main')
@section('content')
@section('title','Input User')

<div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
            <a href="{{ route('user_new.index') }}" class="btn btn-sm btn-warning"><i class="fa fa-arrow-left"></i> Kembali</a></br>
            <br>
            <form action="{{ route('user_new.store') }}" method="POST">@csrf
              <div class="form-group">
              	<label>Nama</label>
              	<input type="text" class="form-control" name="nama">
              </div>

              <div class="form-group">
              	<label>Instansi Asal</label>
              	<input type="text" class="form-control" name="instansi_asal">
              </div>

              <div class="form-group">
                <label class="label-control">Menemui</label>
                <select class="js-example-basic-single form-control" name="menemui">
                @foreach($buat as $bt)
                <option value="{{ $bt->id }}">{{$bt->nama}}</option>
                @endforeach
                </select>
              </div>
  
              <div class="form-group">
              	<label>Keperluan</label>
              	<textarea class="form-control" name="keperluan"></textarea>
              </div>

              <div class="form-group">
                <label>Waktu</label>
                <input type="time" class="form-control" name="waktu">
              </div>

              <button type="submit" class="btn btn-info"><i class="fa fa-save"></i> Simpan</button>
            </div>
            </form>
          </div>
        </div>
      </div>

@endsection