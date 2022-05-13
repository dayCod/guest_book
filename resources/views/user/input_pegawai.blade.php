<!DOCTYPE html>
<html>

<head>
    <title>Guest Book</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/main.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap-select.sccs') }}">
    <!-- Font-icon css-->
    <link href="{{ asset('iziToast-master/dist/css/iziToast.css') }}" rel="stylesheet">
    <script src="{{ asset('iziToast-master/dist/js/iziToast.js') }}"></script>
    <link rel="stylesheet" type="text/css"
        href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('sweetalert/sweetalert.css') }}" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet" />
    <!-- Script JS -->

</head>

<body>
    <section class="material-half-bg">
        <div class="cover"></div>
    </section>
    <section class="login-content">
        <br>
        <br>
        <div class="logo">
            <h1>Guest Book</h1>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tile" style="width: 550px; height: 750px;">
                    <h3 class="tile-title" align="center"
                        style="font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif'">
                        Input - Data</h3>
                    <div class="tile-body width-12">
                        <form action="{{ route('input_action') }}" method="POST">@csrf
                            <div class="form-group">
                                <label class="control-label">Nama</label>
                                <input class="form-control" type="text" name="nama" placeholder="Enter full name...">
                            </div>
                            <div class="form-group">
                                <label class="control-label">Instansi Asal</label>
                                <input class="form-control" type="text" placeholder="Enter Your Company..."
                                    name="instansi_asal">
                            </div>
                            <div class="form-group">
                                <label class="control-label">Tipe Pegawai</label>
                                <select name="tipe" id="tipe" class="form-control">
                                  <option value="pilih">Pilih Tipe</option>
                                    <option value="terdaftar">Pegawai Terdaftar</option>
                                    <option value="tidak_terdaftar">Pegawai Tidak Terdaftar</option>
                                </select>
                            </div>
                            <div class="form-group" style="display: none;" id="n_pegawai">
                                <label class="control-label">Nama Pegawai</label>
                                <input type="text" class="form-control" name="nama_p"><br>
                            <button class="btn btn-primary">
                            <a href="{{ $add }}">add</a>
                            </button>
                            </div>
        
                            <div class="form-group" style="display: none;" id="nama_pegawai">
                                <label class="control-label">Nama Pegawai</label>
                                <select name="menemui" class="form-control">
                                    @foreach($data as $dt)
                                    <option value="{{ $dt->id }}">{{ $dt->nama_p }}</option>
                                    @endforeach
                                </select>
                            </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Keperluan</label>
                        <textarea class="form-control" rows="4" placeholder="What's Your Purpose..."
                            name="keperluan"></textarea>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Waktu</label>
                        <input class="form-control" type="time" name="waktu">
                    </div>
                    <div class="form-group">
                      <button class="btn btn-primary" type="submit"><i
                            class="fa fa-fw fa-lg fa-plus-circle"></i>Input</button>&nbsp;&nbsp;&nbsp;
                    <a class="btn btn-danger"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                    </div>
                </div>
                </form>                

            </div>
        </div>
    </section>
    <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ asset('js/bootstrap-select.js') }}"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="{{ asset('js/plugins/pace.min.js') }}"></script>
    <!-- Page specific javascripts-->
    <script type="text/javascript" src="{{ asset('js/plugins/chart.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/plugins/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/plugins/dataTables.bootstrap.min.js') }}"></script>

    <script src="{{ asset('js/sweetalert.min.js') }}"></script>
    <script src="{{ asset('js/modules-sweetalert.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>

    <script type="text/javascript">$('#sampleTable').DataTable();</script>
    @include('alert.main')
    <script type="text/javascript">
        $('#tipe').change(function(){
            if (document.getElementById('tipe').value == 'terdaftar') {
              $('#nama_pegawai').removeAttr('style');
              $('#n_pegawai').attr('style',  'display:none');
            }else if(document.getElementById('tipe').value == 'tidak_terdaftar'){
               $('#n_pegawai').removeAttr('style');
               $('#nama_pegawai').attr('style',  'display:none');
            }else if(document.getElementById('tipe').value == 'pilih'){
              $('#n_pegawai').attr('style',  'display:none');
               $('#nama_pegawai').attr('style',  'display:none');
            }
        });
        var data = {
            labels: ["January", "February", "March", "April", "May"],
            datasets: [
                {
                    label: "My First dataset",
                    fillColor: "rgba(220,220,220,0.2)",
                    strokeColor: "rgba(220,220,220,1)",
                    pointColor: "rgba(220,220,220,1)",
                    pointStrokeColor: "#fff",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "rgba(220,220,220,1)",
                    data: [65, 59, 80, 81, 56]
                },
                {
                    label: "My Second dataset",
                    fillColor: "rgba(151,187,205,0.2)",
                    strokeColor: "rgba(151,187,205,1)",
                    pointColor: "rgba(151,187,205,1)",
                    pointStrokeColor: "#fff",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "rgba(151,187,205,1)",
                    data: [28, 48, 40, 19, 86]
                }
            ]
        };
        var pdata = [
            {
                value: 300,
                color: "#46BFBD",
                highlight: "#5AD3D1",
                label: "Complete"
            },
            {
                value: 50,
                color: "#F7464A",
                highlight: "#FF5A5E",
                label: "In-Progress"
            }
        ]

        var ctxl = $("#lineChartDemo").get(0).getContext("2d");
        var lineChart = new Chart(ctxl).Line(data);

        var ctxp = $("#pieChartDemo").get(0).getContext("2d");
        var pieChart = new Chart(ctxp).Pie(pdata);
    </script>
    <!-- buat js show and hide -->

    <!-- Google analytics script-->
    <script type="text/javascript">
        if (document.location.hostname == 'pratikborsadiya.in') {
            (function (i, s, o, g, r, a, m) {
            i['GoogleAnalyticsObject'] = r; i[r] = i[r] || function () {
                (i[r].q = i[r].q || []).push(arguments)
            }, i[r].l = 1 * new Date(); a = s.createElement(o),
                m = s.getElementsByTagName(o)[0]; a.async = 1; a.src = g; m.parentNode.insertBefore(a, m)
            })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');
            ga('create', 'UA-72504830-1', 'auto');
            ga('send', 'pageview');
        }

        $(document).ready(function () {
            $('.js-example-basic-single').select2();
        });
    </script>
</body>

</html>