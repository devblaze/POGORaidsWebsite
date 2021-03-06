@extends('layouts.app')

@section('admin')
    <div class="container">
        <div class="columns">
            @include('admin.menu')
                <section class="hero is-info welcome is-small">
                    <div class="hero-body">
                        <div class="container">
                            <h1 class="title">
                                Hello, <b>{{ auth()->user()->AccessLevel->name }}</b> {{ auth()->user()->username }}.
                            </h1>
                            <h2 class="subtitle">
                                I hope you are having a great day!
                            </h2>
                        </div>
                    </div>
                </section>
                <section class="info-tiles">
                    <div class="tile is-ancestor has-text-centered">
                        <div class="tile is-parent">
                            <article class="tile is-child box">
                                <p class="title">{{ $data['users'] }}</p>
                                <p class="subtitle">Users</p>
                            </article>
                        </div>
                        <div class="tile is-parent">
                            <article class="tile is-child box">
                                <p class="title">{{ $data['trainers'] }}</p>
                                <p class="subtitle">Trainers</p>
                            </article>
                        </div>
                        <div class="tile is-parent">
                            <article class="tile is-child box">
                                <p class="title">{{ $data['raids'] }}</p>
                                <p class="subtitle">Raids</p>
                            </article>
                        </div>
                        <div class="tile is-parent">
                            <article class="tile is-child box">
                                <p class="title">{{ $data['pokemon'] }}</p>
                                <p class="subtitle">Pokemon's</p>
                            </article>
                        </div>
                    </div>
                </section>
                <div class="columns">
                    <div class="column is-">
                        <div class="card events-card">
                            <header class="card-header">
                                <p class="card-header-title">
                                    Events Log
                                </p>
                                <a href="#" class="card-header-icon" aria-label="more options">
                                  <span class="icon">
                                    <i class="fa fa-angle-down" aria-hidden="true"></i>
                                  </span>
                                </a>
                            </header>
                            <div class="card-table is-2">
                                <div class="content">
                                    <table class="table is-fullwidth is-striped">
                                        <thead>
                                        <tr>
                                            <td></td>
                                            <th>Type</th>
                                            <th>Action</th>
                                            <th>User</th>
                                            <th>Date</th>
                                            <th>Time</th>
                                            <td></td>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td width="5%"><i class="fas fa-bell"></i></td>
                                            <td>Raid</td>
                                            <td>Created</td>
                                            <td>{{ auth()->user()->username }}</td>
                                            <td>17/09/2020</td>
                                            <td>16:24</td>
                                            <td class="level-right"><a class="button is-small is-primary" href="#">Details</a></td>
                                        </tr>
                                        <tr>
                                            <td width="5%"><i class="fas fa-bell"></i></td>
                                            <td>User</td>
                                            <td>Banned</td>
                                            <td>{{ App\Models\User::find(2)->username }}</td>
                                            <td>16/09/2020</td>
                                            <td>18:30</td>
                                            <td class="level-right"><a class="button is-small is-primary" href="#">Details</a></td>
                                        </tr>
                                        <tr>
                                            <td width="5%"><i class="fa fa-bell-o"></i></td>
                                            <td>Trainer</td>
                                            <td>Created</td>
                                            <td>{{ App\Models\User::find(3)->username }}</td>
                                            <td>14/09/2020</td>
                                            <td>12:16</td>
                                            <td class="level-right"><a class="button is-small is-primary" href="#">Details</a></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <footer class="card-footer">
                                <a href="#" class="card-footer-item">View All</a>
                            </footer>
                        </div>
                    </div>
                    <div class="column is-6">
                        <div class="card">
                            <header class="card-header">
                                <p class="card-header-title">
                                    Inventory Search
                                </p>
                                <a href="#" class="card-header-icon" aria-label="more options">
                  <span class="icon">
                    <i class="fa fa-angle-down" aria-hidden="true"></i>
                  </span>
                                </a>
                            </header>
                            <div class="card-content">
                                <div class="content">
                                    <div class="control has-icons-left has-icons-right">
                                        <input class="input is-large" type="text" placeholder="">
                                        <span class="icon is-medium is-left">
                      <i class="fa fa-search"></i>
                    </span>
                                        <span class="icon is-medium is-right">
                      <i class="fa fa-check"></i>
                    </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <header class="card-header">
                                <p class="card-header-title">
                                    User Search
                                </p>
                                <a href="#" class="card-header-icon" aria-label="more options">
                  <span class="icon">
                    <i class="fa fa-angle-down" aria-hidden="true"></i>
                  </span>
                                </a>
                            </header>
                            <div class="card-content">
                                <div class="content">
                                    <div class="control has-icons-left has-icons-right">
                                        <input class="input is-large" type="text" placeholder="">
                                        <span class="icon is-medium is-left">
                      <i class="fa fa-search"></i>
                    </span>
                                        <span class="icon is-medium is-right">
                      <i class="fa fa-check"></i>
                    </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
