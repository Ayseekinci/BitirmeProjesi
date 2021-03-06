@extends('admin.layout.master')
@section('title', 'Admin | Users')
@section('head')
<link rel="stylesheet" href="{{ mix('css/admin/buttons.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ mix('css/admin/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ mix('css/admin/dataTables.bootstrap4.min.css') }}">
@endsection
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Users</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body">
                <table id="info-table" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Lastname</th>
                        <th>Email</th>
                        <th>Type</th>
                        <th>Register Date</th>
                        <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td><img style="border-radius: 50%;" src="/img/50x50.png" ></td>
                            <td>{{ $user->name }}</td>
                            <td>{{$user->surname}}</td>
                            <td>{{ $user->email }}</td>
                            <td> <span class="badge badge-{{ $user->isAdmin == 1 ? 'success' : 'warning'  }}">{{ $user->isAdmin == 1 ? 'Admin' : 'User' }}</span> </td>
                            <td>{{ $user->created_at .' ('.timeConvert($user->created_at).')' }}</td>
                            <td>
                              <div style="display: flex; justify-content: center; align-items: center">
                                <a style="margin-right: .5rem; margin-bottom: .5rem" href="{{ route('admin.user-update', $user->id) }}" class="btn btn-info btn-sm">View</a>
                                <a style="margin-bottom: .5rem" href="#" class="btn btn-danger btn-sm">Delete</a>
                              </div>
                            </td>
                        </tr>
                    @endforeach
                  </tbody>
                  <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Lastname</th>
                        <th>Email</th>
                        <th>Type</th>
                        <th>Register Date</th>
                        <th></th>
                    </tr>
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
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->

@endsection
@section('scripts')
<script src="{{ mix('js/admin/jquery.dataTables.min.js') }}"></script>
<script src="{{ mix('js/admin/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ mix('js/admin/dataTables.responsive.min.js') }}"></script>
<script src="{{ mix('js/admin/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ mix('js/admin/dataTables.buttons.min.js') }}"></script>
<script src="{{ mix('js/admin/buttons.bootstrap4.min.js') }}"></script>
<script>
    $(function () {
      $('#info-table').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
  </script>
@endsection
