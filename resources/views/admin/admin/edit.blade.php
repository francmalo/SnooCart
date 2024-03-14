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
              <h1>Edit Admin</h1>
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
                  {{-- <form action="{{ url('update-category/' .  $getRecord->id) }}" method="post"> --}}
                  {{-- <form action="{{ url('update-category/', $getRecord->id) }}" method="post"> --}}
                    {{-- <form action="{{ route('admin.category.update', $getRecord->id) }}" method="post"> --}}
                        <form action="" method="post">
                    {{ csrf_field() }}
                    {{-- <input type="hidden" name="_method" value="PUT"> --}}
                    <div class="card-body">
                      <div class="form-group">
                        <label >Name</label>
                        <input type="text" class="form-control" value="{{ old('name',$getRecord->name) }}" name="name" required placeholder="Enter Name">
                      </div>
                      <div class="form-group">
                        <label >Email</label>
                        <input type="email" class="form-control"   value="{{ old('email',$getRecord->email) }}" name="email" required placeholder="Enter Email">
                        <div style="color: red">{{ $errors->first('email') }}</div>
                    </div>
                      <div class="form-group">
                        <label >Password</label>
                        <input type="password" class="form-control" name="password"  placeholder="Password">
                        <p>Do you want to change password?</p>
                      </div>
                      <div class="form-group">
                        <label >Status</label>
                        <select class="form-control" name="status" required>
                            <option value="0" {{ $getRecord->status == 0 ? 'selected' : '' }}>Active</option>
                            <option value="1" {{ $getRecord->status == 1 ? 'selected' : '' }}>Inactive</option>
                        </select>

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
