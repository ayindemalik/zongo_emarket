@extends('admin.admin_master')
@section('admin')

  <!-- Content Wrapper. Contains page content -->
  {{-- <div class="content-wrapper"> --}}
    <div class="container-full">
      <!-- Content Header (Page header) -->
      {{-- <div class="content-header">
          <div class="d-flex align-items-center">
              <div class="mr-auto">
                  <h3 class="page-title">Data Tables</h3>
                  <div class="d-inline-block align-items-center">
                      <nav>
                          
                      </nav>
                  </div>
              </div>
          </div>
      </div> --}}

      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-8">
           <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title">Brand</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                  <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                          <tr>
                              <th>Brand En</th>
                              <th>Brand Fr</th>
                              <th>Image</th>
                              <th>Action</th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach ($brands as $item )
                            <tr>
                              <td>{{ $item->brand_name_en }}</td>
                              <td>{{ $item->brand_name_fr }}</td>
                              <td>
                                <img src ="{{ asset($item->brand_image) }}" style="width: 70px; heigth: 40px">
                              </td>
                              <td>
                                <a href="{{ route('admin.brand.edit', $item->id) }}" class="btn btn-info" title ="Edit">
                                  <i class="fa fa-pencil"></i></a>
                                <a href="{{ route('admin.brand.delete', $item->id) }}" class="btn btn-danger" id="delete_brand" title ="Delete">
                                  <i class="fa fa-trash"></i></a>
                              </td>
                            </tr>
                          @endforeach 
                          
                      </tbody>
                     
                    </table>
                  </div>
              </div>
              <!-- /.box-body -->
            </div>     
          </div>

          {{-- ADD BRAND --}}

          <div class="col-4">
            <div class="box">
               <div class="box-header with-border">
                 <h3 class="box-title">Add Brand</h3>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                <form method="post" action="{{ route('admin.brand.store') }}" enctype="multipart/form-data">
                  @csrf    
                  <div class="form-group">
                      
                      <div class="row">
                          <div class="col-12">
                              <label>Brand Name English<span class="text-danger">*</span></label>
                              <div class="input-group">
                                <div class="input-group-addon">
                                    {{-- <i class="fa fa-user"></i> --}}
                                </div>
                                <input type="text"  name= "brand_name_en" class="form-control" value="">
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
                                <input type="text" class="form-control" name="brand_name_fr" value="">
                              </div>
                              @error('brand_name_fr')
                                <span class="text-danger">{{ $message }}</span>
                              @enderror
                          </div>
                      </div>  

                      <div class="row">
                          <div class="col-12">
                              <label>Brand Image<span class="text-danger">*</span></label>
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
                      <input type="submit" class="btn btn-primary btn-rounded mb-5" value="Save Brand">
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