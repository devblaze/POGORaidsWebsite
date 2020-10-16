@extends('layouts.app')

@section('admin')
    <div class="container">
        <div class="columns">
            @include('admin.menu')
            {{ $bugreports->links() }}
            <br/>
            <table class="table is-hoverable">
                <thead>
                <th>ID</th>
                <th>From</th>
                <th>Type</th>
                <th>Description</th>
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
                        <td>{{ $bugreport->desc }}</td>
                        <td>{{ $bugreport->updated_at }}</td>
                        <td>{{ $bugreport->created_at }}</td>
                        <td>{{ $bugreport->status }}</td>
                        <td>
                            <a href="{{ route('admin') }}">
                                <i class="fas fa-check" title="Fixed Bug">&nbsp;</i>
                            </a>
                            <a href="{{ route('admin') }}">
                                <i class="fas fa-clock" title="Approved Bug">&nbsp;</i>
                            </a>
                            <a href="{{ route('admin') }}">
                                <i class="fas fa-times" title="Reject Bug">&nbsp;</i>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    </div>
@endsection
