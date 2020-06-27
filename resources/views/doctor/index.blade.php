@extends('layouts.back.main')

@section('title')
  <div class="row mb-2">
    <div class="col-sm-6">
      <h1>@lang('menu.home.index')</h1>
    </div>
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item active">@lang('menu.home.index')</li>
      </ol>
    </div>
  </div>
@endsection

@section('content')
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">DataTable with default features</h3>
            </div>
                <!-- /.card-header -->
                     <div class="card-body">
                      <table id="doctors" style="width: 100%" class="table table-bordered table-striped ">
                        <thead> 
                    <tr>
                    <th style="width: 10px">#</th>
                    <th>Nama</th>
                    <th>STR</th>
                    <th>Title</th>
                    <th>Place</th>
                    <th>Addres</th>
                    <th>Graduated</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($doctors as $item)
                  <tr>
                    <td>{{ $loop->index + 1 }}</td>
                    <td>{{ $item->user->name }}</td>
                    <td>{{ $item->str }}</td>
                    <td>{{ $item->title }}</td>
                    <td>{{ $item->place }}</td>
                    <td>{{ $item->address }}</td>
                    <td>{{ $item->graduated }}</td>
                    <td>
                     <a href="#" class="btn btn-info btn-sm">
                         <i class="fas fa-edit"></i>
                      </a>
                        <form action="#" method="post" class="d-inline">
                          {{--  @method('delete')  --}}
                              <button class="btn btn-danger btn-sm">
                                <i class="fas fa-trash"></i>
                             </button>
                            </form>
                    </td>
                  </tr>
                   @endforeach
                </tbody>
                  <tfoot>
                    <tr>
                    <th> No </th>
                    <th>Nama</th>
                    <th>STR</th>
                    <th>Title</th>
                    <th>Place</th>
                    <th>Addres</th>
                    <th>Graduated</th>
                    <th>Action</th>
                    </tr>
                 </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection

@section('css')
  <!--  data table  -->
  <link rel="stylesheet" href="{{ asset('end/back/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('end/back/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
@endsection

@section('js')
  <!--  data table  -->
  <script src="{{ asset('end/back/plugins/datatables/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('end/back/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('end/back/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
  <script src="{{ asset('end/back/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>

  <script>
        $(function () {
        
        $('#doctors').DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": true,
        "responsive": true,
      });
    });
  </script>

@endsection