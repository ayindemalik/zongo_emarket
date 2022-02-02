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
                <h3 class="box-title">Category</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                  <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                          <tr>
                              <th>Category Icon</th>
                              <th>Category En</th>
                              <th>Category Fr</th>
                              <th>Action</th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach ($categories as $item )
                            <tr>
                              <td><span><i class="{{ $item->category_icon }}"></i></span></td>
                              <td>{{ $item->category_name_en }}</td>
                              <td>{{ $item->category_name_fr }}</td>
                              <td>
                                <a href="{{ route('admin.category.edit', $item->id) }}" class="btn btn-info" title ="Edit">
                                  <i class="fa fa-pencil"></i></a>
                                <a href="{{ route('admin.category.delete', $item->id) }}" class="btn btn-danger" id="delete_category" title ="Delete">
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
                 <h3 class="box-title">Add Category</h3>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                <form method="post" action="{{ route('admin.category.store') }}">
                  @csrf    
                  <div class="form-group">
                      
                      <div class="row">
                          <div class="col-12">
                              <label>Category Name English<span class="text-danger">*</span></label>
                              <div class="input-group">
                                <div class="input-group-addon">
                                    {{-- <i class="fa fa-user"></i> --}}
                                </div>
                                <input type="text"  name= "category_name_en" class="form-control" value="">
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
                                <input type="text" class="form-control" name="category_name_fr" value="">
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
                                <input type="text" class="form-control" name="category_icon" value="">
                              </div>
                              @error('category_icon')
                                <span class="text-danger">{{ $message }}</span>
                              @enderror
                          </div>
                      </div>
                  </div>

                  <div class="text-xs-right">
                      <input type="submit" class="btn btn-primary btn-rounded mb-5" value="Save Category">
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