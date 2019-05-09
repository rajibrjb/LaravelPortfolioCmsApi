@extends('layouts.dashboard')
@section('title')
    AthenaDev | All User
@endsection
@section('style')
    <link rel="stylesheet" href="{{ asset('assets/vendors/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
@endsection


@section('content')


    <div class="kt-portlet kt-portlet--mobile">
        <div class="kt-portlet__head kt-portlet__head--lg">
            <div class="kt-portlet__head-label">
										<span class="kt-portlet__head-icon">
											<i class="kt-font-brand flaticon2-line-chart"></i>
										</span>
                <h3 class="kt-portlet__head-title">
                    Users Table
                </h3>
            </div>
            <div class="kt-portlet__head-toolbar">
                <div class="kt-portlet__head-wrapper">
                    <div class="kt-portlet__head-actions">
                        <a href="{{ route('users.create') }}" class="btn btn-brand btn-elevate btn-icon-sm">
                            <i class="la la-plus"></i>
                            Create New User
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="kt-portlet__body">
            <table class="table table-striped- table-bordered table-hover table-checkable" id="users_datatable">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Roles</th>
                    <th>Actions</th>
                </tr>
                </thead>
                {{--<tbody>--}}
                {{--@foreach ($data as $key => $user)--}}
                    {{--<tr>--}}
                        {{--<td>{{ ++$i }}</td>--}}
                        {{--<td>{{ $user->id }}</td>--}}
                        {{--<td>{{ $user->name }}</td>--}}
                        {{--<td>{{ $user->email }}</td>--}}
                        {{--<td>--}}
                            {{--@if(!empty($user->getRoleNames()))--}}
                                {{--@foreach($user->getRoleNames() as $v)--}}
                                    {{--<label class="badge badge-success">{{ $v }}</label>--}}
                                {{--@endforeach--}}
                            {{--@endif--}}
                        {{--</td>--}}
                        {{--<td>--}}
                            {{--<a class="btn btn-brand btn-elevate btn-pill btn-elevate-air" href="{{ route('users.show',$user->id) }}">Show</a>--}}
                            {{--<a class="btn btn-brand btn-elevate btn-pill btn-elevate-air" href="{{ route('users.edit',$user->id) }}">Edit</a>--}}
                            {{--<a href="{{ route('users.destroy', [$user->id]) }}" class="btn btn-brand btn-elevate btn-pill btn-elevate-air" onclick="return confirm('Are you sure?')">Delete</a>--}}
                        {{--</td>--}}
                    {{--</tr>--}}
                {{--@endforeach--}}
                {{--</tbody>--}}
            </table>
            {{--<div class="row"><div class="col-sm-12 col-md-5"><div class="dataTables_info" id="kt_table_1_info" role="status" aria-live="polite">Showing {{ $data->firstItem() }}  to {{ $data->lastItem() }}  of  {{ $data->total() }} entries </div></div>--}}
                {{--<div class="col-sm-12 col-md-7 dataTables_pager">--}}
                    {{--<div class="dataTables_paginate paging_simple_numbers" id="kt_table_1_paginate">--}}
                        {{--{{ $data->links() }}--}}
                    {{--</div></div></div>--}}
        </div>
        <!--end: Datatable -->
    </div>



@endsection

@section('script')

    {{--<!--begin::Page Vendors(used by this page) -->--}}
    {{--<script src="../assets/vendors/custom/datatables/datatables.bundle.js" type="text/javascript"></script>--}}
    <script src="{{ asset('assets/vendors/custom/datatables/datatables.bundle.js') }}" type="text/javascript"></script>
    {{--<!--end::Page Vendors -->--}}

    {{--<!--begin::Page Scripts(used by this page) -->--}}
    <script src="{{ asset('assets/app/custom/general/crud/datatables/basic/basic.js') }}" type="text/javascript"></script>
    {{--<script src="../assets/app/custom/general/crud/datatables/basic/basic.js" type="text/javascript"></script>--}}
    <script>
        $(document).ready( function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('#users_datatable').DataTable({
                processing: true,
                responsive:true,
                serverSide: true,
                ajax: {
                    url: "{{ url('users-list') }}",
                    type: 'GET',
                },
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'name', name: 'name' },
                    { data: 'email', name: 'email' },
                    { data: 'roles' ,responsivePriority: -1},
                    {data: 'action',name: 'action',
                        orderable: false },
                ],
                columnDefs: [
                    {
                        targets: -1,
                        title: 'Actions',
                        orderable: false,
                        render: function(data, type, full, meta) {
                            return data;
                        },
                    },
                    {
                        targets: -2,
                        // defaultContent: "None",
                        render: function(data, type, full, meta) {
                            var k = 0;
                            var g;
                            //
                            // for(g in data) {
                            //
                            //     if (data[g].name != null && data[g].name !== 'undefined') {
                            //          console.log(g);
                            //     }
                            //
                            // }
                            // if(data.isEmpty()) {
                            //     return k;
                            // } else {
                            //     return '<span class="kt-badge ' + data[0].name + ' kt-badge--inline kt-badge--pill"></span>';
                            // }
                            var result = "";
                            for (var p in data) {
                                if( data.hasOwnProperty(p) ) {
                                    result += " <span class=\"btn btn-primary btn-pill\">" + data[p].name + "</span>";
                                }
                            }
                            return result;
                            // return console.log(data);


                        },
                    },
                    // {
                    //     targets: -2,
                    //     render: function(data, type, full, meta) {
                    //         var status = {
                    //             1: {'title': 'Online', 'state': 'danger'},
                    //             2: {'title': 'Retail', 'state': 'primary'},
                    //             3: {'title': 'Direct', 'state': 'success'},
                    //         };
                    //         if (typeof status[data] === 'undefined') {
                    //             return data;
                    //         }
                    //         return '<span class="kt-badge kt-badge--' + status[data].state + ' kt-badge--dot"></span>&nbsp;' +
                    //             '<span class="kt-font-bold kt-font-' + status[data].state + '">' + status[data].title + '</span>';
                    //     },
                    // },
                ],
            });
        });

        $('#btnFiterSubmitSearch').click(function(){
            $('#laravel_datatable').DataTable().draw(true);
        });

    </script>
@endsection
