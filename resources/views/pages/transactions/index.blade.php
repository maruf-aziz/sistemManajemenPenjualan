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
        <div class="col-12">
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title">Transaksi Penjualan</h4>              
            </div>
            <div class="card-body">
							<a href="/transactions/create" class="btn btn-success"><i class="material-icons">create</i> Tambah</a>
              <table class="table table-hover display" style="width:100%">
                <thead>
                  <tr>
                    <th scope="col" width="5%">#</th>
                    <th scope="col" width="25%">Nama</th>
                    <th scope="col" width="20%">Merek</th>
                    <th scope="col" width="15%">Harga</th>
                    <th scope="col" width="10%">Stok</th>
                    <th scope="col" width="10%">Satuan</th>
										<th scope="col" width="15%">Update Terakhir</th>
                  </tr>
                </thead>
                <tbody>
                  
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