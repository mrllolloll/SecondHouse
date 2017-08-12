@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			
				<div class="col-md-12">
					<form class="form-inline col-md-12 col-md-offset-3" action="/searchResults/" method="GET">
                    <select name="typepets" class="form-control">
                    	<option value="0"> Mascota </option>
                      @foreach($tpets1 as $t)
                        <option value="{{ $t->id }}"> {{  ucfirst($t->type) }}</option>
                      @endforeach
                    </select>
                    <select name="cities" class="form-control">
                    <option value="0"> Ciudad </option>
                      @foreach($cities as $c)
                        <option value="{{ $c->id }}"> {{ ucfirst($c->city) }}</option>
                      @endforeach
                    </select>
                    <input type="date" name="beginDate"  class="form-control">
                    <input type="date" name="endDate" class="form-control">
                    <button type="submit" class="form-control btn btn-primary">Buscar</button>
                </form>  
				</div>

			<br><br>
			
			

		</div>
		<div class="row">
				<div class="col-md-6">
					<table class="table table-striped">
							
						
					@if($results == 0)
						No ese han encontrado resultados para la búsqueda
					@else
					@foreach($sitters as $s)
						@foreach($results as $re)
							@foreach($total as $t)
							@if($s->id == $re && $s->id == $t)
						
						@if($s->publication == 1)

						@elseif($s->publication == 2)
							<tr>	

								<td>  @if($s->url_user==NULL || $s->url_user=='NULL')
                                <img src="/imgusers/user.png"  class="img-circle" style="width: 5%;"> 
                            @else 
                                <img src="/imgusers/{{ $s->url_user }}" class="img-circle" style="width: 5%;"> 
                            @endif{{ ucfirst($s->first_name) }} {{ ucfirst($s->last_name) }} 
								<br> 

								<!-- Direcion -->
								{{ ucfirst($s->address) }}, 
								@foreach($cities as $ci)
									@if($s->id_city == $ci->id)
										{{ ucfirst($ci->city) }}
									@endif	
								@endforeach
								<br>
								<!-- tipo de mascotas -->
								Mascotas a cuidar: 
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


								<br>
								<a href="">Ver anuncio</a>
								</td>

							</tr>
						@endif
						@endif
						@endforeach
						@endforeach
					@endforeach
					@endif
					</table>


				</div>
				<div class="col-md-6 pull-right">Espacio para Google maps</div>
			</div>
	</div>
@endsection
