@extends('layouts.dashboard')

@section('title')
    AthenaDev | Create Role
@endsection
@section('content')

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <div class="kt-portlet">
        <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
                <h3 class="kt-portlet__head-title">
                    Create New Role
                </h3>
            </div>
        </div>

        <!--begin::Form-->
        <form class="kt-form" method="POST" action="{{ route('roles.store') }}">
            @csrf
            <div class="kt-portlet__body">
                <div class="kt-section kt-section--first">

                    <div class="form-group">
                        <label for="exampleSelects">Role Name</label>
                        <input  name="name" type="text" class="form-control" placeholder="Enter your Role Name">
                    </div>

                    <div class="form-group">
                        <label>Permissions:</label>
                        <div class="kt-checkbox-list">
                            @foreach($permission as $value)
                                <label class="kt-checkbox">
                                    <input value="{{ $value->id}}" name="permission[]" type="checkbox">{{ $value->name}}
                                    <span></span>
                                </label>
                            @endforeach
                        </div>

                    </div>

                </div>
            </div>
            <div class="kt-portlet__foot">
                <div class="kt-form__actions">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>

        <!--end::Form-->
    </div>



@endsection
