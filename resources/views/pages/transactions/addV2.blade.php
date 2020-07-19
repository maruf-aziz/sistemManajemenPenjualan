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

      {{-- <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title">Tambah Transaksi Penjualan</h4>
            </div>
						<div class="card-body">
							<div class="row">
								<div class="col-md-4">
									<label for="">Produk</label>
									<select name="" id="field-product" style="width: 100%" onchange="cekProduct()">
										<option selected value="">-- Pilih Produk --</option>
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
								<div class="col-md-1">
									<label for="">harga</label>
									<input type="text" class="input-css name" style="width: 100%; border: 1px solid red;" id="field-harga" value="" disabled>
								</div>
								<div class="col-md-1">
									<label for="">Satuan</label>
									<input type="text" class="input-css name" style="width: 100%; border: 1px solid red;" id="field-satuan" value="" disabled>
								</div>
								<div class="col-md-1">
									<label for="">Stok</label>
									<input type="text" class="input-css name" style="width: 100%; border: 1px solid red;" id="field-stock" disabled>
								</div>
								<div class="col-md-1">
									<label for="">Disc item%</label>
									<input type="text" class="input-css name" style="width: 100%;" id="field-disc" value="" maxlength="2" onkeypress="return hanyaAngka(event)" required>
								</div>
								<div class="col-md-2">
									<label for="">Beli</label>
									<input type="text" class="input-css name" style="width: 100%;" id="field-beli" value="" maxlength="2" onkeypress="return hanyaAngka(event)" required>
								</div>
							</div>
							<button type="button" id="tambahItem" class="btn btn-primary pull-right mt-5 addRow">Tambah Item</button>
						
						</div>
          </div>
        </div>
			</div> --}}

			<div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title">List Item Terpilih</h4>
            </div>
						<div class="card-body">
							<form method="post" action="/transactions" enctype="multipart/form-data">
								@csrf
								<table class="table table-striped" id="dataItem">
									<thead align="center">
										<tr>
											<th scope="col" width="30%"></th>
											<th scope="col" width="15%"></th>
											<th scope="col" width="15%"></th>
											<th scope="col" width="15%"></th>
											<th scope="col" width="20%"></th>
											<th scope="col" width="5%"></th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>
												<label for="">Nama Pelanggan</label>
												<select name="customer_id" id="pelanggan" style="width: 100%" required>
													<option value="">-- Cari Pelanggan --</option>
													@foreach ($customers as $item)
															<option value="{{ $item->id }}">{{ $item->name }}</option>
													@endforeach
													<input type="hidden" name="user_id" value="{{ Auth::user()->id }}" readonly>
												</select>
											</td>
                    </tr>
										<tr>
											<td>
                        <label for="">Tanggal Transaksi</label>
                        <br>
                        <input type="text" class="input-css name" style="width: 50%; border: 1px solid red;" value="{{ date('D, d-M-Y') }}" disabled>
											</td>
                    </tr>
										<tr>
											<td>
                        <label for="">No Transaksi</label>
                        <br>
                        <input type="text" class="input-css name" style="width: 50%; border: 1px solid red;" value="{{ $new_id+1 }}" disabled>
											</td>
                    </tr>

                    <tr>
                      <td colspan="6">
                        <div class="row">
                          <div class="col-md-4">
                            <label for="">Produk</label>
                            <select name="" id="field-product" style="width: 100%" onchange="cekProduct()">
                              <option selected value="">-- Pilih Produk --</option>
                              @foreach ($products as $item)
                                  <option value="{{ $item->id_product }}" 
          
                                    nama="{{ $item->name_product }}" 
                                    harga="@currency($item->price)" 
                                    hargaInt="{{ $item->price }}" 
                                    stock="{{ $item->stock }}" 
                                    merek="{{ $item->name }}"
                                    satuan="{{ $item->unit }}"
                                    lot="{{ $item->lot }}" 
                                    exp="{{ $item->exp }}"
                                    
                                    >{{ $item->name_product }}  [ lot : {{ $item->lot }} / Exp : {{ $item->exp }} ]</option>
                              @endforeach
                            </select>
                          </div>
                          <div class="col-md-2">
                            <label for="">Merek</label>
                            <input type="text" class="input-css name" style="width: 100%; border: 1px solid red;" id="field-merek" value="" disabled>
                          </div>
                          <div class="col-md-1">
                            <label for="">harga</label>
                            <input type="text" class="input-css name" style="width: 100%; border: 1px solid red;" id="field-harga" value="" disabled>
                          </div>
                          <div class="col-md-1">
                            <label for="">Satuan</label>
                            <input type="text" class="input-css name" style="width: 100%; border: 1px solid red;" id="field-satuan" value="" disabled>
                          </div>
                          <div class="col-md-1">
                            <label for="">Stok</label>
                            <input type="text" class="input-css name" style="width: 100%; border: 1px solid red;" id="field-stock" disabled>
                          </div>
                          <div class="col-md-1">
                            <label for="">Disc item%</label>
                            <input type="text" class="input-css name" style="width: 100%;" id="field-disc" value="" maxlength="2" onkeypress="return hanyaAngka(event)">
                          </div>
                          <div class="col-md-1">
                            <label for="">Beli</label>
                            <input type="text" class="input-css name" style="width: 100%;" id="field-beli" value="" maxlength="2" onkeypress="return hanyaAngka(event)">
                          </div>
                          <div class="col-md-1" style="margin-top: 5px;">
                            <button type="button" id="tambahItem" class="btn btn-primary mt-3 addRow"><i class="material-icons">add_shopping_cart</i></button>
                          </div>
                        </div>
                        {{-- <button type="button" id="tambahItem" class="btn btn-primary pull-right mt-5 addRow">Tambah Item</button> --}}
                      </td>
                    </tr>
                    

									</tbody>
									<tfoot>
										<tr>
											<td colspan="3"></td>
											<td colspan="1">
												<label for="">Discount %</label>
												<input type="text" class="form-control" style="width: 100%;" id="discount" name="disc" value="" maxlength="2" onkeypress="return hanyaAngka(event)" required>
											</td>
											<td colspan="1">
												<label for="">Total Awal</label>
												<input type="text" class="form-control bg-white" style="width: 100%;" id="first_total" value="" maxlength="2" readonly>
											</td>
										</tr>
										<tr>
											<td colspan="3"></td>											
											<td colspan="1">
												<label for="">PPN 10%</label>
												<input type="text" class="form-control bg-white" style="width: 100%;" id="tax" name="tax" value="" readonly>
											</td>
											<td colspan="1">
												<label for="">Total Akhir</label>
												<input type="text" class="form-control bg-white" style="width: 100%;" id="total" name="total_cost" value="" readonly required>
											</td>
										</tr>
										<tr>
											<td colspan="5" align="right">
												<input type="checkbox" required> Saya menyatakan transaksi ini sudah benar
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
			$('#field-satuan').val(satuan);
		}

		$('.addRow').on('click', function(){
			$('#discount').val(0);
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
				var id = $('#field-product option:selected').val();
				var harga = $('#field-product option:selected').attr('harga');
				var hargaInt = $('#field-product option:selected').attr('hargaInt');
				var merek = $('#field-product option:selected').attr('merek');
				var stock = $('#field-product option:selected').attr('stock');
				var lot = $('#field-product option:selected').attr('lot');
				var exp = $('#field-product option:selected').attr('exp');
				var beli = $('#field-beli').val();
				var disc = $('#field-disc').val();
				var discInt;

				if (disc == '') {
					discInt = 0;
				}
				else{
					discInt = parseInt(disc);
				}

				var subTotal = parseInt(hargaInt) * parseInt(beli) - (parseInt(hargaInt) * parseInt(beli)) * discInt / 100;
				// var tax = 0.1 * subTotal;

				var subTotalRP = formatCurrency(subTotal);

				// console.log(tax);

				var row = $('tbody tr').length;
				var tr = '<tr>'+
												'<td>'+
													'<label for="">Nama Produk</label>'+
													'<input type="text" class="form-control bg-white" style="width: 100%;" id="name" name="name_product[]" value="'+nama+' [ lot : '+ lot+' / exp : '+exp+']" readonly>'+
													'<input type="hidden" class="form-control" style="width: 100%;" id="product_id" name="product_id[]" value="'+id+'" readonly>'+
												'</td>'+
												'<td>'+
													'<label for="">Harga</label>'+
													'<input type="text" class="form-control bg-white" style="width: 100%;" id="price" name="price[]" value="'+harga+'" readonly>'+
													'<input type="hidden" class="form-control" style="width: 100%;" id="price" name="unit_price[]" value="'+hargaInt+'" readonly>'+
												'</td>'+
												'<td>'+
													'<label for="">Disc Item %</label>'+
													'<input type="text" class="form-control bg-white" style="width: 100%;" id="disc" name="disc_item[]" value="'+discInt+'" readonly>'+
												'</td>'+
												'<td>'+
													'<label for="">Beli</label>'+
													'<input type="text" class="form-control bg-white" style="width: 100%;" id="stock" name="amount[]" value="'+beli+'" readonly>'+
												'</td>'+
												'<td>'+
													'<label for="">Sub Total</label>'+
													'<input type="text" class="form-control bg-white subTotal" style="width: 100%;" id="subTotal" name="sub[]" value="'+subTotalRP+'" readonly>'+
													'<input type="hidden" class="form-control subTotal" style="width: 100%;" id="subTotal" name="subTotal[]" value="'+subTotal+'" readonly>'+
												'</td>'+
												'<td align="center">'+
													'<label for="">Hapus</label>'+
													'<br>'+
													'<a href="#" class="btn btn-danger btn-sm remove" data-harga="'+subTotal+'">X</a>'+
												'</td>'+
								'</tr>';

				set_total(subTotal);
				set_discount();

				$('tbody').append(tr);

				$('#field-harga').val('');
				$('#field-merek').val('');
				$('#field-hargaInt').val('');
				$('#field-stock').val('');
				$('#field-beli').val('');
				$('#field-disc').val('');
				$('#field-product').val(null).trigger('change');
			}

			
		}

		var total = 0;
		var tax = 0;
		function set_total(subTotal){
			
			total += subTotal;

				
			tax = 0.1 * total;
			$('#first_total').val(formatCurrency(total));
			$('#total').val(formatCurrency(total + tax));
			$('#tax').val(formatCurrency(tax));
			
		}

		function set_discount(){
			$('#discount').on('keyup', function() {
				var discount = $(this).val();
				var totalAkhir = total - (parseInt(discount) * total / 100);

				tax = 0.1 * totalAkhir;
				$('#total').val(formatCurrency(totalAkhir));
				$('#tax').val(formatCurrency(tax));
			});
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

				$('#discount').val(0);
				$('#first_total').val(formatCurrency(total));
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