<strong>{{ $building['name'] }}</strong><br><br>
@foreach($building['costs'] as $cost => $value)
@if($value)
{{ ucfirst($cost) }}: {{ Helper::nf($value, false) }}<br>
@endif
@endforeach
