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
									<select name="" id="field-product" style="width: 100%" onchange="cekProduct()">
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
									{{-- <input type="text" class="input-css name" style="width: 100%;" id="field-satuan-beli" value="" > --}}
									<select name="field-satuan-beli" id="field-satuan-beli" style="width: 100%">
										<option value="">-- Satuan Beli --</option>
										@foreach ($satuan as $item)
												<option value="{{ $item->unit }}">{{ $item->unit }}</option>
										@endforeach
									</select>
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
							<form method="post" action="/purchases" enctype="multipart/form-data">
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
												<label for="">Supplier</label>
												<select name="supplier_id" id="supplier" style="width: 100%" required>
													<option value="">-- Cari Supplier --</option>												
													{{-- <input type="hidden" name="user_id" value="{{ Auth::user()->id }}" readonly> --}}
												</select>
											</td>
											<td>
												<div class="div" style="padding-top: 22px;">
													<button type="button" class="btn btn-info btn-sm" id="addDataSupplier" data-toggle="modal" data-target="#addSupplier"><i class="material-icons">assignment_ind</i> Supplier Baru</button>
												</div>
												
											</td>
										</tr>
									</tbody>
									<tfoot>
										<tr>
											<td colspan="5"></td>	
											<td colspan="1">
												<label for="">Total Akhir</label>
												<input type="text" class="form-control" style="width: 100%;" id="total" name="total_cost" value="" readonly required>
											</td>
										</tr>
										<tr>
											<td colspan="6" align="right">
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

			{{-- modal tambah supplier --}}

			<div class="modal fade" id="addSupplier" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Tambah Supplier</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<form>
								<div class="form-group">
									<label for="name">Nama Supplier</label>
									<input type="text" class="input-css" id="name_sp" name="name_sp" autofocus style="width: 100%">
								</div>
								<div class="form-group">
									<label for="name">No Telp</label>
									<input type="text" class="input-css" id="phone_sp" name="phone" maxlength="13" style="width: 100%" onkeypress="return hanyaAngka(event)">
								</div>
								<div class="modal-footer">
									{{-- <button type="button" class="btn btn-outline-secondary btn-sm" data-dismiss="modal">Close</button> --}}
									<button type="button" class="btn btn-outline-primary btn-sm" data-dismiss="modal" onclick="saveSupplier()">Tambah Data</button>
								</div>
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
			$('#supplier').load("/supplier");
		});

		function cekProduct(){
			var harga_jl = $('#field-product option:selected').attr('harga');

			$('#field-harga-jual').val(harga_jl);

		}

		function saveSupplier(){
			var name_sp 	= $('#name_sp').val();
			var phone 	= $('#phone_sp').val();

			if(name_sp == '' | phone == ''){
				Swal.fire({
					icon: 'error',
					title: 'Maaf',
					text: 'Kolom Data Tambah Supplier harus terisi semua !!!',
				})
			}
			else{
				$.ajax({
					url				: '/addSupplier',
					method 		: "get",
					data			: {
						"_token": "{{ csrf_token() }}",
						"name_sp" 	: name_sp,
						"phone" 		: phone
					},
					dataType	: 'json',
					success		: function(data){
						if (data.status == 'succes') {
							Swal.fire({
								icon: 'success',
								title: 'Selamat',
								text: 'Data Suppier Baru Telah Di Tambah',
							});
							$('#supplier').load("/supplier");
						}
						else{
							Swal.fire({
								icon: 'error',
								title: 'Maaf',
								text: 'Data Suppier Baru Gagal Di Tambah !!!',
							});
						}
					}

				});
				$('#name_sp').val('');
				$('#phone_sp').val('');
			}
		}

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
			// $('#discount').val(0);
			addRow();
		});

		function hanyaAngka(evt) {
		  var charCode = (evt.which) ? evt.which : event.keyCode
		   if (charCode > 31 && (charCode < 48 || charCode > 57))
 
		    return false;
		  return true;
		}

		function hitungHargBeli(){
			var jml_beli = $('#field-jumlah').val();
			var isi = $('#field-isi').val();
			var harga = document.getElementById('field-total-harga').value;
			var cnv_harga = convertToAngka(harga);

			var harga_satuan = ( parseInt(cnv_harga) / parseInt(jml_beli) ) / parseInt(isi);
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

				var id_jenis = $('#field-jenis_product').val();
				var id_product;
				var nama_product;
				var brands;
				var units;
				var jml_beli = $('#field-jumlah').val();
				var satuan_beli = $('#field-satuan-beli').val();
				var isi = $('#field-isi').val();
				var total_harga = $('#field-total-harga').val();
				var harga_satuan = $('#field-harga-satuan').val();
				var harga_jual_satuan = $('#field-harga-jual').val();

				if(id_jenis == 'old'){

					id_product = $('#field-product').val();
					nama_product = $('#field-product option:selected').attr('nama');

					if(id_product == '' || jml_beli == 0 || jml_beli == '' || satuan_beli == '' || isi == 0 || isi == '' || total_harga == '' || harga_jual_satuan == '' ){
						Swal.fire({
							icon: 'error',
							title: 'Mohon',
							text: 'Lengkapi Field Yang Tersedia',
						})
					}					
					else{
						addDataToList(id_product , nama_product , jml_beli, satuan_beli, isi , total_harga, harga_satuan , harga_jual_satuan);
					}					

				}

				else if (id_jenis == 'new'){
					// ajax
					brands = $('#field-brands').val();
					units = $('#field-units').val();
					nama_product = $('#field-name_product').val();

					// proses ajax 

					if(units == "new" & brands == "new"){
						var nama_unit = $('#field-new_satuan').val();
						var nama_brand = $('#field-new_merek').val();

						if(id_product == '' || jml_beli == 0 || jml_beli == '' || satuan_beli == '' || isi == 0 || isi == '' || total_harga == '' || harga_jual_satuan == '' || brands == '' || units == '' || nama_product == '' || nama_unit == '' || nama_brand == '' ){
							Swal.fire({
								icon: 'error',
								title: 'Mohon',
								text: 'Lengkapi Field Yang Tersedia',
							})
						}

						else{
							$.ajax({
								url				: '/addSatuan',
								method 		: "get",
								data			: {
									"_token": "{{ csrf_token() }}",
									"name" 	: nama_unit
								},
								dataType	: 'json',
								success		: function(data){

									units = data.id_unit;							
									

									$.ajax({
										url				: '/addMerek',
										method 		: "get",
										data			: {
											"_token": "{{ csrf_token() }}",
											"name" 	: nama_brand
										},
										dataType	: 'json',
										success		: function(data){

											brands = data.id_brand

											dataRequireSaveNewProduct(nama_product, harga_jual_satuan, units, brands, jml_beli, satuan_beli, isi , total_harga, harga_satuan );
										}

									});
								}
							});
						}

						
					}

					else if(units == "new"){
						// ajax brands
						var nama_unit = $('#field-new_satuan').val();

						if(id_product == '' || jml_beli == 0 || jml_beli == '' || satuan_beli == '' || isi == 0 || isi == '' || total_harga == '' || harga_jual_satuan == '' || brands == '' || units == '' || nama_product == '' || nama_unit == ''){
							Swal.fire({
								icon: 'error',
								title: 'Mohon',
								text: 'Lengkapi Field Yang Tersedia',
							})
						}

						else{
							$.ajax({
								url				: '/addSatuan',
								method 		: "get",
								data			: {
									"_token": "{{ csrf_token() }}",
									"name" 	: nama_unit
								},
								dataType	: 'json',
								success		: function(data){
									// console.log(data.id_unit);
									units = data.id_unit;
									
									dataRequireSaveNewProduct(nama_product, harga_jual_satuan, units, brands, jml_beli, satuan_beli, isi , total_harga, harga_satuan );
								}
							})
						}

						;
					}

					else if(brands == "new"){
						// ajax unit
						var nama_brand = $('#field-new_merek').val();

						if(id_product == '' || jml_beli == 0 || jml_beli == '' || satuan_beli == '' || isi == 0 || isi == '' || total_harga == '' || harga_jual_satuan == '' || brands == '' || units == '' || nama_product == '' || nama_brand == '' ){
							Swal.fire({
								icon: 'error',
								title: 'Mohon',
								text: 'Lengkapi Field Yang Tersedia',
							})
						}

						else{
							$.ajax({
								url				: '/addMerek',
								method 		: "get",
								data			: {
									"_token": "{{ csrf_token() }}",
									"name" 	: nama_brand
								},
								dataType	: 'json',
								success		: function(data){
									// console.log(data.id_brand);
									brands = data.id_brand
									dataRequireSaveNewProduct(nama_product, harga_jual_satuan, units, brands, jml_beli, satuan_beli, isi , total_harga, harga_satuan );
								}

							});
						}

						
					}		

					else{

						if(id_product == '' || jml_beli == 0 || jml_beli == '' || satuan_beli == '' || isi == 0 || isi == '' || total_harga == '' || harga_jual_satuan == '' || brands == '' || units == '' || nama_product == ''){
							Swal.fire({
								icon: 'error',
								title: 'Mohon',
								text: 'Lengkapi Field Yang Tersedia',
							})
						}

						else{
							dataRequireSaveNewProduct(nama_product, harga_jual_satuan, units, brands, jml_beli, satuan_beli, isi , total_harga, harga_satuan );
						}
					}		
					
				}

				else{
					Swal.fire({
						icon: 'error',
						title: 'Mohon',
						text: 'Pilih Jenis Product',
					})
				}

			
		}

		function dataRequireSaveNewProduct(name , price , unit , brand, jumlah, satuan, isi , total_harga, harga_satuan){
			// ajax save produk

			$.ajax({
				url				: '/addProduk',
				method 		: "get",
				data			: {
					"_token": "{{ csrf_token() }}",
					"name_product" 	: name,
					"price"					: convertToAngka(price),
					"unit_id"				: unit,
					"brand_id"			: brand
				},
				dataType	: 'json',
				success		: function(data){
					// return data.id_product;

					var id_product = data.id_product;

					addDataToList(id_product , name , jumlah, satuan, isi , total_harga, harga_satuan , price);
				}

			});

			$('#field-product').load("/produk");
			$('#field-units').load("/satuan");
			$('#field-brands').load("/merek");

		}

		function addDataToList(id_product , nama_product , jumlah, satuan, isi , total_harga, harga_satuan , harga_jual){

				var row = $('tbody tr').length;
				var tr = '<tr>'+
												'<td>'+
													'<label for="">Nama Produk</label>'+
													'<input type="text" class="form-control" style="width: 100%;" name="name_product[]" value="'+nama_product+'" readonly>'+
													'<input type="hidden" class="form-control" style="width: 100%;" name="product[]" value="'+id_product+'" readonly>'+ 															//detail_purchase.product
												'</td>'+
												'<td>'+
													'<label for="">Jumlah</label>'+
													'<input type="text" class="form-control" style="width: 100%;" value="'+jumlah+'  '+satuan+'" readonly>'+
													'<input type="hidden" class="form-control" style="width: 100%;" name="amount[]" value="'+jumlah+'" readonly>'+																		//detail_purchase.amount
													'<input type="hidden" class="form-control" style="width: 100%;" name="unit[]" value="'+satuan+'" readonly>'+																			//detail_purchase.unit
												'</td>'+
												'<td>'+
													'<label for="">Isi/Satuan</label>'+
													'<input type="text" class="form-control" style="width: 100%;" value="'+isi+'" readonly>'+	
													'<input type="hidden" class="form-control" style="width: 100%;" name="value[]" value="'+(isi*jumlah)+'" readonly>'+																	//detail_purchase.value (isi * jumlah)
												'</td>'+
												'<td>'+
													'<label for="">Total</label>'+
													'<input type="text" class="form-control" style="width: 100%;" value="'+total_harga+'" readonly>'+						
													'<input type="hidden" class="form-control" style="width: 100%;" name="total_price[]" value="'+convertToAngka(total_harga)+'" readonly>'+						//detail_purchase.total_price
												'</td>'+
												'<td>'+
													'<label for="">Harga Satuan</label>'+
													'<input type="text" class="form-control subTotal" style="width: 100%;" value="'+harga_satuan+'" readonly>'+		
													'<input type="hidden" class="form-control subTotal" style="width: 100%;" name="price_per[]" value="'+convertToAngka(harga_satuan)+'" readonly>'+		//detail_purchase.price_per_seed
												'</td>'+
												'<td>'+
													'<label for="">Harga Jual</label>'+
													'<input type="text" class="form-control subTotal" style="width: 100%;" value="'+harga_jual+'" readonly>'+			
													'<input type="hidden" class="form-control subTotal" style="width: 100%;" name="price_sell[]" value="'+convertToAngka(harga_jual)+'" readonly>'+			
												'</td>'+
												'<td align="center">'+
													'<label for="">Hapus</label>'+
													'<br>'+
													'<a href="#" class="btn btn-danger btn-sm remove" data-harga="'+total_harga+'">X</a>'+
												'</td>'+
								'</tr>';

				$('tbody').append(tr);

				set_total(total_harga);

				$('#field-jumlah').val(0);
				$('#field-satuan-beli').val('');
				$('#field-isi').val(0);
				$('#field-total-harga').val('');
				$('#field-harga-satuan').val('');
				$('#field-harga-jual').val('');
				$('#field-new_satuan').val('');
				$('#field-new_merek').val('');
				$('#field-name_product').val('');
				$('#field-product').val(null).trigger('change');
				$('#field-jenis_product').val(null).trigger('change');
				$('#field-brands').val(null).trigger('change');
				$('#field-units').val(null).trigger('change');


		}

		var total = 0;
		function set_total(subTotal){
			
			total += convertToAngka(subTotal);

			$('#total').val(formatCurrency(total));
			
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
				total = total-convertToAngka(sub);

				$('#total').val(formatCurrency(total));

				$(this).parent().parent().remove();

			}
			
		});
		

		$(document).ready(function() {
        $('#supplier').select2();
        $('#field-jenis_product').select2();
        $('#field-product').select2();
        $('#field-units').select2();
        $('#field-brands').select2();
        $('#field-satuan-beli').select2();
    });

	</script>

@endsection