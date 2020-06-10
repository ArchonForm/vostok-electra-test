@extends('layouts.app')

@section('content')
    <div class="container">

        <a href="{{route('users.create')}}" class="btn btn-primary">Add new User</a>
   <br>
   <br>
   <a href="{{route('export_xls')}}" class="btn btn-success">Save table to XLS</a>
   <br>
   <br>
        <table class="table table-stripped table-bordered">
            <thead class="thead-dark text-center">
                <th>id</th>
                <th>Last Name</th>
                <th>First Name</th>
                <th>Second Name</th>
                <th>Debt</th>
                <th>State Fee</th>
                <th>PDF actions</th>

            </thead>
            <tbody class="text-center">
                @foreach ($users as $user)
                <tr>
                    <td class="align-middle">{{$user->id}}</td>
                    <td class="align-middle"><a target="_blank" href="{{action('UsersController@storePDF', $user->id)}}">{{$user->last_name}}</a></td>
                    <td class="align-middle"><a target="_blank" href="{{action('UsersController@storePDF', $user->id)}}">{{$user->first_name}}</a></td>
                    <td class="align-middle"><a target="_blank" href="{{action('UsersController@storePDF', $user->id)}}">{{$user->second_name}}</a></td>
                    <td class="align-middle">{{$user->debt}}</td>
                    <td class="align-middle">{{$user->state_fee}}</td>
                    <td class="align-middle">
                    <a href="{{action('UsersController@exportPDF', $user->id)}}"><span class="btn btn-info btn-xs fas fa-file-pdf" style="width:140px;font-size:14px;margin:5px"> Download PDF</span></a><br>
                    <a target="_blank" href="{{action('UsersController@storePDF', $user->id)}}" onclick="return confirm('Are you sure you want store PDF file to database and open it?')"><span class="btn btn-danger btn-xs fas fa-file-pdf" style="width:140px;font-size:14px;margin:5px"> Store PDF to DB</span></a>                    
                </td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="7">
                        <ul class="pagination pull-right">
                            {{$users->links()}}
                        </ul>
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>
@endsection