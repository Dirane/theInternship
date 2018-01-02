@extends('layouts.app')

@section('content')
	<div class="container">
	<div class="row">

		<div class="col col-xs-12 col-sm-6 col-md-8 col-lg-8">
		<div class="blog-header">
	        <h1 class="blog-title">{{ $company->name }}</h1>
			<span> <img src="{{ $company->logo }}" alt="{{ $company->logo }}" class="img-circle"></span>
	        <span>@lang('word.email') : {{ $address->email }} </span><br>
	        <span>@lang('word.tel'): {{ $address->telephone }} </span><br>
	        <span>@lang('word.country') : {{ $address->country->name }} </span><br>
	        <span>@lang('sentence.internship_duration') {{ $company->duration }} </span><br>
	        <span>@lang('sentence.app_period') {{ $company->application_period }} </span><br>
	        <span>@lang('sentence.num_interns'): {{ $company->intern_number }} </span><br>
			<span><a href="http://{{ $company->website}}" target="blank">{{ $company->website }} </a> </span>
	        <hr>
      	</div>
	
			<center><h3 class="center"> @lang('sentence.company_details')</h3></center>
			<p>{{ $company->description }}</p>
			
		</div>
		
		<div class="col col-xs-6 col-md-4 col-lg-4">
			<h2>@lang('word.map')</h2>
			<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
			<h1> @lang('sentence.related_company') </h1>
				<!-- <p> {{ $address }} </p> -->
				Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
				cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
				proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
		
		{{-- @foreach($CompanyHasCategories as $CompanyHasCategory)
							{{ $CompanyHasCategory->category->name }}
						@endforeach --}}
		</div>
		
	</div>
</div>	

@endsection