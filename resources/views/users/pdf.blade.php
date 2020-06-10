<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="utf-8">
    <title>{{$user->last_name}} {{$user->first_name}} {{$user->second_name}}</title>
  </head>
  <body style="text-align:center">

      <h2>Very Important Official Document</h2>
      <hr>
      <b>{{$user->last_name}} {{$user->first_name}} {{$user->second_name}}</b>
      <br>
      <br>
      His debt: {{$user->debt}} rub.
      <br>
      <br>
      State Fee: {{$user->state_fee}} rub.
      
  </body>
</html>

