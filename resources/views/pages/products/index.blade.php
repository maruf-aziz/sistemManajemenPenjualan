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
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  
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
							<a href="" class="btn btn-success"><i class="material-icons">create</i> Tambah</a>
              <table class="table table-hover display" style="width:100%">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Unit</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  
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

@endsection