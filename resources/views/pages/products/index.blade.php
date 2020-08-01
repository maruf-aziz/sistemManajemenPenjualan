@extends('layouts/main')

@section('title', 'Produk')

@section('title_pages', 'Produk')

@section('content')

  <div class="content">
    <div class="container-fluid">
      @if (session('status'))
          <div class="alert alert-success">
              {{ session('status') }}
          </div>
      @endif

      <div class="row">
				@if (auth()->user()->role == 'admin')
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
														<a href="#" class=" btn btn-info btn-sm" data-toggle="modal" data-target="#editModalBrand{{ $item->id_brands }}">Edit</a>
														{{-- <a href="" class=" btn btn-danger btn-sm">Hapus</a> --}}
														<form action="/brands/{{ $item->id_brands }}" method="POST" class="d-inline" id="del_brands{{ $item->id_brands }}">
															@method('delete')
															@csrf
															<button type="button" data-nama="{{ $item->name }}" data-formid="{{ $item->id_brands }}" class="btn btn-danger btn-sm delete-btn-brands">Hapus</button>
														</form>
													</td>
												</tr>

												{{-- modal edit --}}
												<div class="modal fade" id="editModalBrand{{ $item->id_brands }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
													<div class="modal-dialog">
														<div class="modal-content">
															<div class="modal-header">
																<h5 class="modal-title" id="exampleModalLabel">Edit Merek</h5>
																<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																	<span aria-hidden="true">&times;</span>
																</button>
															</div>
															<div class="modal-body">
																<form method="POST" action="/brands/{{ $item->id_brands }}">
																	@method('patch')
																	@csrf	
																	<div class="form-group">
																		<label for="name">Nama Merek</label>
																		<input type="text" class="input-css" id="name" name="name" value="{{ $item->name }}" style="width: 100%" required>
																	</div>
																	<div class="modal-footer">
																		<button type="button" class="btn btn-outline-secondary btn-sm" data-dismiss="modal">Close</button>
																		<button type="submit" class="btn btn-outline-primary btn-sm">Simpan Perubahan</button>
																	</div>
																</form>
															</div>														
														</div>
													</div>
												</div>
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
														<a href="" class=" btn btn-info btn-sm" data-toggle="modal" data-target="#editModalUnit{{ $item->id_unit }}">Edit</a>
														{{-- <a href="" class=" btn btn-danger btn-sm">Hapus</a> --}}
														<form action="/units/{{ $item->id_unit }}" method="POST" class="d-inline" id="del_unit{{ $item->id_unit }}">
															@method('delete')
															@csrf
															<button type="button" data-nama="{{ $item->unit }}" data-formid="{{ $item->id_unit }}" class="btn btn-danger btn-sm delete-btn-unit">Hapus</button>
														</form>
													</td>
												</tr>

												{{-- modal edit --}}
												<div class="modal fade" id="editModalUnit{{ $item->id_unit }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
													<div class="modal-dialog">
														<div class="modal-content">
															<div class="modal-header">
																<h5 class="modal-title" id="exampleModalLabel">Edit Satuan</h5>
																<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																	<span aria-hidden="true">&times;</span>
																</button>
															</div>
															<div class="modal-body">
																<form method="POST" action="/units/{{ $item->id_unit }}">
																	@method('patch')
																	@csrf	
																	<div class="form-group">
																		<label for="name">Nama Satuan</label>
																		<input type="text" class="input-css" id="unit" name="unit" value="{{ $item->unit }}" style="width: 100%" required>
																	</div>
																	<div class="modal-footer">
																		<button type="button" class="btn btn-outline-secondary btn-sm" data-dismiss="modal">Close</button>
																		<button type="submit" class="btn btn-outline-primary btn-sm">Simpan Perubahan</button>
																	</div>
																</form>
															</div>														
														</div>
													</div>
												</div>
										@endforeach
									</tbody>
								</table>
							</div>
						</div>
					</div>
				@endif
        
      </div>

      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title">Products</h4>              
            </div>
            <div class="card-body">
							@if (auth()->user()->role == 'admin')
									<a href="/products/create" class="btn btn-success"><i class="material-icons">create</i> Tambah</a>
							@endif
							
              <table class="table table-hover display" style="width:100%">
                <thead>
                  <tr>
                    <th scope="col" width="5%">#</th>
                    <th scope="col" width="15%">Nama</th>
                    <th scope="col" width="10%">No. lot</th>
                    <th scope="col" width="5%">Exp</th>
                    <th scope="col" width="15%">Merek</th>
                    <th scope="col" width="15%">Harga</th>
                    <th scope="col" width="10%">Stok</th>
                    <th scope="col" width="10%">Satuan</th>
										<th scope="col" width="15%">Update Terakhir</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($products as $item)
											<tr>
												<td>{{ $loop->iteration }}</td>
												
												@if (auth()->user()->role == 'admin')
														<td><a href="/products/{{ $item->id_product }}" class="btn btn-outline-primary btn-sm">{{ $item->name_product }}</a></td>
												@else
														<td>{{ $item->name_product }}</td>
												@endif
												
												<td>{{ $item->lot != null ? $item->lot : '-' }}</td>
												<td>{{ $item->exp != null ? $item->exp : '-' }}</td>
												<td>{{ $item->name != null ? $item->name : '-' }}</td>
												<td>@currency($item->price)</td>
												<td>{{ $item->stock }}</td>
												<td>{{ $item->unit }}</td>
												<td>{{ $item->updated_at }}</td>
												
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