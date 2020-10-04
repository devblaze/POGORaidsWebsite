@extends('layouts.app')

@section('content')
    <table class="table">
        <thead>
        <tr style="text-align: center">
            <th colspan="2">Trainer {{ $trainer->name }}</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>Trainer Level:</td>
            <td>{{ $trainer->level }}</td>
        </tr>
        <tr>
            <td>Trainer Code:</td>
            <td>{{ $trainer->code }}</td>
        </tr>
        <tr>
            <td>Team:</td>
            <td>{{ $trainer->team }}</td>
        </tr>
        <tr>
            <td>Pokedex:</td>
            <td>{{ $trainer->pokedex }}</td>
        </tr>
        </tbody>
    </table>
@endsection
