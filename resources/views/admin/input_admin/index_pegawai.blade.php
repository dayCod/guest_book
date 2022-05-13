@extends('layouts.main')
@section('content')
@section('title','Daftar User')

<div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
            <a href="{{ route('pegawai_new.create') }}" class="btn btn-sm btn-warning"><i class="fa fa-plus-circle"></i> Input Data</a></br>
            <br>
              <table class="table table-hover table-bordered" id="sampleTable">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>NIP</th>
                    <th>Nama</th>
                    <th>Divisi</th>
                    <th>Email</th>
                    <th>Action</th>
                  </tr>
                </thead>
              <tbody>
                @foreach($pegawai as $pg)
                  <tr>
                    <td>{{ $loop->index+1 }}</td>
                    <td>{{ $pg->nip }}</td>
                    <td>{{ $pg->nama_p }}</td>
                    <td>{{ $pg->divisi }}</td>
                    <td>{{ $pg->email }}</td>
                    <td>
                      <center>
                        <div class="btn-group">
                          <a href="{{ route('pegawai_new.edit',$pg) }}" class="btn btn-sm btn-info"><i class="fa fa-edit"></i></a>
                          <a href="{{ route('pegawai_new.destroy',$pg) }}" class="btn btn-sm btn-danger delete-btn"><i class="fa fa-trash"></i></a>
                        </div>
                      </center>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table><hr>
          <p>Total Pegawai :  {{  ($jumlah) }}</p>
          <p>Today Visitor :  {{  ($today) }}</p>
            </div>
          </div>
        </div>
      </div>

@endsection