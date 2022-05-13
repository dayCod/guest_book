@extends('layouts_user.main')
@section('isi')
@section('judul','Table Worker')

<div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
              <table class="table table-hover table-bordered" id="sampleTable">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Instansi Asal</th>
                    <th>Keperluan</th>
                    <th>Waktu Pertemuan</th>
                  </tr>
                </thead>
                <tbody>
                @foreach($getData as $get)
                  <tr> 
                    <td>{{ $loop->index+1 }}</td>
                    <td>{{ $get->nama }}</td>
                    <td>{{ $get->instansi_asal }}</td>
                    <td>{{ $get->keperluan }}</td>
                    <td>{{ $get->waktu }}</td>
                  </tr>
                @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>

@endsection