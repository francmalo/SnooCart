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
              <h1>Edit Color</h1>
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
                  <form action="{{ route('color.update', $color->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    {{-- <input type="hidden" name="_method" value="PUT"> --}}
                    <div class="card-body">
                      <div class="form-group">
                        <label >Color Name<span style="color: red">*</span></label>
                        <input type="text" class="form-control" required value="{{ old('name',$color->name) }}" name="name" placeholder="color Name">
                      </div>
                      <div class="form-group">
                        <label >Color Code<span style="color: red">*</span></label>
                        <input type="color" class="form-control" required value="{{ old('code',$color->code) }}" name="code" placeholder="Color Code">
                    </div>
                      <div class="form-group">
                        <label >Status<span style="color: red">*</span></label>
                       <select class="form-control" name="status" required>
                        <option value="0" {{ $color->status == 0 ? 'selected' : '' }}>Active</option>
                        <option value="1" {{ $color->status == 1 ? 'selected' : '' }}>Inactive</option>
                        {{-- <option {{ (old('status',$getRecord->status)== 0) ? 'selected':'' }} value="0">Active</option>
                        <option {{ (old('status',$getRecord->status)== 1) ? 'selected':'' }}value="1">Inactive</option> --}}
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
