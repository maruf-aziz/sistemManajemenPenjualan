@extends('layouts/main')

@section('title', 'Laporan Produk')

{{-- @section('title_pages', 'Laporan PT.SAMUDERA INDAH INTERMEDIKA') --}}

@section('content')

  <div class="content">
    <div class="container-fluid">
      @if (session('status'))
          <div class="alert alert-success">
              {{ session('status') }}
          </div>
      @endif
      
      <div class="row">
        <div class="col-xl-4"></div>
        <div class="col-xl-8">
          <img src="{{ url('/images/logo/logo.png') }}" style="width: 100px; float:left; margin-right : 5px;" alt="">          
         
          <h2>PT.SAMUDERA INDAH INTERMEDIKA</h2>
          <br>
          <p class="" style="font-size: 16px; position : relative; top : -20px;">
            Jl.KH Agus Salim No.36, Laweyan, Surakarta, Telp.(0271) 730998 Fax. (0271) 723251
          </p>
          {{-- <p style="font-size: 14px; float:right; padding-top : 10px;">
            Jl.KH Agus Salim No.36, Laweyan, Surakarta, Telp.(0271) 730998 Fax. (0271) 723251
          </p> --}}
        </div>
        
      </div>
			
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

              <div class="row mt-5">
                <div class="col-11" align="right">
                  <h5>{{ date('D, d-M-Y') }}</h5>
                </div>
              </div>
              
              <div class="row">
                <div class="col-1"></div>
                <div class="col-2" align="center">
                  <h4>Pembuat</h4>
                  <div style="margin-top : 100px;">
                    <hr>
                    <h4>{{ Auth::user()->name }}</h4>
                  </div>                  
                </div>

                <div class="col-6"></div>

                <div class="col-2" align="center">
                  <h4>Disetujui</h4>
                  <div style="margin-top : 100px;">
                    <hr>
                  </div> 
                </div>
              </div>

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