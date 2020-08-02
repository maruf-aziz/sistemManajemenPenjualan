@extends('layouts/main')

@section('title', 'Retur Penjualan')

@section('title_pages', 'Retur Penjualan')

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
              <h4 class="card-title">Retur Penjualan</h4>              
            </div>
            <div class="card-body">
							<a href="/retur_penjualan/create" class="btn btn-success"><i class="material-icons">create</i> Buat Retur Penjualan</a>
              <table class="table table-striped table-bordered" id="transaksi" style="width:100%">
                <thead>
                  <tr>
                    <th scope="col" width="5%">#</th>
                    <th scope="col" width="15%">Pelanggan</th>
                    <th scope="col" width="10%">Tanggal Transaksi</th>
                    <th scope="col" width="10%">Tanggal Retur</th>
                    <th scope="col" width="20%">Deskripsi</th>
                    <th scope="col" width="20%">Produk</th>
                    <th scope="col" width="10%">Qty</th>
                    <th scope="col" width="10%">Total</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($retur as $item)
											<tr>
												<td>{{ $loop->iteration }}</td>
												<td>{{ $item->pelanggan }}</td>
												<td>{{ $item->dibuat }}</td>
												<td>{{ $item->tgl_retur }}</td>
												<td>{{ $item->desc }}</td>
												<td>{{ $item->name_product }}</td>
												<td>{{ $item->qty }}</td>
												<td>@currency($item->harga)</td>
											</tr>
									@endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
	</div>
	
	<script type="text/javascript">

		
	// hapus brands
		$('.delete-btn-brands').on('click', function(e){
			e.preventDefault();
			var self = $(this);
			var nama = $(this).attr("data-nama");
			var formid = $(this).attr("data-formid");
			Swal.fire({
				icon: 'warning',
				title: 'Konfirmasi Hapus',
				text: 'Data Merek '+nama+' yakin dihapus ?',
				showCancelButton: true,
				confirmButtonText: 'Yes, Delete !'
			}).then((result) => {
				if (result.value) {
					$("#del_brands"+formid).submit();
					console.log(formid);
				}
			});
		});

	// hapus units
		$('.delete-btn-unit').on('click', function(e){
			e.preventDefault();
			var self = $(this);
			var nama = $(this).attr("data-nama");
			var formid = $(this).attr("data-formid");
			Swal.fire({
				icon: 'warning',
				title: 'Konfirmasi Hapus',
				text: 'Data Unit '+nama+' yakin dihapus ?',
				showCancelButton: true,
				confirmButtonText: 'Yes, Delete !'
			}).then((result) => {
				if (result.value) {
					$("#del_unit"+formid).submit();
					console.log(formid);
				}
			});
		});
	</script>

@endsection