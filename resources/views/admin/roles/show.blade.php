@extends('layouts.dashboard')

@section('title')
    AthenaDev | Role
@endsection
@section('content')

    <div class="kt-portlet">

        <!--begin::Form-->
        <form class="kt-form">

            <div class="kt-portlet__body">
                <div class="kt-section kt-section--first">

                    <div class="form-group">
                        <label for="exampleSelects">Role Name</label>
                        <input  name="name" type="text" class="form-control" value="{{$role->name}}">
                    </div>

                    <div class="form-group">
                        <label>Permissions:</label>
                        <div class="kt-checkbox-list">
                            @foreach($rolePermissions as $value)
                                <label class="kt-checkbox">
                                    <input checked name="permission[]" type="checkbox">{{ $value->name}}
                                    <span></span>
                                </label>
                            @endforeach
                        </div>

                    </div>

                </div>
            </div>
        </form>

        <!--end::Form-->
    </div>

@endsection
