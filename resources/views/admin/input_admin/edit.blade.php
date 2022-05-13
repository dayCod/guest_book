@extends('layouts.main')
@section('content')
@section('title','Edit User')


<div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
            <a href="{{ route('user_new.index') }}" class="btn btn-sm btn-warning"><i class="fa fa-arrow-left"></i> Kembali</a></br>
            <br>
            <form action="{{ route('user_new.update',$edit) }}" method="POST">@csrf @method('patch')
              <div class="form-group">
              	<label class="control-label">Nama</label>
              	<input type="text" class="form-control" value="{{ $edit->nama }}" name="nama">
              </div>

              <div class="form-group">
              	<label class="control-label">Instansi Asal</label>
              	<input type="text" class="form-control" value="{{ $edit->instansi_asal }}" name="instansi_asal">
              </div>

              <div class="form-group">
                <label class="control-label">Menemui</label>
                <select class="js-example-basic-single form-control" name="menemui">
                @foreach ($pegawai as $peg)
                  @if($edit->menemui == $peg->id)
                  <option value="{{ $peg->id }}" selected>{{ $peg->nama_p }}</option>
                  @else
                  <option value="{{ $peg->id }}">{{ $peg->nama_p }}</option>
                  @endif
                @endforeach
                </select>
              </div>
        
              <div class="form-group">
              	<label>Keperluan</label>
              	<textarea class="form-control" name="keperluan">{{ $edit->keperluan }}</textarea>
              </div>

              <div class="form-group"> 
                <label>Waktu</label>
                <input type="time" class="form-control" value="{{ $edit->waktu }}" name="waktu">
              </div>

              <button type="submit" class="btn btn-info"><i class="fa fa-save"></i> Simpan</button>
            </div>
            </form>
          </div>
        </div>
      </div>

@endsection