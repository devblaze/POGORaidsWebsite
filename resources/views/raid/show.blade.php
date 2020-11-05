@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="title is-centered">{{ $raid->pokemon->name }} Tier {{ $raid->pokemon->tier }}</h1>
        <table class="table is-hoverable is-fullwidth">
            <thead>
            <tr>
                <th>#</th>
                <th>Username</th>
                <th>Code</th>
                <th>Team</th>
            </tr>
            </thead>
            <tbody>
            <tr class="has-background-primary">
                <td>Host</td>
                <td>{{ $raid->trainer->name }}</td>
                <td>{{ $raid->trainer->code }}</td>
                <td>{{ $raid->trainer->team }}</td>
            </tr>
            @foreach($raid_members as $raid_member)
                {{ $raid_member->trainer_id }}
            @endforeach
            @for($i = 1; $i <= $raid->invites; $i++)
                <tr>
                    <td>{{ $i }}</td>
                    <td>Username</td>
                    <td>Code</td>
                    <td>Team</td>
                </tr>
            @endfor
            </tbody>
        </table>

        {{--        <div class="box">
                    <h1 class="title">{{ $raid->pokemon->name }} Tier {{ $raid->pokemon->tier }}</h1>
                    <hr>
                    <div style="background: cyan">
                        <div class="columns">
                            <div class="column">
                                <p>Host</p>
                            </div>
                            <div class="column">
                                <p>{{ $raid->trainer->name }}</p>
                            </div>
                            <div class="column">
                                <p>{{ $raid->trainer->code }}</p>
                            </div>
                        </div>
                    </div>
                    --}}{{--            <p>Team: {{ $raid->trainer->team }}</p>--}}{{--

                    @for($i = 1; $i <= $raid->invites; $i++)
                        <hr>
                        {{ $i }}.
                    @endfor
                </div>--}}
    </div>
@endsection
