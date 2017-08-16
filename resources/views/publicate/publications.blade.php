@extends('layouts.app')

@section('content')
	<div class="container-fluid">
		<div class="row">
				<div class="col-md-12">
					<form class="form-inline col-md-9 col-md-offset-3" action="/searchResults/" method="GET">
						<select name="cities" class="form-control">
						<option value="0"> Ciudad </option>
							@foreach($cities as $c)
								<option value="{{ $c->id }}"> {{ ucfirst($c->city) }}</option>
							@endforeach
						</select>
						<input type="date" name="beginDate"  class="form-control">
						<input type="date" name="endDate" class="form-control">
						<select name="typepets" class="form-control">
            	<option value="0"> Mascota </option>
              	@foreach($tpets1 as $t)
                	<option value="{{ $t->id }}"> {{  ucfirst($t->type) }}</option>
                @endforeach
            </select>
            <button type="submit" class="form-control btn btn-primary">Buscar</button>
        </form>
			</div>
			<br><br>
		</div>
		<br>
		<div class="row">
			<div class="col-xs-8">
				@if($results == 0)
					No ese han encontrado resultados para la búsqueda
				@else
				@foreach($sitters as $s)
					@foreach($results as $re)
						@foreach($total as $t)
						@if($s->id == $re && $s->id == $t)

					@if($s->publication == 1)

					@elseif($s->publication == 2)

										<div class="col-md-3">
											<center>
												<div class="product-item">
													<div class="pi-img-wrapper">
															@if($s->url_user==NULL || $s->url_user=='NULL')
																<img src="{{asset('/imgusers/user.png')}}" class="img-responsive" alt="{{ ucfirst($s->first_name) }} {{ ucfirst($s->last_name) }}" style="text-align:center;">
															@else
																<img src="/imgusers/{{ $s->url_user }}" class="img-responsive" alt="{{ ucfirst($s->first_name) }} {{ ucfirst($s->last_name) }}" style="text-align:center;">
															@endif
															<div>
																<a href="#" class="btn" onclick="LocalizacionMaps('@foreach($cities as $ci) @if($s->id_city == $ci->id) {{ ucfirst($ci->city) }} @endif @endforeach,{{ ucfirst($s->address) }}')">Ver ubicacion</a>
															</div>
													</div>
													<h3>{{ ucfirst($s->first_name) }} {{ ucfirst($s->last_name) }}</h3>
													<h3>

															Mascotas a cuidar:<br>
															@foreach($publications1 as $pu1)
																@foreach($pets1 as $p1)
																	@foreach($tpets1 as $tp1)
																		@if($pu1->id_user == $s->id)
																			@if($p1->id_publication == $pu1->id)
																				@if($p1->id_pet == $tp1->id)
																					{{ $tp1->type }}
																				@endif
																			@endif
																		@endif
																	@endforeach
																@endforeach
															@endforeach

													</h3>
													<div class="pi-price">
														{{ ucfirst($s->address) }},
														@foreach($cities as $ci)
															@if($s->id_city == $ci->id)
																{{ ucfirst($ci->city) }}
															@endif
														@endforeach
													</div>
													<br><br><br>
													<a href="{{ url('/usersControl/'.$s->id) }}" class="btn btn-primary">Ver perfil</a>
												</div>
											</center>
										</div>
										@endif
						@endif
						@endforeach
						@endforeach
					@endforeach
					@endif
				</div>
				<aside class="col-xs-4 lol1">
					<br>
				  <div style="height: 500px; width: 100%" id="map"></div>
				</aside>
			</div>
	</div>
	<br><br><br><br><br><br>
@endsection
