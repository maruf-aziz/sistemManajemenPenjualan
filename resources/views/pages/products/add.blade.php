@extends('layouts/main')

@section('title', 'Produk')

@section('title_pages', 'Produk')

@section('content')

  <div class="content">
    <div class="container-fluid">
      @if (session('status'))
          <div class="alert alert-success">
              {{ session('status') }}
          </div>
      @endif

      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title">Tambah Produk</h4>
            </div>
						<div class="card-body">
							<form method="post" action="/products" enctype="multipart/form-data">
								@csrf
								<table class="table table-striped">
									<thead align="center">
										<tr>
											<th scope="col" width="20%">Nama Produk</th>
											<th scope="col" width="10%">Foto <small> ( < 1 mb)</small></th>
											<th scope="col" width="10%">No lot</th>
											<th scope="col" width="10%">Exp</th>
											<th scope="col" width="10%">Merek</th>
											<th scope="col" width="10%">Harga Satuan</th>
											<th scope="col" width="10%">Satuan</th>
											<th scope="col" width="10%">Stok</th>
											<th scope="col" width="10%">
												<a href="#" class="btn btn-success addRow">+</a>
											</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>
												<input type="text" class="input-css name" style="width: 100%;" id="name" name="name_product[]" value="" required>
											</td>
											<td>
												<input type="file" style="width: 100%;" id="pict" name="pict[]" value="">
											</td>
											<td>
												<input type="text" class="input-css name" style="width: 100%;" id="lot" name="lot[]" value="" required>
											</td>
											<td>
												<input type="date" class="input-css name" style="width: 100%;" id="exp" name="exp[]" value="" required>
											</td>
											<td>
												<select name="brand_id[]" id="brand" style="width: 100%;" class="select-css" required>
													<option selected value="">-- Pilih --</option>
													@foreach ($brands as $item)
															<option value="{{ $item->id_brands }}">{{ $item->name }}</option>
													@endforeach
												</select>
											</td>
											<td>
												<input type="text" class="input-css name" style="width: 100%;" id="price" name="price[]" value="" onkeypress="return hanyaAngka(event)" required>
											</td>
											<td>
												<select name="unit_id[]" id="brand" style="width: 100%;" class="select-css" required>
													<option selected value="">-- Pilih --</option>
													@foreach ($units as $item)
															<option value="{{ $item->id_unit }}">{{ $item->unit }}</option>
													@endforeach
												</select>
											</td>
											<td>
												<input type="text" class="input-css name" style="width: 100%;" id="stock" name="stock[]" value="" onkeypress="return hanyaAngka(event)" required>
											</td>
											<td align="center">
												<a href="#" class="btn btn-danger remove">X</a>
											</td>
										</tr>
									</tbody>
								</table>
								<button type="submit" class="btn btn-primary pull-right">Simpan</button>
								<a href="/products" class="btn btn-warning">Kembali</a>
							</form>
						</div>
          </div>
        </div>
			</div>
			
    </div>
	</div>
	
	<script type="text/javascript">
		$('.addRow').on('click', function(){
			addRow();
		});

		function hanyaAngka(evt) {
		  var charCode = (evt.which) ? evt.which : event.keyCode
		   if (charCode > 31 && (charCode < 48 || charCode > 57))
 
		    return false;
		  return true;
		}

		function addRow(){
			var row = $('tbody tr').length;
			var tr = '<tr>'+
							'<td><input type="text" class="input-css name" style="width: 100%;" id="name'+row+'" name="name_product[]" value="" required></td>'+
							'<td><input type="file" style="width: 100%;" id="pict" name="pict[]" value=""></td>'+
							'<td><input type="text" class="input-css name" style="width: 100%;" id="lot" name="lot[]" value="" required></td>'+
							'<td><input type="date" class="input-css name" style="width: 100%;" id="exp" name="exp[]" value="" required></td>'+
							'<td>'+
												'<select name="brand_id[]" id="brand" style="width: 100%;" class="select-css" required>'+
													'<option selected value="">-- Pilih --</option>'+
													'@foreach ($brands as $item)<option value="{{ $item->id_brands }}">{{ $item->name }}</option>@endforeach'+
												'</select>'+
							'</td>'+
							'<td><input type="text" class="input-css name" style="width: 100%;" id="price" name="price[]" value="" onkeypress="return hanyaAngka(event)" required></td>'+
							'<td>'+
												'<select name="unit_id[]" id="brand" style="width: 100%;" class="select-css" required>'+
													'<option selected value="">-- Pilih --</option>'+
													'@foreach ($units as $item)<option value="{{ $item->id_unit }}">{{ $item->unit }}</option>	@endforeach'+
												'</select>'+
							'</td>'+
							'<td><input type="text" class="input-css name" style="width: 100%;" id="stok" name="stock[]" value="" onkeypress="return hanyaAngka(event)" required></td>'+
							'<td align="center"><a href="#" class="btn btn-danger remove">X</a></td>'+
							'</tr>';

			$('tbody').append(tr);
		}

		$('.remove').live('click', function(){
			var last = $('tbody tr').length;
			if(last == 1){
				Swal.fire({
					icon: 'error',
					title: 'Oops...',
					text: 'Tidak Bisa Menghapus Semua',
					footer: '<small>Minimal 1 kolom tersisa</small>'
				})
			}
			else{
				$(this).parent().parent().remove();
			}
			
		});
		$(document).ready(function() {
        // $('select').select2();
    });

	</script>

@endsection