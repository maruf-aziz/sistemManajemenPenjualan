@extends('layouts/main')

@section('title', 'Product Buying')

@section('title_pages', 'Pembelian Barang')

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
              <h4 class="card-title">Tambah Transaksi Pembelian</h4>
            </div>
						<div class="card-body">
							<div class="row">
								<div class="col-md-2">
									<label for="">Jenis Produk</label>
									<select name="" id="field-jenis_product" style="width: 100%" onchange="cekJenisProduct()">
										<option selected value="">-- Pilih Jenis Produk --</option>
										<option value="old">Tambah Stok Produk Lama</option>
										<option value="new">Tambah Product Baru</option>
									</select>
								</div>
								{{-- product yang sudah ada --}}
								<div class="col-md-2 product-lama" style="display: none">
									<label for="">Pilih Product</label>
									<select name="" id="field-product" style="width: 100%">
										<option selected value="">-- Produk --</option>
									</select>
								</div>
								
								{{-- ////////////////////////////////////////////// - NEW DATA - ////////////////////////////////////////////////// --}}

								{{-- product baru --}}
								<div class="col-md-2 product-baru" style="display: none">
									<label for="">Nama Produk</label>
									<input type="text" class="input-css" style="width: 100%;" id="field-name_product" value="" required>
								</div>

								<div class="col-md-2 product-baru" style="display: none">
									<label for="">Satuan Produk</label>
									<select name="" id="field-units" style="width: 100%" onchange="cekSatuan()">
										<option selected value="">-- Satuan --</option>
										<option value="new">Tambah Satuan</option>
									</select>
								</div>

								{{-- new satuan --}}
								<div class="col-md-2 new-satuan" style="display: none">
									<label for="">Satuan Baru</label>
									<input type="text" class="input-css" style="width: 100%;" id="field-new_satuan" value="" required>
								</div>

								<div class="col-md-2 product-baru" style="display: none" onchange="cekMerek()">
									<label for="">Merek</label>
									<select name="" id="field-brands" style="width: 100%">
										<option selected value="">-- merek --</option>
										<option value="new">Tambah Merek</option>
									</select>
								</div>

								{{-- new merek --}}
								<div class="col-md-2 new-merek" style="display: none">
									<label for="">Merek Baru</label>
									<input type="text" class="input-css" style="width: 100%;" id="field-new_merek" value="" required>
								</div>

							</div>

							<div class="row">
								<div class="col-md-2">
									<label for="">Jumlah Beli</label>
									<input type="text" class="input-css name" style="width: 100%;" id="field-jumlah" value="0" onkeypress="return hanyaAngka(event)" required>
								</div>
								<div class="col-md-2">
									<label for="">Satuan Beli</label>
									<input type="text" class="input-css name" style="width: 100%;" id="field-satuan-beli" value="" >
								</div>
								<div class="col-md-2">
									<label for=""><small>Isi Dalam Satuan</small></label>
									<input type="text" class="input-css name" style="width: 100%;" id="field-isi" value="0" onkeypress="return hanyaAngka(event)" required>
								</div>
								<div class="col-md-2">
									<label for="">Total Harga</label>
									<input type="text" class="input-css name" style="width: 100%;" id="field-total-harga" onkeypress="return hanyaAngka(event)" onkeyup="hitungHargBeli()" required>
								</div>
								<div class="col-md-2">
									<label for=""><small>Harga Beli /Satuan</small></label>
									<input type="text" class="input-css name" style="width: 100%; border: 1px solid red;" id="field-harga-satuan" value="" maxlength="2" required readonly>
								</div>
								<div class="col-md-2">
									<label for=""><small>Harga Jual /Satuan</small></label>
									<input type="text" class="input-css name" style="width: 100%;" id="field-harga-jual" value="" onkeypress="return hanyaAngka(event)" required>
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
              <h4 class="card-title">List Item Terbeli</h4>
            </div>
						<div class="card-body">
							<form method="post" action="/transactions" enctype="multipart/form-data">
								@csrf
								<table class="table table-striped" id="dataItem">
									<thead align="center">
										<tr>
											<th scope="col" width="30%"></th>
											<th scope="col" width="10%"></th>
											<th scope="col" width="10%"></th>
											<th scope="col" width="15%"></th>
											<th scope="col" width="15%"></th>
											<th scope="col" width="15%"></th>
											<th scope="col" width="5%"></th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td colspan="2">
												<label for="">Nama Pelanggan</label>
												<select name="customer_id" id="pelanggan" style="width: 100%" required>
													<option value="">-- Cari Pelanggan --</option>
													
													<input type="hidden" name="user_id" value="{{ Auth::user()->id }}" readonly>
												</select>
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
												<input type="text" class="form-control" style="width: 100%;" id="first_total" value="" maxlength="2" readonly>
											</td>
										</tr>
										<tr>
											<td colspan="3"></td>											
											<td colspan="1">
												<label for="">PPN 10%</label>
												<input type="text" class="form-control" style="width: 100%;" id="tax" name="tax" value="" readonly>
											</td>
											<td colspan="1">
												<label for="">Total Akhir</label>
												<input type="text" class="form-control" style="width: 100%;" id="total" name="total_cost" value="" readonly required>
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

		$(document).ready(function(){
			$('#field-product').load("/produk");
			$('#field-units').load("/satuan");
			$('#field-brands').load("/merek");
		});

		function cekJenisProduct(){
			var jenis = $('#field-jenis_product').val()

			if (jenis == 'old') {
				$('.product-lama').css("display","block");
				$('.product-baru').css("display","none");
				$('.new-satuan').css("display","none");
				$('.new-merek').css("display","none");
				
        $('#field-units').val(null).trigger('change');
        $('#field-brands').val(null).trigger('change');
			}
			else if(jenis == 'new'){
				$('.product-lama').css("display","none");
				$('.product-baru').css("display","block");
				$('.new-satuan').css("display","none");
				$('.new-merek').css("display","none");

				$('#field-product').val(null).trigger('change');
			}
			else{
				$('.product-lama').css("display","none");
				$('.product-baru').css("display","none");
				$('.new-satuan').css("display","none");
				$('.new-merek').css("display","none");

				$('#field-product').val(null).trigger('change');
				$('#field-units').val(null).trigger('change');
        $('#field-brands').val(null).trigger('change');
			}
		}

		function cekSatuan(){
			var satuan = $('#field-units').val();

			if (satuan == 'new') {
				$('.new-satuan').css("display","block");
			}
			else{
				$('.new-satuan').css("display","none");
			}
		}

		function cekMerek(){
			var merek = $('#field-brands').val();

			if (merek == 'new') {
				$('.new-merek').css("display","block");
			}
			else{
				$('.new-merek').css("display","none");
			}
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

		function hitungHargBeli(){
			// var jml_beli = $('#field-jumlah').val();
			var isi = $('#field-isi').val();
			var harga = document.getElementById('field-total-harga').value;
			var cnv_harga = convertToAngka(harga);

			var harga_satuan = parseInt(cnv_harga) / parseInt(isi);
			if(!isNaN(harga_satuan)){
					document.getElementById('field-harga-satuan').value = formatCurrency(harga_satuan);
			}

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

		var rupiah = document.getElementById('field-total-harga');
		rupiah.addEventListener('keyup', function(e){
			rupiah.value = formatRupiah(this.value, 'Rp. ');
		});

		var rupiah2 = document.getElementById('field-harga-jual');
		rupiah2.addEventListener('keyup', function(e){
			rupiah2.value = formatRupiah(this.value, 'Rp. ');
		});

		function formatRupiah(angka, prefix){
			var number_string = angka.replace(/[^,\d]/g, '').toString(),
			split   		= number_string.split(','),
			sisa     		= split[0].length % 3,
			rupiah     		= split[0].substr(0, sisa),
			ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);
 
			// tambahkan titik jika yang di input sudah menjadi angka ribuan
			if(ribuan){
				separator = sisa ? '.' : '';
				rupiah += separator + ribuan.join('.');
			}
 
			rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
			return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
		}

		function convertToAngka(rupiah)
		{
			return parseInt(rupiah.replace(/,.*|[^0-9]/g, ''), 10);
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

				var id_jenis = $('#field-jenis_product').val();
				var id_product;
				var nama_product;
				var jml_beli = $('#field-jumlah').val();
				var satuan_beli = $('#field-satuan-beli').val();
				var isi = $('#field-isi').val();
				var total_harga = $('#field-total-harga').val();
				var harga_satuan = $('#field-harga-satuan').val();
				var harga_jual_satuan = $('#field-harga-jual').val();

				if(id_jenis == 'old'){
					id_product = $('#field-product').val();
					nama_product = $('#field-product option:selected').attr('nama');
				}
				else{
					// ajax
				}

				// console.log(id_product);
				// console.log(nama_product);


				// var subTotal = parseInt(hargaInt) * parseInt(beli) - (parseInt(hargaInt) * parseInt(beli)) * discInt / 100;
				// var tax = 0.1 * subTotal;

				// var subTotalRP = formatCurrency(subTotal);

				// console.log(tax);

				var row = $('tbody tr').length;
				var tr = '<tr>'+
												'<td>'+
													'<label for="">Nama Produk</label>'+
													'<input type="text" class="form-control" style="width: 100%;" id="name" name="name_product[]" value="'+nama_product+'" readonly>'+
													'<input type="hidden" class="form-control" style="width: 100%;" id="product_id" name="product_id[]" value="'+id_product+'" readonly>'+
												'</td>'+
												'<td>'+
													'<label for="">Jumlah</label>'+
													'<input type="text" class="form-control" style="width: 100%;" id="price" name="price[]" value="'+jml_beli+'"/"'+satuan_beli+'" readonly>'+
												'</td>'+
												'<td>'+
													'<label for="">Isi/Satuan</label>'+
													'<input type="text" class="form-control" style="width: 100%;" id="disc" name="disc_item[]" value="'+isi+'" readonly>'+
												'</td>'+
												'<td>'+
													'<label for="">Total</label>'+
													'<input type="text" class="form-control" style="width: 100%;" id="stock" name="amount[]" value="'+total_harga+'" readonly>'+
												'</td>'+
												'<td>'+
													'<label for="">Harga Satuan</label>'+
													'<input type="text" class="form-control subTotal" style="width: 100%;" id="subTotal" name="sub[]" value="'+harga_satuan+'" readonly>'+
												'</td>'+
												'<td>'+
													'<label for="">Harga Jual</label>'+
													'<input type="text" class="form-control subTotal" style="width: 100%;" id="subTotal" name="sub[]" value="'+harga_jual_satuan+'" readonly>'+
												'</td>'+
												'<td align="center">'+
													'<label for="">Hapus</label>'+
													'<br>'+
													'<a href="#" class="btn btn-danger btn-sm remove" data-harga="'+total_harga+'">X</a>'+
												'</td>'+
								'</tr>';

				// set_total(subTotal);
				// set_discount();

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
			$('#total').val(formatCurrency(total));
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
        $('#field-jenis_product').select2();
        $('#field-product').select2();
        $('#field-units').select2();
        $('#field-brands').select2();
    });

	</script>

@endsection