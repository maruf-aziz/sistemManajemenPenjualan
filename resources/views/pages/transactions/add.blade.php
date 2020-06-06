@extends('layouts/main')

@section('title', 'Transactions')

@section('title_pages', 'Transactions')

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
              <h4 class="card-title">Tambah Transaksi Penjualan</h4>
            </div>
						<div class="card-body">
							{{-- <form>
								<table class="table table-striped">
									<thead align="center">
										<tr>
											<th scope="col" width="30%">Produk</th>
											<th scope="col" width="15%">Merek</th>
											<th scope="col" width="15%">Harga</th>
											<th scope="col" width="15%">Stok</th>
											<th scope="col" width="15%">Beli</th>
										</tr>
									</thead>
										<tr>
											<td>
												<input type="text" class="input-css name" style="width: 100%;" id="name" name="name_product[]" value="" required>
											</td>
											<td>
												<input type="text" class="input-css name" style="width: 100%;" id="name" name="name_product[]" value="" required>
											</td>
											<td>
												<input type="text" class="input-css name" style="width: 100%;" id="price" name="price[]" value="" onkeypress="return hanyaAngka(event)" required>
											</td>
											<td>
												<input type="text" class="input-css name" style="width: 100%;" id="stock" name="stock[]" value="" onkeypress="return hanyaAngka(event)" required>
											</td>
											<td>
												<input type="text" class="input-css name" style="width: 100%;" id="stock" name="stock[]" value="" onkeypress="return hanyaAngka(event)" required>
											</td>
										</tr>
								</table>
								<button type="submit" class="btn btn-primary pull-right">Tambah Item</button>
							</form> --}}
							<div class="row">
								<div class="col-md-4">
									<label for="">Produk</label>
									<select name="" id="field-product" style="width: 100%" onchange="cekProduct()">
										<option seelcted value="">-- Pilih Produk --</option>
										@foreach ($products as $item)
												<option value="{{ $item->id_product }}" 

													nama="{{ $item->name_product }}" 
													harga="@currency($item->price)" 
													hargaInt="{{ $item->price }}" 
													stock="{{ $item->stock }}" 
													merek="{{ $item->name }}"
													satuan="{{ $item->unit }}"
													
													>{{ $item->name_product }}</option>
										@endforeach
									</select>
								</div>
								<div class="col-md-2">
									<label for="">Merek</label>
									<input type="text" class="input-css name" style="width: 100%; border: 1px solid red;" id="field-merek" value="" disabled>
								</div>
								<div class="col-md-2">
									<label for="">harga</label>
									<input type="text" class="input-css name" style="width: 100%; border: 1px solid red;" id="field-harga" value="" disabled>
								</div>
								<div class="col-md-2">
									<label for="">Stok</label>
									<input type="text" class="input-css name" style="width: 100%; border: 1px solid red;" id="field-stock" disabled>
								</div>
								<div class="col-md-2">
									<label for="">Beli</label>
									<input type="text" class="input-css name" style="width: 100%;" id="field-beli" value="" onkeypress="return hanyaAngka(event)" required>
								</div>
							</div>
							<button type="button" id="tambahItem" class="btn btn-primary pull-right mt-5 addRow">Tambah Item</button>
						
						</div>
          </div>
        </div>
			</div>

			<div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title">List Item Terpilih</h4>
            </div>
						<div class="card-body">
							<form method="post" action="/products" enctype="multipart/form-data">
								@csrf
								<table class="table table-striped" id="dataItem">
									<thead align="center">
										<tr>
											{{-- <th scope="col" width="30%">Nama Produk</th>
											<th scope="col" width="15%">Merek</th>
											<th scope="col" width="15%">Harga Satuan</th>
											<th scope="col" width="15%">Beli</th>
											<th scope="col" width="15%">Sub Total</th>
											<th scope="col" width="10%">#</th> --}}

											<th scope="col" width="30%"></th>
											<th scope="col" width="20%"></th>
											<th scope="col" width="20%"></th>
											<th scope="col" width="25%"></th>
											<th scope="col" width="5%"></th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td colspan="2">
												<label for="">Nama Pelanggan</label>
												<select name="customers_id" id="pelanggan" style="width: 100%" required>
													<option value="">-- Cari Pelanggan --</option>
													@foreach ($customers as $item)
															<option value="{{ $item->id }}">{{ $item->name }}</option>
													@endforeach
												</select>
											</td>
										</tr>
										{{-- <tr>
											<td>
												<label for="">Nama Produk</label>
												<input type="text" class="form-control" style="width: 100%;" id="name" name="name_product[]" value="" readonly>
											</td>
											<td>
												<label for="">Harga</label>
												<input type="text" class="form-control" style="width: 100%;" id="price" name="price[]" value="" readonly>
											</td>
											<td>
												<label for="">Beli</label>
												<input type="text" class="form-control" style="width: 100%;" id="stock" name="beli[]" value="" readonly>
											</td>
											<td>
												<label for="">Sub Total</label>
												<input type="text" class="form-control" style="width: 100%;" id="subTotal" name="subTotal[]" value="" readonly>
											</td>
											<td align="center">
												<label for="">Hapus</label>
												<br>
												<a href="#" class="btn btn-danger btn-sm remove">X</a>
											</td>
										</tr> --}}
									</tbody>
									<tfoot>
										<tr>
											<td colspan="2"></td>
											<td colspan="1">
												<label for="">PPN 10%</label>
												<input type="text" class="form-control" style="width: 100%;" id="tax" name="tax" value="" required readonly>
											</td>
											<td colspan="1">
												<label for="">Total</label>
												<input type="text" class="form-control" style="width: 100%;" id="total" name="Total" value="" required readonly>
											</td>
										</tr>
									</tfoot>
								</table>
								<button type="submit" class="btn btn-success pull-right">Simpan</button>
							</form>
						</div>
          </div>
        </div>
			</div>
			
    </div>
	</div>
	
	<script type="text/javascript">
		function cekProduct(){
			var nama = $('#field-product option:selected').attr('nama');
			var harga = $('#field-product option:selected').attr('harga');
			var hargaInt = $('#field-product option:selected').attr('hargaInt');
			var merek = $('#field-product option:selected').attr('merek');
			var stock = $('#field-product option:selected').attr('stock');
			var satuan = $('#field-product option:selected').attr('satuan');

			$('#field-harga').val(harga);
			$('#field-merek').val(merek);
			$('#field-hargaInt').val(hargaInt);
			$('#field-stock').val(stock);
		}

		$('.addRow').on('click', function(){
			addRow();
		});

		function hanyaAngka(evt) {
		  var charCode = (evt.which) ? evt.which : event.keyCode
		   if (charCode > 31 && (charCode < 48 || charCode > 57))
 
		    return false;
		  return true;
		}

		function formatCurrency(num){
			num = num.toString().replace(/\$|\,/g,'');
			if(isNaN(num)) num = "0";
			cents = Math.floor((num*100+0.5)%100);
			num = Math.floor((num*100+0.5)/100).toString();
			if(cents < 10) cents = "0" + cents;
			for (var i = 0; i < Math.floor((num.length-(1+i))/3); i++)
			num = num.substring(0,num.length-(4*i+3))+'.'+num.substring(num.length-(4*i+3));
			return ("Rp. " + num);
		}

		function addRow(){

			if($('#field-product').val() == ''){
				Swal.fire({
					icon: 'error',
					title: 'Oops...',
					text: 'Field Product Kosong',
				})
			}

			else if($('#field-beli').val() == ''){
				Swal.fire({
					icon: 'error',
					title: 'Oops...',
					text: 'Field Beli Kosong',
				})
			}

			else{
				var nama = $('#field-product option:selected').attr('nama');
				var harga = $('#field-product option:selected').attr('harga');
				var hargaInt = $('#field-product option:selected').attr('hargaInt');
				var merek = $('#field-product option:selected').attr('merek');
				var stock = $('#field-product option:selected').attr('stock');
				var beli = $('#field-beli').val();

				var subTotal = parseInt(hargaInt) * parseInt(beli);
				// var tax = 0.1 * subTotal;

				var subTotalRP = formatCurrency(subTotal);

				// console.log(tax);

				var row = $('tbody tr').length;
				var tr = '<tr>'+
												'<td>'+
													'<label for="">Nama Produk</label>'+
													'<input type="text" class="form-control" style="width: 100%;" id="name" name="name_product[]" value="'+nama+'" readonly>'+
												'</td>'+
												'<td>'+
													'<label for="">Harga</label>'+
													'<input type="text" class="form-control" style="width: 100%;" id="price" name="price[]" value="'+harga+'" readonly>'+
												'</td>'+
												'<td>'+
													'<label for="">Beli</label>'+
													'<input type="text" class="form-control" style="width: 100%;" id="stock" name="beli[]" value="'+beli+'" readonly>'+
												'</td>'+
												'<td>'+
													'<label for="">Sub Total</label>'+
													'<input type="text" class="form-control subTotal" style="width: 100%;" id="subTotal" name="subTotal[]" value="'+subTotalRP+'" readonly>'+
												'</td>'+
												'<td align="center">'+
													'<label for="">Hapus</label>'+
													'<br>'+
													'<a href="#" class="btn btn-danger btn-sm remove" data-harga="'+subTotal+'">X</a>'+
												'</td>'+
								'</tr>';

				set_total(subTotal);

				$('tbody').append(tr);

				$('#field-harga').val('');
				$('#field-merek').val('');
				$('#field-hargaInt').val('');
				$('#field-stock').val('');
				$('#field-beli').val('');
				$('#field-product').val(null).trigger('change');
			}

			
		}

		var total = 0;
		var tax = 0;
		function set_total(subTotal){
			
				total += subTotal;

				
			tax = 0.1 * total;
			$('#total').val(formatCurrency(total));
			$('#tax').val(formatCurrency(tax));
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
				var sub = $(this).attr('data-harga');
				// console.log(sub);
				total = total-sub;
				tax = 0.1 * total;
				
				$('#total').val(formatCurrency(total));
				$('#tax').val(formatCurrency(tax));

				$(this).parent().parent().remove();

			}
			
		});

		$(document).ready(function() {
        $('#pelanggan').select2();
        $('#field-product').select2();
    });

	</script>

@endsection