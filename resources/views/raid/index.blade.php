@extends('layouts.app')

@section('content')
    <div class="column is-one-fifth">
        <example>
            <header>
                test adf
                <countdown></countdown>
            </header>
        </example>

        <br/>
        <div class="card">
            <header class="card-header">
                <p class="card-header-title">
                    Raid Sort By
                </p>
                <a href="#" class="card-header-icon" aria-label="more options">
      <span class="icon">
        <i class="fas fa-angle-down" aria-hidden="true"></i>
      </span>
                </a>
            </header>
            <div class="card-content">
                <div class="content">
                    <div class="field">
                        <label for="timelefttimeleftdesc">Time Left</label>
                    </div>
                    <div class="field">
                        <input class="is-checkradio" id="timeleftdesc" type="radio" name="timeleft">
                        <label for="timeleftdesc">Desc <</label>
                        <input class="is-checkradio" id="timeleftasc" type="radio" name="timeleft">
                        <label for="timeleftasc">Asc ></label>
                    </div>
                </div>
            </div>
        </div>

        <br/>

        <div class="card">
            <header class="card-header">
                <p class="card-header-title">
                    Raid Tier
                </p>
                <a href="#" class="card-header-icon" aria-label="more options">
      <span class="icon">
        <i class="fas fa-angle-down" aria-hidden="true"></i>
      </span>
                </a>
            </header>
            <div class="card-content">
                <div class="content">
                    <div class="field">
                        <input id="tier5" type="checkbox" name="tier5" class="switch is-rounded is-info" checked="checked">
                        <label for="tier5"><span class="tag is-info">Tier 5</span></label>
                    </div>
                    <div class="field">
                        <input id="tier4" type="checkbox" name="tier4" class="switch is-rounded" checked="checked">
                        <label for="tier4"><span class="tag is-info">Tier 4</span></label>
                    </div>
                    <div class="field">
                        <input id="tier3" type="checkbox" name="tier3" class="switch is-rounded" checked="checked">
                        <label for="tier3"><span class="tag is-info">Tier 3</span></label>
                    </div>
                    <div class="field">
                        <input id="tier2" type="checkbox" name="tier2" class="switch is-rounded" checked="checked">
                        <label for="tier2"><span class="tag is-info">Tier 2</span></label>
                    </div>
                    <div class="field">
                        <input id="tier1" type="checkbox" name="tier1" class="switch is-rounded" checked="checked">
                        <label for="tier1"><span class="tag is-info">Tier 1</span></label>
                    </div>
                </div>
            </div>
            <footer class="card-footer">
                <a href="#" class="card-footer-item">Apply</a>
            </footer>
        </div>

        <br/>

        <div class="card">
            <header class="card-header">
                <p class="card-header-title">
                    Raid Status
                </p>
                <a href="#" class="card-header-icon" aria-label="more options">
      <span class="icon">
        <i class="fas fa-angle-down" aria-hidden="true"></i>
      </span>
                </a>
            </header>
            <div class="card-content">
                <div class="content">
                    <div class="field">
                        <input id="status" type="checkbox" name="status" class="switch is-rounded">
                        <label for="status">Hatched</label>
                    </div>
                    <div class="field">
                        <input id="weatherBoost" type="checkbox" name="weatherBoost" class="switch is-rounded">
                        <label for="weatherBoost">Weather Boosted</label>
                    </div>
                </div>
            </div>
            <footer class="card-footer">
                <a href="#" class="card-footer-item">Apply</a>
            </footer>
        </div>
    </div>
    @guest
        <raids user=""></raids>
    @else
        <raids user="{{ Auth::user()->id }}"></raids>
    @endguest
@endsection
