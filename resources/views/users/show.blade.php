@extends('layouts.app')

@section('content')
<div class="text-center">
      <h1>Very Important Official Document</h1>
      <hr>
      <b>{{$user->last_name}} {{$user->first_name}} {{$user->second_name}}</b>
      <br>
      <br>
      His debt: {{$user->debt}} rub.
      <br>
      <br>
      State Fee: {{$user->state_fee}} rub.
    </div>
      @endsection

