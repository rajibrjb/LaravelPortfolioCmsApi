@extends('layouts.dashboard')

@section('title')
    AthenaDev | Create User
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
                    Create New User
                </h3>
            </div>
            <div class="kt-portlet__head-toolbar">
                <div class="kt-portlet__head-actions">
                    <a class="btn btn-primary" href="{{ route('users.index') }}"> Back</a>
                </div>
            </div>
        </div>
        <!--begin::Form-->
        <form class="kt-form" method="POST" action="{{ route('users.store') }}">
            @csrf
            <div class="kt-portlet__body">
                <div class="kt-section kt-section--first">
                    <div class="form-group">
                        <label>Full Name:</label>
                        <input type="text" name="name" class="form-control" placeholder="Enter full name">
                        <span class="form-text text-muted">Please enter your full name</span>
                    </div>
                    <div class="form-group">
                        <label>Email address:</label>
                        <input type="email" name="email" class="form-control" placeholder="Enter email">
                        <span class="form-text text-muted">We'll never share your email with anyone else</span>
                    </div>
                    <div class="form-group">
                        <label>Password:</label>
                        <input type="password" name="password" class="form-control" placeholder="Enter Password">
                        <span class="form-text text-muted">We'll never share your email with anyone else</span>
                    </div>
                    <div class="form-group">
                        <label>Password:</label>
                        <input type="password" name="confirm-password" class="form-control" placeholder="Enter Password">
                        <span class="form-text text-muted">We'll never share your email with anyone else</span>
                    </div>

                    <div class="form-group">
                        <label for="exampleSelect2">Roles</label>
                        <div class="kt-checkbox-list">
                            @foreach($roles as $role)
                                <label class="kt-checkbox">
                                    <input value="{{ $role->id }}" name="roles[]" type="checkbox">{{ $role->name }}
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
                    <button type="reset" class="btn btn-secondary">Cancel</button>
                </div>
            </div>
        </form>
        <!--end::Form-->
    </div>


@endsection
