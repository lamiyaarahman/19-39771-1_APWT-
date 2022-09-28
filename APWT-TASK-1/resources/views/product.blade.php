@extends('layouts.app')
@section('content')



<h2>Products List</h2>
<table class="table table-border">
@foreach($names as $names)
<tr>
<td><li>{{$names}}</li></td>
</tr>
@endforeach



@endsection