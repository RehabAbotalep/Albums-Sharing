@extends('admin.layout.index')
@section('style')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
@endsection
@section('content')
    <div class="card">
        <div class="card-header">
            <a class="btn btn-primary" href="{{route('permissions.create')}}">Add new permission</a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>CreatedAt</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @forelse ($permissions as $permission)
                    <tr>
                        <td>{{$loop->index+1}}</td>
                        <td>{{$permission->name}}</td>
                        <td>{{ \Carbon\Carbon::parse($permission->created_at)->diffForHumans() }}</td>
                        <td>
                            <a href="{{route('permissions.edit', $permission->id)}}"><i class="fas fa-edit"></i></a>&nbsp;&nbsp;
                            <form id="delete-form-{{$permission->id}}" action="{{route('permissions.destroy',$permission->id)}}" style="display: none;" method="post">
                                {{csrf_field()}}
                                {{method_field('DELETE')}}
                            </form>
                            <a href="#" onclick="if(confirm('Are You Sure, Delete This')){
                                event.preventDefault;
                                document.getElementById('delete-form-{{$permission->id}}').submit();
                                }else{
                                event.preventDefault;
                                }
                                ">
                                <i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                @empty
                    <p>No permissions yet</p>
                @endforelse

                </tbody>
                <tfoot>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>CreatedAt</th>
                    <th>Actions</th>
                </tr>
                </tfoot>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
@endsection
@section('script')
    <!-- DataTables  & Plugins -->
    <script src="{{asset('admin/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('admin/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
    <script src="{{asset('admin/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{asset('admin/plugins/jszip/jszip.min.js')}}"></script>
    <script src="{{asset('admin/plugins/pdfmake/pdfmake.min.js')}}"></script>
    <script src="{{asset('admin/plugins/pdfmake/vfs_fonts.js')}}"></script>
    <script src="{{asset('admin/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{asset('admin/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
    <script src="{{asset('admin/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
    <script>
        $(function () {
            $("#example1").DataTable({
                "responsive": true, "lengthChange": false, "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
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
