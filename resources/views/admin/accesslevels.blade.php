@extends('layouts.app')

@section('admin')
    <div class="container">
        <div class="columns">
            @include('admin.menu')
            {{ $levels->links() }}
            <br/>
            <table class="table is-hoverable">
                <thead>
                <th>ID</th>
                <th>Name</th>
                <th>Label</th>
                <th>Modify Users</th>
                <th>Modify Users Access</th>
                <th>Modify Trainers</th>
                <th>Modify Raids</th>
                <th>Modify Pokemon's</th>
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
                        <div class="field">
                            <input class="is-checkradio" id="modifyUsers" type="checkbox" name="modifyUsers" ">
                            <label for="exampleCheckboxDefault"></label>
                        </div>
                    </td>
                    <td>
                        <div class="field">
                            <input class="is-checkradio" id="modifyUsersAccess" type="checkbox" name="modifyUsersAccess">
                            <label for="exampleCheckboxDefault"></label>
                        </div>
                    </td>
                    <td>
                        <div class="field">
                            <input class="is-checkradio" id="modifyTrainers" type="checkbox" name="modifyTrainers">
                            <label for="exampleCheckboxDefault"></label>
                        </div>
                    </td>
                    <td>
                        <div class="field">
                            <input class="is-checkradio" id="modifyRaids" type="checkbox" name="modifyRaids">
                            <label for="exampleCheckboxDefault"></label>
                        </div>
                    </td>
                    <td>
                        <div class="field">
                            <input class="is-checkradio" id="modifyPokemons" type="checkbox" name="modifyPokemons">
                            <label for="exampleCheckboxDefault"></label>
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
                @foreach($levels as $level)
                    <tr>
                        <th>{{ $level->id }}</th>
                        <td>{{ $level->name }}</td>
                        <td>{{ $level->label }}</td>
                        <td>
                            <div class="field">
                                <input class="is-checkradio" id="modifyPokemons" type="checkbox" name="modifyPokemons" {{ $level->can_modify_users ? 'checked="checked"' : ''}}>
                                <label for="exampleCheckboxDefault"></label>
                            </div>
                        </td>
                        <td>
                            <div class="field">
                                <input class="is-checkradio" id="modifyPokemons" type="checkbox" name="modifyPokemons" {{ $level->can_modify_users_access ? 'checked="checked"' : ''}}>
                                <label for="exampleCheckboxDefault"></label>
                            </div>
                        </td>
                        <td>
                            <div class="field">
                                <input class="is-checkradio" id="modifyPokemons" type="checkbox" name="modifyPokemons" {{ $level->can_modify_trainers ? 'checked="checked"' : ''}}>
                                <label for="exampleCheckboxDefault"></label>
                            </div>
                        </td>
                        <td>
                            <div class="field">
                                <input class="is-checkradio" id="modifyPokemons" type="checkbox" name="modifyPokemons" {{ $level->can_modify_raids ? 'checked="checked"' : ''}}>
                                <label for="exampleCheckboxDefault"></label>
                            </div>
                        </td>
                        <td>
                            <div class="field">
                                <input class="is-checkradio" id="modifyPokemons" type="checkbox" name="modifyPokemons" {{ $level->can_modify_pokemons ? 'checked="checked"' : ''}}>
                                <label for="exampleCheckboxDefault"></label>
                            </div>
                        </td>
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
