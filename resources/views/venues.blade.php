@extends('layouts/main')

@section('content')
<div class='col-lg-11' id='venue_list'>
	<h1>Cardiff</h1>
	<div class = 'row'>
	@foreach ($venues as $venue)
		<div class="col-md-3">
		    <div class="card venue-info">
				<div class="card-body">
				    <h5 class="card-title">{{ $venue->name }}</h5>
				    <p class="card-text">
				   		{{ $venue->street_address }} <br>
				   		{{ $venue->post_code }}
					</p>

				    <a href="{{ route('events.show', $venue) }}" class="btn btn-outline-warning">Events</a>
				    <a href="#" class="btn btn-outline-warning favourite-button @if($venue->userFavourited) glow @endif" data-url="{{ route('venue.favourite', ['venue' => $venue])}}">Favourite</a>
			  	</div>
			</div>
		</div>
	@endforeach
	</div>
</div>
@endsection

@section('script')

	<script type="text/javascript">

		$(function(){

			$('.favourite-button').on('click', function(){
				var thisButton = $(this);
				var url = thisButton.data('url');

				$.ajax({
					url: url,
					complete: function(jqXHR, textStatus) {
						if (thisButton.hasClass('glow')) {
							thisButton.removeClass('glow');
						} else {
							thisButton.addClass('glow');
						}
					}
				})

				return false;
			});
		});

	</script>
@endsection