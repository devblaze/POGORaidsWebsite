@extends('layouts.app')

@section('content')
    <div class="columns">
        <div class="column"></div>
        <div class="column is-three-quarters">
            <table class="table is-bordered is-striped is-hoverable is-fullwidth">
                <thead>
                <tr>
                    <th>Reported at</th>
                    <th>Type</th>
                    <th>Status</th>
                </tr>
                </thead>
                <tbody>
                @foreach($bugs as $bug)
                    <tr class="@if($bug->status === "Done") is-selected @endif">
                        <td>{{ $bug->created_at->format('d/M/Y') }}</td>
                        <td>{{ $bug->type }}</td>
                        <td>{{ $bug->status }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="column"></div>
    </div>

@endsection
