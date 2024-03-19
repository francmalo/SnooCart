<!-- Content Wrapper. Contains page content -->
@extends('admin.layouts.app')

@section('style')

@endsection
@section('content')
<div class="content-wrapper">

     <!-- Content Header (Page header) -->
     <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-12">
              <h1>Edit Product</h1>
            </div>

          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">

            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-primary">

                  <!-- /.card-header -->
                  <!-- form start -->
                  <form action="{{ route('product.update', $product->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    {{-- <input type="hidden" name="_method" value="PUT"> --}}
                    <div class="card-body">
                      <div class="form-group">
                        <label >Product Name<span style="color: red">*</span></label>
                        <input type="text" class="form-control" required value="{{ old('title',$category->title) }}" name="title" placeholder="Title">
                      </div>
                     
                     

                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                  </form>
                </div>
                <!-- /.card -->


              </div>
          </div>


        </div>
      </section>
      <!-- /.content -->

</div>

@endsection
@section('script')

@endsection
