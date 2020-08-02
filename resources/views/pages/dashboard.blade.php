@extends('layouts/main')

@section('title', 'Dashboard')

@section('title_pages', 'Dashboard')

@section('content')
	
	<div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-warning card-header-icon">
              <div class="card-icon">
                <i class="material-icons">library_books</i>
              </div>
              <p class="card-category">Produk</p>
              <h3 class="card-title"> {{ $produk }}
                {{-- <small>GB</small> --}}
              </h3>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-success card-header-icon">
              <div class="card-icon">
                <i class="material-icons">people</i>
              </div>
              <p class="card-category">Pelanggan</p>
              <h3 class="card-title">{{ $pelanggan }}</h3>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-danger card-header-icon">
              <div class="card-icon">
                <i class="material-icons">assignment_ind</i>
              </div>
              <p class="card-category">Supplier</p>
              <h3 class="card-title">{{ $supplier }}</h3>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-info card-header-icon">
              <div class="card-icon">
                <i class="fa fa-user"></i>
              </div>
              <p class="card-category">Karyawan</p>
              <h3 class="card-title">{{ $karyawan }}</h3>
            </div>
          </div>
        </div>
      </div>
      @if (auth()->user()->role == 'admin' | auth()->user()->role == 'pimpinan')
        <div class="row">
          <div class="col-md-6">
            <div class="card card-chart">
              <div class="card-header card-header-success">
                <h4 class="card-title">Grafik Penjualan</h4>
              </div>
              <div class="card-body" id="chart">
                              
              </div>
              <div class="card-footer">
                <div class="stats">
                  <i class="material-icons">access_time</i> 15 hari penjualan terakhir
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="card card-chart">
              <div class="card-header card-header-warning">
                <h4 class="card-title">Grafik Pembelian</h4>
              </div>
              <div class="card-body" id="chartPembelian">

              </div>
              <div class="card-footer">
                <div class="stats">
                  <i class="material-icons">access_time</i> 15 hari pembelian terakhir
                </div>
              </div>
            </div>
          </div>
        </div>
      @endif
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
            text: 'Laporan Penjualan'
        },
        xAxis: {
            categories: {!! json_encode(array_reverse($penj)) !!},
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Penjualan (Rp)'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y:.1f} </b></td></tr>',
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
            name: 'Rp. ',
            data: {!! json_encode(array_reverse($total)) !!}

        }]
    });
  </script>

  <script>
    Highcharts.chart('chartPembelian', {
      chart: {
          type: 'column'
      },
      title: {
          text: 'Laporan Pembelian'
      },
      xAxis: {
          categories: {!! json_encode(array_reverse($pemb)) !!},
          crosshair: true
      },
      yAxis: {
          min: 0,
          title: {
              text: 'Pembelian (Rp)'
          }
      },
      tooltip: {
          headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
          pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
              '<td style="padding:0"><b>{point.y:.1f} </b></td></tr>',
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
          name: 'Rp. ',
          data: {!! json_encode(array_reverse($total_pemb)) !!}

      }]
  });
</script>
@endsection