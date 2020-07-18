@extends('layouts/main')

@section('title', 'Laporan Produk')

@section('title_pages', 'Laporan Produk')

@section('content')

  <div class="content">
    <div class="container-fluid">
      @if (session('status'))
          <div class="alert alert-success">
              {{ session('status') }}
          </div>
			@endif
			
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title">Laporan Produk</h4>              
            </div>
            <div class="card-body">
							<style>
								@media print{
									.nonprint {display: none}
								}
							</style>
							<div class="nonprint">
								<a href="javascript:window.print()" class="btn btn-outline-success"><i class="material-icons">print</i></a>
							</div> 

              <table class="table table-hover" style="width:100%">
                <thead>
                  <tr>
										<th scope="col">#</th>
										<th scope="col">Nama</th>
										<th scope="col">Merek</th>
										<th scope="col">Harga</th>
										<th scope="col">Stok</th>
										<th scope="col">Satuan</th>
										<th scope="col">Update Terakhir</th>
                  </tr>
                </thead>
                <tbody id="reportProduct">
                  
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
	</div>

	<script type="text/javascript">

		$(document).ready(function(){
			$( function() {
				// $.fn.datepicker.defaults.format = "yyyy/mm/dd";
				$("#datepicker").datepicker();
			} );
			$('#reportProduct').load("/data_report_product");
		});

	</script>

@endsection