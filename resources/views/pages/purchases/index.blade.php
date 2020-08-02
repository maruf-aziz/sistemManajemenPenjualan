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
        <div class="col-12">
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title">Transaksi Pembelian Barang</h4>              
            </div>
            <div class="card-body">
							<a href="/purchases/create" class="btn btn-success"><i class="material-icons">create</i> Tambah</a>
              <table class="table table-striped table-bordered" id="transaksi" style="width:100%">
                <thead>
                  <tr>
                    <th scope="col" width="15%">#</th>
                    <th scope="col">Supplier</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Total</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($purchases as $item)
					  <tr>
						  <td>{{ $loop->iteration }}</td>
						  <td><a href="/purchases/{{ $item->id }}" class="btn btn-outline-info">{{ $item->name }}</a></td>
						  <td>{{ $item->created_at }}</td>
						  <td>@currency($item->total_cost)</td>
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