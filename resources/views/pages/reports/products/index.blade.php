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
							{{-- <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#exampleModal">
								Lihat Berdasarkan
							</button>
							
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
													<input type="text" id="datepicker" style="width: 100%">
												</div>
												
											</form>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
											<button type="button" class="btn btn-primary">Tampilkan</button>
										</div>
									</div>
								</div>
							</div> --}}

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