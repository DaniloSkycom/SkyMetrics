@extends('layouts.app')
@section('title','Inicio')
@section('menu')
    @include('menu.admin')
@endsection
@section('content')
	<h1>Hola mundo</h1>

	<div class="fluid-content">
		<div class="row">
			<div class="col-12">
				<table class="table">
					<thead>
						<tr>
							<th>agent_log_id</th>
							<th>user</th>
							<th>server_ip</th>
							<th>event_time</th>
							<th>lead_id</th>
							<th>campaign_id</th>
							<th>pause_epoch</th>
							<th>pause_sec</th>
							<th>wait_epoch</th>
							<th>wait_sec</th>
							<th>talk_epoch</th>
							<th>talk_sec</th>
							<th>dispo_epoch</th>
							<th>dispo_sec</th>
							<th>status</th>
							<th>user_group</th>
							<th>comments</th>
							<th>sub_status</th>
							<th>dead_epoch</th>
							<th>dead_sec</th>
							<th>processed</th>
							<th>uniqueid</th>
							<th>pause_type</th>
						</tr>
					</thead>
					<tbody>
						@foreach($listHoras_madrugada AS $horas)

							<tr>
								<td>{{ $horas["agent_log_id"] }}</td>
								<td>{{ $horas["user"] }}</td>
								<td>{{ $horas["server_ip"] }}</td>
								<td>{{ $horas["event_time"] }}</td>
								<td>{{ $horas["lead_id"] }}</td>
								<td>{{ $horas["campaign_id"] }}</td>
								<td>{{ $horas["pause_epoch"] }}</td>
								<td>{{ $horas["pause_sec"] }}</td>
								<td>{{ $horas["wait_epoch"] }}</td>
								<td>{{ $horas["wait_sec"] }}</td>
								<td>{{ $horas["talk_epoch"] }}</td>
								<td>{{ $horas["talk_sec"] }}</td>
								<td>{{ $horas["dispo_epoch"] }}</td>
								<td>{{ $horas["dispo_sec"] }}</td>
								<td>{{ $horas["status"] }}</td>
								<td>{{ $horas["user_group"] }}</td>
								<td>{{ $horas["comments"] }}</td>
								<td>{{ $horas["sub_status"] }}</td>
								<td>{{ $horas["dead_epoch"] }}</td>
								<td>{{ $horas["dead_sec"] }}</td>
								<td>{{ $horas["processed"] }}</td>
								<td>{{ $horas["uniqueid"] }}</td>
								<td>{{ $horas["pause_type"] }}</td>
							</tr>

						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>

@endsection