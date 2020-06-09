@extends('layouts.app')

@section('content')
<div class="col-lg-6 offset-lg-3">

    <div class="pull-left">
        <h2>Add new User</h2>
    </div>
    <div class="pull-right">
        <a class="btn btn-sm btn-primary" href="{{ route('users.index') }}"> Back</a>
    </div>

    @if ($errors->any())
    <div class="alert alert-danger">
        There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <hr>

    <form action="{{ route('users.store') }}" method="POST">
        @csrf

        <div class="col justify-content-center">
            <div class="form-group">
                <strong>Last Name:</strong>
                <input type="text" name="last_name" class="form-control" required>
            </div>
        </div>

        <div class="col justify-content-center">
            <div class="form-group">
                <strong>First Name:</strong>
                <input type="text" name="first_name" class="form-control" required>
            </div>
        </div>

        <div class="col justify-content-center">
            <div class="form-group">
                <strong>Second Name:</strong>
                <input type="text" name="second_name" class="form-control" required>
            </div>
        </div>

        <div class="col justify-content-center">
            <div class="form-group">
                <strong>Debt:</strong>
                <input type="text" name="debt" class="form-control" required>
            </div>
        </div>

        <div class="col-lg-2">
            <button type="submit" class="btn btn-success">Submit</button>
        </div>
</div>

</form>

</div>
@endsection