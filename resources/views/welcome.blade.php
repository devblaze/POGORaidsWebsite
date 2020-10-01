@extends('layouts.app')

@section('content')
    <div class="column is-centered">
        <div class="timeline is-centered">
            <header class="timeline-header">
                <span class="tag is-medium is-success">Start</span>
            </header>

            <div class="timeline-item is-primary">
                <div class="timeline-marker is-success"></div>
                <div class="timeline-content">
                    <p class="heading">May 2020</p>
                    <p>Idea and creation of the Project. </p>
                </div>
            </div>

            <header class="timeline-header">
                <span class="tag is-success">June</span>
            </header>
            <div class="timeline-item is-success">
                <div class="timeline-marker is-success"></div>
                <div class="timeline-content">
                    <p class="heading">June 2020</p>
                    <p>POGORaids backend ready for use.</p>
                </div>
            </div>

            <header class="timeline-header">
                <span class="tag is-success">July</span>
            </header>
            <div class="timeline-item is-success">
                <div class="timeline-marker is-success"></div>
                <div class="timeline-content">
                    <p class="heading">July 2020</p>
                    <p>Frontend and optimization.</p>
                </div>
            </div>

            <header class="timeline-header">
                <span class="tag is-warning">August</span>
            </header>
            <div class="timeline-item is-warning">
                <div class="timeline-marker is-warning"></div>
                <div class="timeline-content">
                    <p class="heading">August 2020</p>
                    <p>Access level controls and more optimization.</p>
                </div>
            </div>
            <div class="timeline-item is-danger">
                <div class="timeline-marker is-danger"></div>
                <div class="timeline-content">
                    <p class="heading">August 2020</p>
                    <p>Delayed - Further development is needed.</p>
                </div>
            </div>

            <header class="timeline-header">
                <span class="tag is-danger">October</span>
            </header>
            <div class="timeline-item">
                <div class="timeline-marker"></div>
                <div class="timeline-content">
                    <p class="heading">October 2020</p>
                    <p>Testing and close alpha access.</p>
                </div>
            </div>

            <header class="timeline-header">
                <span class="tag is-info">November</span>
            </header>
            <div class="timeline-item">
                <div class="timeline-marker"></div>
                <div class="timeline-content">
                    <p class="heading">November 2020</p>
                    <p>Public Alpha release.</p>
                </div>
            </div>

            <header class="timeline-header">
                <span class="tag is-medium is-primary">2021</span>
            </header>
            <div class="timeline-item">
                <div class="timeline-marker is-icon">
                    <i class="fa fa-flag"></i>
                </div>
                <div class="timeline-content">
                    <p class="heading">January 2021</p>
                    <p>Estimated time of first stable release.</p>
                </div>
            </div>

            <div class="timeline-header">
                <span class="tag is-medium is-success">End</span>
            </div>
        </div>
    </div>
@endsection
