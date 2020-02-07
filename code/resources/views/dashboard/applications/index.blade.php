@extends('layouts.main-template')

@section('title', '| Dashboard')


@section('content')
<div class="columns is-marginless is-multiline">
	<div class="column is-12">

		@include('partials.session-message')

		@component('components.notification', 
		[ 'style' => 'success', 
		'class' => 'column is-4 is-offset-4 has-text-centered'])
		<!--  This is a notification -->
		@endcomponent


		<div class="row">
			<div class="col-12">
				<div class="card-header">
				</div>
				<div class="card">
					<div class="card-header">
						<h4>List of Application</h4>

					</div>

					<div class="card-body"> 

						<div class="table-responsive">
							<table class="table table-striped table-bordered">
								<thead>
									<tr>
										<th>Tracking Number</th>
										<th>Filed</th>
										<th>Program</th>
										<th>Graduation Date</th>            
										<th>Received</th>
										<th>Status</th>

									</tr>
								</thead>
								<tr>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
										
									</tr>
								</table>
							</div>
						</div>
					</div>
				</div>


		</div>
	</div>
	@endsection