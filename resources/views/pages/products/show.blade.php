@extends('layouts/main')

@section('title', 'Detail produk')

@section('title_pages', 'Detail produk')

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
              <h4 class="card-title">Detail Produk</h4>
            </div>
						<div class="card-body">
							<form method="post" action="/products/{{ $product->id_product }}" enctype="multipart/form-data">
								@method('patch')
                @csrf
								<table class="table table-striped">
									<thead align="center">
										<tr>
											<th scope="col" width="20%">Nama Produk</th>
											<th scope="col" width="10%">Update Gambar <small>( < 1 mb )</small></th>
											<th scope="col" width="10%">Merek</th>
											<th scope="col" width="10%">Harga Satuan</th>
											<th scope="col" width="10%">Satuan</th>
											<th scope="col" width="10%">Stok Lama</th>
											<th scope="col" width="10%">Stok Baru</th>
											<th scope="col" width="10%">Dibuat</th>
											<th scope="col" width="10%">Terakhir Diubah</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>
												<input type="text" class="input-css name" style="width: 100%;" id="name" name="name_product" value="{{ $product->name_product }}" required>
											</td>
											<td>
												<input type="file" style="width: 100%;" id="pict" name="pict" value="">
												<br>
												@if ($product->pict != '')
													<img src="{{ url('/images/produk/'.$product->pict) }}" alt="" style="width: 70px; border-radius : 5px;">
												@else
													<img src="{{ url('/images/produk/no_file.png') }}" alt="" style="width: 70px; border-radius : 5px;">	
												@endif
											</td>
											<td>
												<select name="brand_id" id="select_brand" style="width: 100%;" required>
													<option selected value="">-- Pilih --</option>
													@foreach ($brands as $item)
															<option value="{{ $item->id_brands }}" {{ $product->brand_id == $item->id_brands ? 'selected' : '' }}>{{ $item->name }}</option>
													@endforeach
												</select>
											</td>
											<td>
												<input type="text" class="input-css name" style="width: 100%;" id="price" name="price" value="@currency($product->price)" onkeypress="return hanyaAngka(event)" required>
											</td>
											<td>
												<select name="unit_id" id="select_unit" style="width: 100%;" required>
													<option selected value="">-- Pilih --</option>
													@foreach ($units as $item)
															<option value="{{ $item->id_unit }}" {{ $product->unit_id == $item->id_unit ? 'selected' : '' }}>{{ $item->unit }}</option>
													@endforeach
												</select>
											</td>
											<td>
												<input type="text" class="input-css name" style="width: 100%; border: 1px solid red;" value="{{ $product->stock }}" disabled>
											</td>
											<td>
												<input type="text" class="input-css name" style="width: 100%;" id="stock" name="stock" value="0" onkeypress="return hanyaAngka(event)" required>
											</td>
											<td>
												<input type="text" class="input-css name" style="width: 100%; border: 1px solid red;" value="{{ $product->created_at }}" disabled>
											</td>
											<td>
												<input type="text" class="input-css name" style="width: 100%; border: 1px solid red;" value="{{ $product->updated_at }}" disabled >
											</td>
										</tr>
									</tbody>
								</table>
								<button type="submit" class="btn btn-primary pull-right">Edit</button>
								<a href="/products" class="btn btn-warning">Kembali</a>
							</form>
							<form action="{{ $product->id_product }}" method="POST" class="d-inline" id="delete{{ $product->id_product }}">
								@method('delete')
								@csrf
								<button type="button" data-nama="{{ $product->name_product }}" data-formid="{{ $product->id_product }}" class="btn btn-danger pull-right delete-btn">Hapus</button>
							</form>
						</div>
          </div>
        </div>
			</div>
			
    </div>
	</div>

	<script type="text/javascript">
		$('.delete-btn').on('click', function(e){
			e.preventDefault();
			var self = $(this);
			var nama = $(this).attr("data-nama");
			var formid = $(this).attr("data-formid");
			Swal.fire({
				icon: 'warning',
				title: 'Konfirmasi Hapus',
				text: 'Data Product '+nama+' yakin dihapus ?',
				showCancelButton: true,
				confirmButtonText: 'Yes, Delete !'
			}).then((result) => {
				if (result.value) {
					$("#delete"+formid).submit();
					console.log(formid);
				}
			});
		});
	</script>
	
	<script type="text/javascript">

		function hanyaAngka(evt) {
		  var charCode = (evt.which) ? evt.which : event.keyCode
		   if (charCode > 31 && (charCode < 48 || charCode > 57))
 
		    return false;
		  return true;
		}

		var rupiah = document.getElementById('price');
		rupiah.addEventListener('keyup', function(e){
			// tambahkan 'Rp.' pada saat form di ketik
			// gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
			rupiah.value = formatRupiah(this.value, 'Rp. ');
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

		$(document).ready(function() {
        $('#select_brand').select2();
        $('#select_unit').select2();
    });

	</script>

@endsection