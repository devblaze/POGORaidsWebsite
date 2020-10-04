@extends('layouts.app')

@section('content')
    <div class="column">

        <div class="box">
            <h1 class="title">Report a Bug</h1>
            <hr>
            <form method="POST" action="{{ route('bug_report_store') }}">
                @csrf
                <div class="columns">
                    <div class="column">
                        <label class="label">
                            Bug Type:
                        </label>
                    </div>
                </div>
                <div class="columns">
                    <div class="column">
                        <div class="control">
                            <div class="select @error('type') is-danger @enderror is-fullwidth">

                                <select id="type" name="type">
                                    <option selected value="">Select..</option>
                                    <option>Raid Related</option>
                                    <option>Party Related</option>
                                    <option>Can't Access Account</option>
                                    <option>Can't Create Trainer</option>
                                    <option>Other</option>
                                </select>
                            </div>
                            @error('type')
                            <p class="help is-danger">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="columns">
                    <div class="column">
                        <label class="label">
                            Describe the Bug:
                        </label>
                    </div>
                </div>
                <div class="columns">
                    <div class="column">
                        <div class="control">
                            <input type="textarea" name="desc" id="desc" class="textarea @error('desc') is-danger @enderror is-fullwidth">
                            @error('desc')
                            <p class="help is-danger">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="columns">
                    <div class="column">
                        <div class="control">
                            <input id="user_id" name="user_id" type="hidden" value="{{ auth()->user()->id }}">
                            @error('user_id')
                            <p class="help is-danger">
                                {{ $message }}
                            </p>
                            @enderror
                            <button type="submit" class="button is-large is-fullwidth is-success">Start Raid</button>
                            <a class="subtitle hoverable" href="{{ route('bug_report') }}">Check your bug status</a>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>
@endsection
