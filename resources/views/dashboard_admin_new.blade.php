@extends('layouts.main')
@section('content')
@section('title','Dashboard Admin') 
   <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Detail Grafik
</button>
<br>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detail Grafik</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table class="table">
            <thead>
                <tr>
                    <th>Nama</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    @foreach($list as $li)
                    <td>=>> {{ $li->nama_p }}</td>
                </tr>
                    @endforeach
            </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss = "modal"><i class="fa fa-sign-out fa-md"> Exit</i></button>
      </div>
    </div>
  </div>
</div><br>
       {!! $chart->container() !!}
    <br>
    <h3 style="font-family: 'Roboto Slab', serif;
">|| 5 Pegawai Yang Sering Dikunjungi ||</h3><br>
<ul class="list-group">
  @foreach($valpegawai as $val)
  <li class="list-group-item">{{ $val->nama_p }}</li>
</ul>
  @endforeach
@endsection

@section('chart')
{{-- ChartScript --}}
    @if($chart)
    {!! $chart->script() !!}
    @endif
@stop

@section('link')
<script src="https://cdnjs.cloudflare.com/ajax/libs/highcharts/6.0.6/highcharts.js" charset="utf-8"></script>
</script>
<script>
    $('.owl-carousel').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:5
        }
    }
})
</script>

@endsection