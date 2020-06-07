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
              <table class="table table-hover" id="transaksi" style="width:100%">
                <thead>
                  <tr>
                    <th scope="col" width="5%">#</th>
                    <th scope="col" width="25%">Pelanggan</th>
                    <th scope="col" width="20%">Tanggal</th>
                    <th scope="col" width="10%">Disc</th>
                    <th scope="col" width="10%">PPN</th>
                    <th scope="col" width="15%">Total</th>
                    <th scope="col" width="15%">Petugas</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($transactions as $item)
											<tr>
												<td>{{ $loop->iteration }}</td>
												<td><a href="/transactions/{{ $item->id_tr }}" class="btn btn-outline-primary btn-sm">{{ $item->pelanggan }}</a></td>
												<td>{{ $item->dibuat }}</td>
												<td>{{ $item->disc }} %</td>
												<td>@currency($item->tax)</td>
												<td>@currency($item->total_cost)</td>
												<td>{{ $item->petugas }}</td>
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