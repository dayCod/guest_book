@extends('layouts_user.main')
@section('isi')
@section('judul','Dashboard User')

 <!-- Button trigger modal -->
<br>
{!! $chart->container() !!}
 

@endsection
<script src="https://unpkg.com/vue"></script>
        <script>
            var app = new Vue({
                el: '#app',
            });
        </script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/highcharts/6.0.6/highcharts.js" charset="utf-8"></script>        
{!! $chart->script() !!}



 


