@extends('layouts.master')
@section('content')
	<div class="container">		
		<div class="panel panel-primary">
		  <div class="panel-heading">
		    <h3 class="panel-title" style="padding:12px 0px;font-size:25px;"><strong>Pdf Rendered for monthly invoice</strong></h3>
		  </div>
		  <div class="panel-body">
		  	
		  	<table>
		  		<tr>
		  			<th>Name</th>
		  		<th>Email</th>
		  		<th>Salary</th>
		  		<th>Tax</th>
		  		</tr>
		  
		  		@foreach($data as $val)
		  		
		  		<tr>
		  			
		  			<td>{{$val->name}}</td>
		  			<td>{{$val->email}}</td>
		  			<td>{{$val->salary}}</td>
		  			<td>{{$val->tax}}</td>
		  		</tr>
		  		
		  		@endforeach
		  	</table>


		  </div>
		</div>
	</div>

	@endsection

