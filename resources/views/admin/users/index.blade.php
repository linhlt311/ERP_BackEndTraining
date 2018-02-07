@extends('admin.layout.dashboard')

@section('content')

    <section class="content-header">
        <h1>
            Employee List
        </h1>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover display" id="userTable">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Gender</th>
                            <th>Email</th>
                            <th>Phone number</th>
                            <th>Address</th>
                            <th>JLPT level</th>
                            <th>Show</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Gender</th>
                            <th>Email</th>
                            <th>Phone number</th>
                            <th>Address</th>
                            <th>JLPT level</th>
                            <th>Show</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @foreach ($employees as $employee)
                            <tr>
                                <td>{{$employee->id}}</td>
                                <td>{{$employee->name}}</td>
                                <td>{{($employee->gender)?"Male":"Female"}}</td>
                                <td>{{$employee->email}}</td>
                                <td>{{$employee->phone_number}}</td>
                                <td>{{$employee->address}}</td>
                                <td>{{$employee->JLPT}}</td>
                                <td>
                                    <a href="{{url('user')}}/{{$employee->id}}">
                                        <button class="btn btn-primary btn-sm">
                                            <i class="fa fa-th-list"></i>
                                        </button>
                                    </a>
                                </td>
                                <td>
                                    <a href="{{url('user')}}/{{$employee->id}}/edit">
                                        <button class="btn btn-warning btn-sm">
                                            <i class="fa fa-edit"></i>
                                        </button>
                                    </a>
                                </td>
                                <td>
                                    <form action="" method="post">
                                        {{csrf_field()}}
                                        <input name="_method" type="hidden" value="DELETE">
                                        <button type="submit" data-id="{{$employee->id}}" class="btn btn-danger btn-sm">
                                            <i class="fa fa-trash-o"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{ $employees->links() }}
                </div>
                <!-- /.box-body -->
                <a href="{{route('user.create')}}">
                    <button class="btn btn-success"><i class="fa fa-fw fa-plus"></i>Add new</button>
                </a>
            </div>
            <!-- /.box -->
        </div>
        </div>
    </section>
@endsection

@section('javascript')
    <script>
        $(document).ready(function () {
            $('#userTable').DataTable({
                paging: false,
                info: false,
            });
        });
    </script>
    <script>
        $(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $(document).on('click', '.btn-danger', function (e) {
                e.preventDefault();
                var id = $(this).data('id');
                console.log(id);
                var btn = $(this);

                swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover data!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                    .then((willDelete) = > {
                    if(willDelete) {
                        $.ajax({
                            type: 'delete',
                            url: 'user/' + id,
                            success: function (response) {
                                toastr.success('Deleted success');
                                btn.parent().parent().parent().fadeOut('slow');
                            },
                        });
                    }
                }
            )
                ;
            });

        });

    </script>

@endsection
