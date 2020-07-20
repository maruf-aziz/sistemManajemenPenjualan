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
							<form action="/retur_penjualan" method="POST">
                @csrf
                <div class="form-group">
                  <label for="">Pelanggan</label>
                  <br>
                  <input type="text" class="input-css" value="{{ $transactions->pelanggan }}" disabled>
                </div>
                <div class="form-group">
                  <label for="">Tanggal</label>
                  <br>
                  <input type="text" class="input-css" value="{{ date('D, d-M-Y') }}" disabled>
                </div>
                <div class="form-group">
                  <label for="">Id Retur</label>
                  <br>
                  <input type="text" class="input-css" value="{{ $new_id + 1 }}" disabled>
                </div>
                <div class="form-group">
                  <label for="">Deskripsi Retur</label>
                  <br>
                  <input type="hidden" name="id_transaksi" value="{{ $transactions->id_tr }}">
                  <textarea name="desc" id="" style="width: 40%" rows="4" class="input-css"></textarea>
                </div>
                <div class="form-group">
                  <table class="table table-bordered" id="list">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Produk</th>
                        <th scope="col">Merek</th>
                        <th scope="col">Harga Satuan</th>
                        <th scope="col">Qty</th>
                        <th scope="col">Total</th>
                        <th scope="col"><input type="checkbox" id="master"></th>
                      </tr>
                    </thead>
                    <tbody>
                      {{-- <tr>
                        <th scope="row">1</th>
                        <td><input type="text" value="Mark" name="name[]"></td>
                        <td><input type="text" value="otto" name="name2[]"></td>
                        <td>@mdo</td>
                        <td><input type="checkbox" class="sub_chk" id="sub_chk" name="chk[]" value="1"></td>
                      </tr> --}}

                      @foreach ($detail as $item)
                          <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->name_product }} <input type="hidden" name="product[]" id="" value="{{ $item->product_id }}"></td>
                            <td>{{ $item->name }}</td>
                            <td>@currency($item->unit_price) /{{ $item->unit }} <input type="hidden" name="harga[]" id="" value="{{ $item->unit_price }}"></td>
                            <td>{{ $item->amount }} <input type="hidden" name="qty[]" id="" value="{{ $item->amount }}"></td>
                            <td>@currency($item->subTotal) <input type="hidden" name="total[]" id="" value="{{ $item->SubTotal }}"></td>
                            <td>
                              <input type="checkbox" class="sub_chk" id="sub_chk" name="chk[]" value="1">
                            </td>
                          </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>

                <div class="form-group">
                  <button type="submit" class="btn btn-success addRetur" id="addRetur">Tambahkan List Retur</button>
                </div>

              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <script>
    $(document).ready(function() {
        $('#id_tr').select2();

        $('#master').on('click', function(e) {
         if($(this).is(':checked',true))  
         {
            $(".sub_chk").prop('checked', true); 
         } else {  
            $(".sub_chk").prop('checked',false); 
         }  
        });

        $('.addRetur').on('click', function(e) {
            var allVals = [];  
            $(".sub_chk:checked").each(function() {

                var x = {
                  'nama_awal' : $(this).attr('data-nama'),
                  'nama_akhir' : $(this).attr('data-nama2')
                }

                allVals.push(x);
            }); 

            // console.log(allVals);

            $.ajax({
								url				: '/cek',
								method 		: "post",
								data			: {
									"_token": "{{ csrf_token() }}",
									"data" 	: allVals
								},
								dataType	: 'json',
								success		: function(data){
									console.log(data.status);
								}

							});
        });


    });
  </script>

@endsection