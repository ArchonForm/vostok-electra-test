@extends('layouts.app')

@section('content')
    <div class="container">

        <a href="{{route('users.create')}}" class="btn btn-primary">Add new User</a>
   <br>
   <br>
   <a href="{{route('exportXLS')}}" class="btn btn-success">Save table to XLS</a>
   <br>
   <br>
        <table class="table table-stripped">
            <thead class="text-center">
                <th>id</th>
                <th>Last Name</th>
                <th>First Name</th>
                <th>Second Name</th>
                <th>Debt</th>
                <th>State Fee</th>
                <th>Download PDF</th>

            </thead>
            <tbody class="text-center">
                @foreach ($users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td><a target="_blank" href="{{ route('users.show',$user->id) }}">{{$user->last_name}}</a></td>
                    <td><a target="_blank" href="{{ route('users.show',$user->id) }}">{{$user->first_name}}</a></td>
                    <td><a target="_blank" href="{{ route('users.show',$user->id) }}">{{$user->second_name}}</a></td>
                    <td>{{$user->debt}}</td>
                    <td>{{$user->state_fee}}</td>
                    <td><a href="{{action('UsersController@exportPDF', $user->id)}}"><span class="btn btn-info btn-xs fas fa-file-pdf"></span></a></td>

                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="3">
                        <ul class="pagination pull-right">
                            {{$users->links()}}
                        </ul>
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>
@endsection