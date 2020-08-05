@extends('layouts/main')

@section('title', 'Laporan Pembelian')

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
        </div>        
      </div>
			
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title">Laporan Transaksi Pembelian</h4>              
            </div>
            <div class="card-body">
							<style>
								@media print{
									.nonprint {display: none}
								}
							</style>
							<div class="nonprint">
								<button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#exampleModal">
									Lihat Berdasarkan
								</button>
								<a href="javascript:window.print()" class="btn btn-outline-success"><i class="material-icons">print</i></a>
							</div>
							
							
							<!-- Modal -->
							<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="exampleModalLabel">Lihat Berdasarkan</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
										<div class="modal-body">
											<form action="#">
												<div class="form-group">
													<label for="">Tanggal</label>
													<input type="text" id="tgl" placeholder="ex : 1" onkeypress="return hanyaAngka(event)" maxlength="2" style="width: 100%">
												</div>
												<div class="form-group">
                          <label for="">Bulan</label>
                          <br>
                          <select name="month" style="width: 100%" id="month" >
                            <option value="1" {{ date('m') == 1 ? 'selected' : '' }}>January</option>
                            <option value="2" {{ date('m') == 2 ? 'selected' : '' }}>February</option>
                            <option value="3" {{ date('m') == 3 ? 'selected' : '' }}>Maret</option>
                            <option value="4" {{ date('m') == 4 ? 'selected' : '' }}>April</option>
                            <option value="5" {{ date('m') == 5 ? 'selected' : '' }}>Mei</option>
                            <option value="6" {{ date('m') == 6 ? 'selected' : '' }}>Juni</option>
                            <option value="7" {{ date('m') == 7 ? 'selected' : '' }}>Juli</option>
                            <option value="8" {{ date('m') == 8 ? 'selected' : '' }}>Agustus</option>
                            <option value="9" {{ date('m') == 9 ? 'selected' : '' }}>September</option>
                            <option value="10" {{ date('m') == 10 ? 'selected' : '' }}>Oktober</option>
                            <option value="11" {{ date('m') == 11 ? 'selected' : '' }}>November</option>
                            <option value="12" {{ date('m') == 12 ? 'selected' : '' }}>Desember</option>
                          </select>
                        </div>
                        <div class="form-group">
													<label for="">Tahun</label>
													{{-- <input type="text" id="tahun" placeholder="ex : 2020" onkeypress="return hanyaAngka(event)" maxlength="4" style="width: 100%"> --}}
													<select name="tahun" style="width: 100%" id="tahun">
                            {{-- <option value="">-- Pilih --</option> --}}                           
														<option value="{{ date('Y') }}" selected>{{ date('Y') }}</option>
														<option value="{{ date('Y')-1 }}">{{ date('Y')-1 }}</option>
                            <option value="{{ date('Y')-2 }}">{{ date('Y')-2 }}</option> 
                          </select>
												</div>
												
											</form>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-outline-warning" id="view" onclick="resetReport()">Reset</button>
											<button type="button" class="btn btn-outline-primary" id="view" onclick="viewReport()">Tampilkan</button>
											<button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
										</div>
									</div>
								</div>
							</div>

              <table class="table table-hover" style="width:100%">
                <thead>
                  <tr>
										<th scope="col">#</th>
										<th scope="col">Supplier</th>
										<th scope="col">Produk</th>
										<th scope="col">Tanggal</th>
										<th scope="col">Jumlah Beli</th>
										<th scope="col">Harga Satuan</th>
										<th scope="col">Total Harga</th>
                  </tr>
                </thead>
                <tbody id="reportTransaction">
                  
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
				$("#datepicker").datepicker();
			} );
			$('#reportTransaction').load("/data_report_pembelian");

        $('#month').select2();
        $('#tahun').select2();
		});

    function hanyaAngka(evt) {
		  var charCode = (evt.which) ? evt.which : event.keyCode
		   if (charCode > 31 && (charCode < 48 || charCode > 57))
 
		    return false;
		  return true;
		}

    function viewReport(){
      var tgl = $('#tgl').val();
      var mounth = $('#month').val();
      var thn  = $('#tahun').val();

			if(tgl == ''){
				tgl = 0;
			}

      $('#reportTransaction').load("/data_report_pembelian_custom/"+tgl+"/"+mounth+"/"+thn);

    }

		function resetReport(){
			$('#tgl').val('');
			$('#tahun').val(null).trigger('change');
			$('#month').val(null).trigger('change');

			$('#reportTransaction').load("/data_report_pembelian");
		}

	</script>

@endsection