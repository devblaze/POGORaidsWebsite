@extends('layouts.app')

@section('content')
<h1>raids show page</h1>
<p>Raid Name: {{ $raid->name }}</p>
<p>Raid Level: {{ $raid->level }}</p>
<p>Host: {{ $raid->trainer_id }}</p>
<p>Available Invites: {{ $raid->party_size }}</p>
<p>Weather Boost: {{ $raid->weather_boost }}</p>
<p>Raid Condition: {{ $raid->status }}</p>
<a href="{{ route('raid_edit', $raid->id) }}">Edit this raid</a>
@endsection
