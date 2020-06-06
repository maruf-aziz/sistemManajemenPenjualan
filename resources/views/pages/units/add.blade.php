@extends('layouts/main')

@section('title', 'Satuan')

@section('title_pages', 'Satuan')

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
              <h4 class="card-title">Tambah Satuan</h4>
            </div>
						
						<div class="container">
							<div class="card-body">
								<form method="post" action="/units" enctype="multipart/form-data">
									@csrf
									<table class="table table-striped">
										<thead align="center">
											<tr>
												<th scope="col">Nama Satuan</th>
												<th scope="col" width="100px">
													<a href="#" class="btn btn-success addRow">+</a>
												</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>
													<input type="text" class="name" style="width: 100%;" id="name" name="name[]" value="" required>
												</td>
												<td align="center">
													<a href="#" class="btn btn-danger remove">X</a>
												</td>
											</tr>
										</tbody>
									</table>
									<button type="submit" class="btn btn-primary pull-right">Simpan</button>
									<a href="/products" class="btn btn-warning">Back</a>
								</form>
							</div>
						</div>
          </div>
        </div>
			</div>
			
    </div>
	</div>
	
	<script type="text/javascript">
		$('.addRow').on('click', function(){
			addRow();
		});

		function addRow(){
			var row = $('tbody tr').length;
			var tr = '<tr>'+
							'<td><input type="text" class="name" style="width: 100%;" id="name'+row+'" name="name[]" value="" required></td>'+
							'<td align="center"><a href="#" class="btn btn-danger remove">X</a></td>'+
							'</tr>';

			$('tbody').append(tr);
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
				$(this).parent().parent().remove();
			}
			
		});

	</script>

@endsection