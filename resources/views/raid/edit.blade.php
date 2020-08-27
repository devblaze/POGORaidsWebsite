@extends('layouts.app')

@section('content')
<h1>raid {{ $raid->id }} edit page</h1>
<form method="POST" target="{{ route('raid_update') }}">
    @csrf
    <label>Raid Level:</label>
    <input type="text" name="raidlevel">
    <br/>
    <input type="submit" name="submit" value="Apply">
</form>
@endsection
