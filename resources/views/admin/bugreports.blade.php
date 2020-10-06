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
                <th>Dex ID</th>
                <th>Name</th>
                <th>Tier</th>
                <th>Min CP</th>
                <th>Max CP</th>
                <th>Min BCP</th>
                <th>Actions</th>
                </thead>
                <tbody>
                <tr>
                    <td colspan="2">
                        <div class="control">
                            <input class="input is-hovered" type="text" placeholder="Name">
                        </div>
                    </td>
                    <td>
                        <div class="control">
                            <input class="input is-hovered" type="text" placeholder="Label">
                        </div>
                    </td>
                    <td>
                        <div class="control">
                            <input class="input is-hovered" type="text" placeholder="Password">
                        </div>
                    </td>
                    <td>
                        <div class="control">
                            <input class="input is-hovered" type="text" placeholder="Access Level">
                        </div>
                    </td>
                    <td>
                        <button class="button is-success">
                            <span class="icon is-small">
                              <i class="fas fa-users"></i>
                            </span>
                            <span>Create</span>
                        </button>
                    </td>
                </tr>
                @foreach($bugreports as $bugreport)
                    <tr>
                        <th>{{ $bugreport->id }}</th>
                        <td>{{ $bugreport->user_id }}</td>
                        <td>{{ $bugreport->type }}</td>
                        <td>{{ $bugreport->desc }}</td>
                        <td>{{ $bugreport->updated_at }}</td>
                        <td>{{ $bugreport->created_at }}</td>
                        <td>{{ $bugreport->status }}</td>
                        <td>
                            <a href="{{ route('admin') }}">
                                <i class="fas fa-save" title="Save Changes">&nbsp;</i>
                            </a>
                            <a href="{{ route('admin') }}">
                                <i class="fas fa-times" title="Delete Level">&nbsp;</i>
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
