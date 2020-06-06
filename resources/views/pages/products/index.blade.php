@extends('layouts/main')

@section('title', 'Products')

@section('title_pages', 'Products')

@section('content')

  <div class="content">
    <div class="container-fluid">
      @if (session('status'))
          <div class="alert alert-success">
              {{ session('status') }}
          </div>
      @endif

      <div class="row">
        <div class="col-md-6">
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title">Brands</h4>
            </div>
            
            <div class="card-body">
							<a href="/brands/create" class="btn btn-success"><i class="material-icons">create</i> Tambah</a>
              <table class="table table-hover display" style="width:100%">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Merek</th>
                    <th scope="col" width="200px">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($brands as $item)
											<tr>
												<td>{{ $loop->iteration }}</td>
												<td>{{ $item->name }}</td>
												<td>
													<a href="" class=" btn btn-info btn-sm">Edit</a>
													{{-- <a href="" class=" btn btn-danger btn-sm">Hapus</a> --}}
													<form action="/brands/{{ $item->id_brands }}" method="POST" class="d-inline" id="del_brands{{ $item->id_brands }}">
														@method('delete')
														@csrf
														<button type="button" data-nama="{{ $item->name }}" data-formid="{{ $item->id_brands }}" class="btn btn-danger delete-btn-brands">Hapus</button>
													</form>
												</td>
											</tr>
									@endforeach
                </tbody>
              </table>
            </div>
          </div>
				</div>
				
        <div class="col-md-6">
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title">Units</h4>
            </div>
            
            <div class="card-body">
							<a href="/units/create" class="btn btn-success"><i class="material-icons">create</i> Tambah</a>
              <table class="table table-hover display" style="width:100%">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Unit</th>
                    <th scope="col" width="200px">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($units as $item)
											<tr>
												<td>{{ $loop->iteration }}</td>
												<td>{{ $item->unit }}</td>
												<td>
													<a href="" class=" btn btn-info btn-sm">Edit</a>
													{{-- <a href="" class=" btn btn-danger btn-sm">Hapus</a> --}}
													<form action="/units/{{ $item->id_unit }}" method="POST" class="d-inline" id="del_unit{{ $item->id_unit }}">
														@method('delete')
														@csrf
														<button type="button" data-nama="{{ $item->unit }}" data-formid="{{ $item->id_unit }}" class="btn btn-danger delete-btn-unit">Hapus</button>
													</form>
												</td>
											</tr>
									@endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title">Products</h4>              
            </div>
            <div class="card-body">
							<a href="" class="btn btn-success"><i class="material-icons">create</i> Tambah</a>
              <table class="table table-hover display" style="width:100%">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Merek</th>
                    <th scope="col">Satuan</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Stok</th>
                    <th scope="col">Dibuat</th>
                    <th scope="col">Diubah</th>
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