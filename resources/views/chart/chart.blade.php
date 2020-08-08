@extends('layouts.main')

@section('tittle')
    Kinerja Pegawai
@endsection

@section('content')
<div class="container mx-auto mt-5">
    <div class="card">
    <div class="card-header">
        <h2 class="text-center">Laporan Kinerja Pegawai</h2>
    </div>
    <div class="card-body">
        <div id="chart"></div>
    </div>
    </div>
    <div class="card mt-3">
    <div class="card-header">
        <h2 class="text-center">Persentase Surat Yang Ditindaklanjuti</h2>
    </div>
    <div class="card-body">
    <div class="row mt-5">
            <div class="col-12 text-center">
            <h3>Total               = {{$Summary}} Surat</h3>
            <h3>Penilaian Kinerja   = {{$persentase}} %</h3>
            </div>
        </div>
    </div>
    </div>
</div>
@endsection

@section('footer')
<script src="https://code.highcharts.com/highcharts.js"></script>
    <script>
        Highcharts.chart('chart', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'Laporan Kinerja Tahun 2020'
        },
        xAxis: {
            categories: {!!json_encode($categories)!!},
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Berkas'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        series: [{
            name: 'Disposisi',
            data: {!!json_encode($laporan)!!}

        }]
    });
    </script>
@endsection