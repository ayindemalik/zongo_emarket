@extends('admin.admin_master')
@section('admin')

  <!-- Content Wrapper. Contains page content -->
  {{-- <div class="content-wrapper"> --}}
    <div class="container-full">
      

      <!-- Main content -->
      <section class="content">
        <div class="row">

          <div class="col-6">
            <div class="box">
               <div class="box-header with-border">
                 <h3 class="box-title">Edit Brand</h3>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                <form method="post" action="{{ route('admin.brand.update', $brand->id) }}" enctype="multipart/form-data">
                  @csrf    
                  <div class="form-group">
                    <input type="hidden" class="form-control" name="id" value="{{ $brand->id }}">
                    <input type="hidden" class="form-control" name="old_image" value="{{ $brand->brand_image }}">
                      <div class="row">
                          <div class="col-12">
                              <label>Brand Name English<span class="text-danger">*</span></label>
                              <div class="input-group">
                                <div class="input-group-addon">
                                    {{-- <i class="fa fa-user"></i> --}}
                                </div>
                                <input type="text"  name= "brand_name_en" class="form-control" value="{{ $brand->brand_name_en }}">
                              </div>
                              @error('brand_name_en')
                                <span class="text-danger">{{ $message }}</span>
                              @enderror
                          </div>
                      </div>

                      <div class="row">
                          <div class="col-12">
                              <label>Brand Name French <span class="text-danger">*</span></label>
                              <div class="input-group">
                                <div class="input-group-addon">
                                    {{-- <i class="fa fa-user"></i> --}}
                                </div>
                                <input type="text" class="form-control" name="brand_name_fr" value="{{ $brand->brand_name_fr }}">
                              </div>
                              @error('brand_name_fr')
                                <span class="text-danger">{{ $message }}</span>
                              @enderror
                          </div>
                      </div>  

                      <div class="row">
                          <div class="col-12">
                              <label>Brand Name Image<span class="text-danger">*</span></label>
                              <div class="input-group">
                                <div class="input-group-addon">
                                    {{-- <i class="fa fa-user"></i> --}}
                                </div>
                                <input type="file" class="form-control" name="brand_image" value="">
                              </div>
                              @error('brand_image')
                                <span class="text-danger">{{ $message }}</span>
                              @enderror
                          </div>
                      </div>
                  </div>

                  <div class="text-xs-right">
                      <input type="submit" class="btn btn-primary btn-rounded mb-5" value="Save Update">
                  </div>
              </form>
               </div>
               <!-- /.box-body -->
             </div>     
           </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </section>
      <!-- /.content -->
    
    </div>
{{-- </div> --}}
<!-- /.content-wrapper -->

@endsection