@extends('layouts.app')

@section('content')
    {{--    <div id="test">
            @{{ user.name }}
        </div>
        <br/>
        <?php
        $time = Carbon\Carbon::now();
        $start_date = date_create('2020-08-08 02:40 GMT +2');
        $date = now()->toDateTime();

        $sec = 10;
        $min = 10;
        $hours = 0;
        $date->sub(new DateInterval('PT' . $hours . 'H' . $min . 'M' . $sec . 'S'));

        echo $time->toDateTimeString();
        echo '<br/>';
        echo '<br/>';
        echo $date->format('Y-m-d H:i:s') . "\n";
        echo '<br/>';
        echo '<br/>';
        echo $start_date->format('Y-m-d H:i:s');
        ?>
        <input class="slider is-fullwidth" step="1" min="0" max="100" value="50" type="range">--}}
    {{--    <input class="slider is-fullwidth" step="1" min="0" max="100" value="50" type="range">
        <div style="text-align: center;">
            <input class="slider is-fullwidth" step="1" min="0" max="100" value="50" type="range">
            <div class="field">
                <label for="switchRoundedOutlinedSuccess">Not Weather Boosted </label>
                <input id="switchRoundedOutlinedSuccess" type="checkbox" name="switchRoundedOutlinedSuccess" class="switch is-rounded is-outlined is-success">
                <label for="switchRoundedOutlinedSuccess">Weather Boosted</label>
            </div>
        </div>--}}
    <div class="column">

    </div>
    <div class="column">
        <div class="box">
            <h1 class="title">Create New Raid</h1>
            <hr>
            <div class="columns">
                <div class="column is-full">
                    <div class="columns">
                        <div class="column is-half" style="display: flex;justify-content: center;align-items: center;">
                            <label class="label">Pokemon Name:</label>
                        </div>

                        <div class="column is-half">
                            <div style="text-align: center;">
                                <div class="control">
                                    <div class="select">
                                        <select>
                                            <option selected>Select..</option>
                                            <option>Rayquaza</option>
                                            <option>Kyogre</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="columns">
                <div class="column is-full">
                    <div class="columns">
                        <div class="column is-half" style="display: flex; justify-content: center; align-items: center;">
                            {{--                        Line left half--}}
                            <label class="label">Raid Tier:</label>
                        </div>
                        <div class="column is-half" style="display: flex; justify-content: center;">
                            {{--                        Line right half--}}
{{--                            <input step="1" min="1" max="5" value="1" type="range">--}}
                            <customslider></customslider>
                        </div>
                    </div>
                </div>
            </div>

            <div class="columns">
                <div class="column is-full">
                    <div class="columns">
                        <div class="column is-half" style="display: flex;justify-content: center;align-items: center;">
                            {{--                        Line left half--}}
                            <label class="label">Minutes left: </label>
                        </div>
                        <div class="column is-half" style="display: flex; justify-content: center;">
                            {{--                        Line right half--}}
                            <div class="control">
                                <div class="control">
                                    <input class="input is-danger" type="text" placeholder="Minutes">
                                </div>
                                {{--                            <p class="help is-danger">
                                                                This field is required
                                                            </p>--}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="columns">
                <div class="column is-full">
                    <div class="columns">
                        <div class="column is-half" style="display: flex;justify-content: center;align-items: center;">
                            {{--                        Line left half--}}
                            <label class="label">Available Invites:</label>
                        </div>
                        <div class="column is-half" style="display: flex; justify-content: center;">
                            {{--                        Line right half--}}
                            <div class="control">
                                <div class="control">
                                    <input class="input is-success" type="text" placeholder="Max Value is 20">
                                </div>
                                {{--                            <p class="help is-danger">
                                                                This field is required
                                                            </p>--}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="columns" style="padding-right: 10%; padding-left: 10%;">
                <div class="column is-half">
                    <div class="field">
                        <input id="status" type="checkbox" name="status" class="switch is-rounded is-outlined is-success">
                        <label for="status">Before Hatch</label>
                    </div>
                </div>
                <div class="column is-half">
                    <div class="field">
                        <input id="weatherBoost" type="checkbox" name="weatherBoost" class="switch is-rounded is-outlined is-success">
                        <label for="weatherBoost">Weather Boosted</label>
                    </div>
                </div>
            </div>
            <br/>
            <div class="columns">
                <div class="column">
                    <div class="control">
                        <button class="button is-large is-fullwidth is-success">Start Raid</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="column">

    </div>
@endsection
