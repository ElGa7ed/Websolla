<!DOCTYPE html>
<html>

<head>
    <title>Laravel 9</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/jquery-editable/css/jquery-editable.css"
        rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" rel="stylesheet" />
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/jquery-editable/js/jquery-editable-poshytip.min.js">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
</head>
<style type="text/css">
    .container h2,
    .panel-info {
        margin-top: 80px;
        line-height: 50px;
    }
</style>

<body>
    <div class="container mt-5 pt-5">

        <br>
        <br>
        <div class="row mt-5">
            <div class="col-md-10 offset-md-1 mt-5">
                <table id="table" class="table table-bordered">
                    <thead>
                        <tr>
                            <th width="30px">#</th>
                            <th>Name</th>
                            <th>Birthdates</th>
                            <th>Created At</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="tablecontents">
                        <!-- get all data from Table by Controller -->
                        @foreach ($sections as $section)
                            <tr class="row1" data-id="{{ $section->id }}">
                                <td class="pl-3"><i class="fa fa-sort"></i></td>
                                <td>
                                    <a href="" class="update" data-name="name" data-type="text"
                                        data-pk="{{ $section->id }}" data-title="Enter name">{{ $section->name }}</a>
                                </td>
                                <td>
                                    <a href="" class="update" data-name="birthdates" data-type="text"
                                        data-pk="{{ $section->id }}"
                                        data-title="Enter birthdates">{{ $section->birthdates }}</a>
                                </td>
                                <td>
                                    <a href="" class="update" data-name="created_at" data-type="text"
                                        data-pk="{{ $section->id }}"
                                        data-title="Enter created_at">{{ $section->created_at }}</a>
                                </td>
                                <td>
                                    <a class="deleteSection btn btn-xs btn-danger"
                                        data-id="{{ $section->id }}">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <hr>
                
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-md-10 offset-md-1">

                <table id="table_two" class="table table-bordered">
                    <thead>
                        <tr>
                            <th width="30px">#</th>
                            <th>Name</th>
                            <th>Birthdates</th>
                            <th>Created At</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="table_twocontents">
                        <!-- get all data from Table by Controller -->
                        @foreach ($sections_two as $section)
                            <tr class="row2" data-id="{{ $section->id }}">
                                <td class="pl-3"><i class="fa fa-sort"></i></td>
                                <td>
                                    <a href="" class="update_two" data-name="name" data-type="text"
                                        data-pk="{{ $section->id }}" data-title="Enter name">{{ $section->name }}</a>
                                </td>
                                <td>
                                    <a href="" class="update_two" data-name="birthdates" data-type="text"
                                        data-pk="{{ $section->id }}"
                                        data-title="Enter birthdates">{{ $section->birthdates }}</a>
                                </td>
                                <td>
                                    <a href="" class="update_two" data-name="created_at" data-type="text"
                                        data-pk="{{ $section->id }}"
                                        data-title="Enter created_at">{{ $section->created_at }}</a>
                                </td>
                                <td>
                                    <a class="deleteSection_two btn btn-xs btn-danger"
                                        data-id="{{ $section->id }}">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <hr>
                
            </div>
        </div>
    </div>

    {{-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.12/datatables.min.js"></script>
    <script type="text/javascript">
        $(function() {
            $("#table").DataTable();
            // this is need to Move Ordera accordin user wish Arrangement
            $("#tablecontents").sortable({
                items: "tr",
                cursor: 'move',
                opacity: 0.6,
                update: function() {
                    sendOrderToServer();
                }
            });

            function sendOrderToServer() {
                var order = [];
                var token = $('meta[name="csrf-token"]').attr('content');
                //   by this function User can Update hisOrders or Move to top or under
                $('tr.row1').each(function(index, element) {
                    order.push({
                        id: $(this).attr('data-id'),
                        position: index + 1
                    });
                });
                // the Ajax Post update 
                $.ajax({
                    type: "POST",
                    dataType: "json",
                    url: "{{ url('section-sortable') }}",
                    data: {
                        order: order,
                        _token: token
                    },
                    success: function(response) {
                        if (response.status == "success") {
                            console.log(response);
                        } else {
                            console.log(response);
                        }
                    }
                });
            }
        });
    </script>
    <script type="text/javascript">
        $.fn.editable.defaults.mode = 'inline';

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        });

        $('.update').editable({
            url: "{{ route('section.update') }}",
            type: 'text',
            pk: 1,
            name: 'name',
            title: 'Enter name'
        });

        $(".deleteSection").click(function() {
            $(this).parents('tr').hide();
            var id = $(this).data("id");
            var token = '{{ csrf_token() }}';
            $.ajax({
                method: 'POST',
                url: "section/delete/" + id,
                data: {
                    _token: token
                },
                success: function(data) {
                    toastr.success('Successfully!', 'Delete');
                }
            });
        });
    </script>

        <script type="text/javascript">
        $.fn.editable.defaults.mode = 'inline';

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        });

        $('.update_two').editable({
            url: "{{ route('section.update_two') }}",
            type: 'text',
            pk: 1,
            name: 'name',
            title: 'Enter name'
        });

        $(".deleteSection_two").click(function() {
            $(this).parents('tr').hide();
            var id = $(this).data("id");
            var token = '{{ csrf_token() }}';
            $.ajax({
                method: 'POST',
                url: "section/delete_two/" + id,
                data: {
                    _token: token
                },
                success: function(data) {
                    toastr.success('Successfully!', 'Delete');
                }
            });
        });
    </script>


    <script type="text/javascript">
        $(function() {
            $("#table_two").DataTable();
            // this is need to Move Ordera accordin user wish Arrangement
            $("#table_twocontents").sortable({
                items: "tr",
                cursor: 'move',
                opacity: 0.6,
                update: function() {
                    sendOrderToServer();
                }
            });

            function sendOrderToServer() {
                var order = [];
                var token = $('meta[name="csrf-token"]').attr('content');
                //   by this function User can Update hisOrders or Move to top or under
                $('tr.row2').each(function(index, element) {
                    order.push({
                        id: $(this).attr('data-id'),
                        position: index + 1
                    });
                });
                // the Ajax Post update 
                $.ajax({
                    type: "POST",
                    dataType: "json",
                    url: "{{ url('section_two-sortable') }}",
                    data: {
                        order: order,
                        _token: token
                    },
                    success: function(response) {
                        if (response.status == "success") {
                            console.log(response);
                        } else {
                            console.log(response);
                        }
                    }
                });
            }
        });
    </script>
    
</body>

</html>
