@extends('layout.master')

@section('content')
<div class="account-container">
	
	<div class="content clearfix">
		
		<form action="/log-masuk" method="post">
		
			<h1>Log Masuk</h1>		
			
			<div class="login-fields">
				
				<p>Sila masukkan maklumat yang betul</p>
				{{ csrf_field() }}
				<div class="field">
					<label for="username">No. KP</label>
					<input type="text" id="username" name="no_kp" value="" placeholder="No. KP" class="login username-field" />
				</div> <!-- /field -->
				
				<div class="field">
					<label for="password">Kata Laluan:</label>
					<input type="password" id="password" name="kata_laluan" value="" placeholder="Kata laluan" class="login password-field"/>
				</div> <!-- /password -->
				
				@include('layout.error_status')
			</div> <!-- /login-fields -->
			
			<div class="login-actions">
				<button class="button btn btn-success btn-large">Log Masuk</button>				
			</div> <!-- .actions -->
		</form>
		
	</div> <!-- /content -->
	
</div> <!-- /account-container -->

@endsection