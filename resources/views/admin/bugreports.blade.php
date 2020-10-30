@extends('layouts.app')

@section('admin')
    <div class="container">
        <div class="columns">
            @include('admin.menu')
            {{ $bugreports->links() }}
            <br/>
            <table class="table is-hoverable is-fullwidth">
                <thead>
                <th>ID</th>
                <th>From</th>
                <th>Type</th>
                <th>Updated At</th>
                <th>Created At</th>
                <th>Status</th>
                <th>Actions</th>
                </thead>
                <tbody>
                @foreach($bugreports as $bugreport)
                    <tr>
                        <th>{{ $bugreport->id }}</th>
                        <td>{{ $bugreport->user->username }}</td>
                        <td>{{ $bugreport->type }}</td>
                        <td>{{ $bugreport->updated_at }}</td>
                        <td>{{ $bugreport->created_at }}</td>
                        <td>{{ $bugreport->status }}</td>
                        <td><a class="button is-info" href="#">Read it</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    </div>
@endsection
