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
              <h1>Add New Category</h1>
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
                  <form action="" method="post">
                    {{ csrf_field() }}
                    <div class="card-body">
                      <div class="form-group">
                        <label >Category Name<span style="color: red">*</span></label>
                        <input type="text" class="form-control" required value="{{ old('name') }}" name="name" placeholder="Category Name">
                      </div>
                      <div class="form-group">
                        <label >Slug<span style="color: red">*</span></label>
                        <input type="text" class="form-control" required value="{{ old('slug') }}" name="slug" placeholder="Slug Ex.URL">
                        <div style="color: red">{{ $errors->first('slug') }}</div>
                    </div>
                      <div class="form-group">
                        <label >Status<span style="color: red">*</span></label>
                       <select class="form-control" name="status" required>
                        <option {{ (old('status')== 0) ? 'selected':'' }} value="0">Active</option>
                        <option {{ (old('status')== 1) ? 'selected':'' }}value="1">Inactive</option>
                       </select>
                      </div>

                      <hr>
                      <div class="form-group">
                        <label >Meta Title<span style="color: red">*</span></label>
                        <input type="text" class="form-control" required value="{{ old('meta_title') }}" name="meta_title" placeholder="meta title">
                      </div>
                      <div class="form-group">
                        <label >Meta Description</label>
                        <textarea class="form-control" required value="{{ old('meta_description') }}" name="meta_description" placeholder="meta description"></textarea>
                      </div>
                      <div class="form-group">
                        <label >Meta Keywords</label>
                        <input type="text" class="form-control" required value="{{ old('meta_keywords') }}" name="meta_keywords" placeholder="meta keywords">
                      </div>


                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary">Submit</button>
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
