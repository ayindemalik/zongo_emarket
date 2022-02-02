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
                 <h3 class="box-title">Edit Category</h3>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                <form method="post" action="{{ route('admin.category.update', $category->id) }}" enctype="multipart/form-data">
                  @csrf    
                  <div class="form-group">
                    <input type="hidden" class="form-control" name="id" value="{{ $category->id }}">
                    
                      <div class="row">
                          <div class="col-12">
                              <label>Category Name English<span class="text-danger">*</span></label>
                              <div class="input-group">
                                <div class="input-group-addon">
                                    {{-- <i class="fa fa-user"></i> --}}
                                </div>
                                <input type="text"  name= "category_name_en" class="form-control" value="{{ $category->category_name_en }}">
                              </div>
                              @error('category_name_en')
                                <span class="text-danger">{{ $message }}</span>
                              @enderror
                          </div>
                      </div>

                      <div class="row">
                          <div class="col-12">
                              <label>Category Name French <span class="text-danger">*</span></label>
                              <div class="input-group">
                                <div class="input-group-addon">
                                    {{-- <i class="fa fa-user"></i> --}}
                                </div>
                                <input type="text" class="form-control" name="category_name_fr" value="{{ $category->category_name_fr }}">
                              </div>
                              @error('category_name_fr')
                                <span class="text-danger">{{ $message }}</span>
                              @enderror
                          </div>
                      </div>  

                      <div class="row">
                          <div class="col-12">
                              <label>Category Icon<span class="text-danger">*</span></label>
                              <div class="input-group">
                                <div class="input-group-addon">
                                    {{-- <i class="fa fa-user"></i> --}}
                                </div>
                                <input type="text" class="form-control" name="category_icon" value="{{ $category->category_icon }}">
                              </div>
                              @error('category_icon')
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