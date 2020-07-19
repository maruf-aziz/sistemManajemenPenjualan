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
                    </tr>
										<tr>
											<td colspan="2">
                        <label for="">Tanggal</label>
                        <br>
                        <input type="text" class="input-css name" style="width: 50%;" value="{{ date('D, d-M-Y') }}" disabled>
											</td>
                    </tr>
										<tr>
											<td colspan="2">
                        <label for="">No Transaksi</label>
                        <br>
                        <input type="text" class="input-css name" style="width: 50%;" value="{{ $new_id+1 }}" disabled>
											</td>
                    </tr>
                    <tr>
                      <td colspan="7">          
                        <div class="row">
                          <div class="col-md-2">
                            <label for="">Nama Brang</label>
                            <input type="text" class="input-css name" style="width: 100%;" id="field-nama" value="">
                          </div>
                          <div class="col-md-2">
                            <label for="">Satuan</label>
                            <select name="" id="field-units" style="width: 100%" onchange="cekSatuan()">
                              <option selected value="">-- Satuan --</option>
                              <option value="new">Tambah Satuan</option>
                            </select>
                          </div>
                          <div class="col-md-2">
                            <label for=""><small>Harga Satuan</small></label>
                            <input type="text" class="input-css name" style="width: 100%;" id="field-harga" value="" onkeypress="return hanyaAngka(event)" >
                          </div>
                          <div class="col-md-2">
                            <label for="">Jumlah</label>
                            <input type="text" class="input-css name" style="width: 100%;" id="field-jumlah" onkeypress="return hanyaAngka(event)">
                          </div>
                          <div class="col-md-1">
                            <label for=""><small>Disc %</small></label>
                            <input type="text" class="input-css name" style="width: 100%;" id="field-disc" value="0" onkeypress="return hanyaAngka(event)" maxlength="2">
                          </div>
                          <div class="col-md-2">
                            <label for=""><small>Total Harga</small></label>
                            <input type="text" class="input-css name" style="width: 100%;" id="field-total" value="" onkeypress="return hanyaAngka(event)">
                          </div>
                          <div class="col-md-1" style="margin-top: 5px;">
                            <button type="button" class="btn btn-primary mt-3 addRow"><i class="material-icons">add_shopping_cart</i></button>
                          </div>
                        </div>
                        {{-- <button type="button" id="tambahItem" class="btn btn-primary pull-right mt-5 addRow">Tambah Item</button> --}}
                      </td>
                    </tr>
									</tbody>
									<tfoot>
										<tr>
											<td colspan="5"></td>	
											<td colspan="1">
												<label for="">Total Akhir</label>
												<input type="text" class="form-control bg-white" style="width: 100%;" id="total" name="total_cost" value="" readonly required>
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

		var rupiah = document.getElementById('field-harga');
		rupiah.addEventListener('keyup', function(e){
			rupiah.value = formatRupiah(this.value, 'Rp. ');
		});

		var rupiah2 = document.getElementById('field-total');
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

        var nama          = $('#field-nama').val();
        var satuan        = $('#field-units').val();
        var nama_satuan   = $('#field-units option:selected').attr('nama');
        var harga         = $('#field-harga').val();
        var jumlah        = $('#field-jumlah').val();
        var disc          = $('#field-disc').val();
        var total_harga   = $('#field-total').val();	

        if(nama == '' | satuan == '' | harga == '' | jumlah == '' | total_harga == ''){
          Swal.fire({
            icon: 'error',
            title: 'Mohon',
            text: 'Lengkapi Field Yang Tersedia',
          })
        }
        else{
          addDataToList(nama,satuan,nama_satuan,harga,jumlah,disc,total_harga);
        }
 		
		}

		function addDataToList(nama,satuan,nama_satuan,harga,jumlah,disc,total_harga){

				var row = $('tbody tr').length;
				var tr = '<tr>'+
												'<td>'+
													'<label for="">Nama Produk</label>'+
													'<input type="text" class="form-control bg-white" style="width: 100%;" name="name_product[]" value="'+nama+'" readonly>'+
												'</td>'+
												'<td>'+
													'<label for="">Satuan</label>'+
													'<input type="text" class="form-control bg-white" style="width: 100%;" value="'+nama_satuan+'" readonly>'+
                        '<input type="hidden" class="form-control" style="width: 100%;" name="unit_id[]" value="'+satuan+'" readonly>'+
												'</td>'+
												'<td>'+
													'<label for="">Harga Satuan</label>'+													
                          '<input type="text" class="form-control bg-white" style="width: 100%;" value="'+harga+'" readonly>'+	
                          '<input type="hidden" class="form-control" style="width: 100%;" name="price_per[]" value="'+convertToAngka(harga)+'" readonly>'+	
												'</td>'+
												'<td>'+
													'<label for="">Jumlah</label>'+
													'<input type="text" class="form-control bg-white" style="width: 100%;" name="amount[]" value="'+jumlah+'" readonly>'+
												'</td>'+
												'<td>'+
													'<label for="">Disc </label>'+
													'<input type="text" class="form-control bg-white subTotal" style="width: 100%;" name="disc[]" value="'+disc+' %" readonly>'+
												'</td>'+
												'<td>'+
													'<label for="">Harga Jual</label>'+					
													'<input type="text" class="form-control bg-white subTotal" style="width: 100%;" value="'+total_harga+'" readonly>'+
													'<input type="hidden" class="form-control subTotal" style="width: 100%;" name="price_sell[]" value="'+convertToAngka(total_harga)+'" readonly>'+			
												'</td>'+
												'<td align="center">'+
													'<label for="">Hapus</label>'+
													'<br>'+
													'<a href="#" class="btn btn-danger btn-sm remove" data-harga="'+total_harga+'">X</a>'+
												'</td>'+
								'</tr>';

				$('tbody').append(tr);

				set_total(total_harga);

				$('#field-jumlah').val('');
				$('#field-nama').val('');
				$('#field-harga').val('');
				$('#field-disc').val(0);
				$('#field-total').val('');
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
    });

	</script>

@endsection