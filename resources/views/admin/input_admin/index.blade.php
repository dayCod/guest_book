s@extends('layouts.main') 
@section('content')
@section('title','Daftar User')

<div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
            <a href="{{ route('user_new.create') }}" class="btn btn-sm btn-warning"><i class="fa fa-plus-circle"></i> Input Data</a></br>
            <br>
              <table class="table table-hover table-bordered" id="sampleTable">
                <thead>
                  <tr>
                  	<th>No</th>
                    <th>Nama</th>
                    <th>Instansi Asal</th>
                    <th>Menemui</th>
                    <th>Keperluan</th>
                    <th>Waktu Menemui</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                @foreach($data as $val)
                  <tr>
                    <td align="center">{{ $loop->index+1 }}</td>
                    <td>{{ $val->nama }}</td>
                    <td>{{ $val->instansi_asal }}</td>
                    <td>{{ $val->detailpegawai->nama }}</td>
                    <td>{{ $val->keperluan }}</td>
                    <td>{{ $val->waktu }}</td>
                    <td>
                    	<center>
	                    	<div class="btn-group">
	                    		<a href="{{ route('user_new.edit',$val) }}" class="btn btn-sm btn-info"><i class="fa fa-edit"></i></a>
	                    		<a href="{{ route('user_new.destroy',$val) }}" class="btn btn-sm btn-danger delete-btn"><i class="fa fa-trash"></i></a>
	                    	</div>
                    	</center>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table><hr>
              <p>Total Pengunjung :  {{ ($totpeng) }}</p>
            </div>
          </div>
        </div>
      </div>

@endsection