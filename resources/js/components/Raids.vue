<template>
    <div class="columns">
        <div class="column is-one-fifth">

            <filters title="Raid Sort By">
                <div class="field">
                    <label>Time Left</label>
                </div>
                <div class="field">
                    <input class="is-checkradio" id="timeleftdesc" type="radio" name="timeleft">
                    <label for="timeleftdesc">Desc <</label>
                    <input class="is-checkradio" id="timeleftasc" type="radio" name="timeleft">
                    <label for="timeleftasc">Asc ></label>
                </div>
            </filters>

            <filters title="Raid Tier">
                <div class="field">
                    <input id="tier6" type="checkbox" name="tier6" class="switch is-rounded is-primary" checked="checked">
                    <label for="tier6"><span class="tag is-primary">Mega Evolution</span></label>
                </div>
                <div class="field">
                    <input id="tier5" type="checkbox" name="tier5" class="switch is-rounded is-info" checked="checked">
                    <label for="tier5"><span class="tag is-info">Tier 5</span></label>
                </div>
                <div class="field">
                    <input id="tier3" type="checkbox" name="tier3" class="switch is-rounded is-info" checked="checked">
                    <label for="tier3"><span class="tag is-info">Tier 3</span></label>
                </div>
                <div class="field">
                    <input id="tier1" type="checkbox" name="tier1" class="switch is-rounded is-info" checked="checked">
                    <label for="tier1"><span class="tag is-info">Tier 1</span></label>
                </div>
            </filters>

            <filters title="Raid Status">
                <div class="field">
                    <input id="status" type="checkbox" name="status" class="switch is-rounded">
                    <label for="status">Hatched</label>
                </div>
                <div class="field">
                    <input id="weatherBoost" type="checkbox" name="weatherBoost" class="switch is-rounded">
                    <label for="weatherBoost">Weather Boosted</label>
                </div>
            </filters>

        </div>

        <div class="column is-four-fifths">
            <div class="columns is-multiline">
                <div class="column is-full">
                    <div class="columns">
                        <div class="column">
                            <div class="control has-icons-left is-loading" v-if="isLoading">
                            </div>
                            <div class="control has-icons-left has-icons-right">
                                <input class="input is-rounded" type="email" placeholder="Search by Pokemon Name" @keyup="find" v-model="search">
                                <span class="icon is-small is-left"><i class="fas fa-search" aria-hidden="false"></i></span>
                                <span class="icon is-small is-right"><i class="fas fa-check" aria-hidden="false"></i></span>
                            </div>
                        </div>
                        <!--                    <div class="column is-1" style="justify-content: center;">
                                                <span class="icon"><i class="fa fa-sort-numeric-asc" aria-hidden="true"></i></span>
                                            </div>-->
                    </div>
                </div>

                <div class="column is-one-third" v-for="raid in raids">
                    <div class="card">
                        <div class="card">
                            <div class="card-image">
                                <figure class="image is-2by2">
                                    <img alt="Placeholder image" :src="'images/icon_' + pokemon[raid.pokemon_id - 1].name.toLowerCase() + '.jpg'" />
                                </figure>
                            </div>
                            <div class="card-content">
                                <div class="media">
                                    <div class="media-content">
                                        <p class="title">{{ pokemon[raid.pokemon_id - 1].name }}</p>
                                        <p class="subtitle">Raid Tier: {{ pokemon[raid.pokemon_id - 1].tier }}</p>
                                    </div>
                                    <div class="weatherBoost">
                                        <div v-if="raid.weather_boost" style="color: green; font-weight: bold;">Weather Boosted</div>
                                        <div v-else="raid.weather_boost">Not Boosted</div>
                                    </div>
                                </div>
                                <div class="content">
                                    <div class="columns is-mobile">
                                        <div class="column">
                                            <div style="text-align: center;">
                                                Party Invites
                                                <br/>
                                                0 / {{ raid.invites }}
                                            </div>
                                        </div>

                                        <div class="column">
                                            <div style="text-align: center;">
                                                <div v-if="raid.hatched">Before Hatch:</div>
                                                <div v-else="raid.hatched"><b>Time Left:</b></div>
                                                <raid-countdown :id="raid.id"></raid-countdown>
                                            </div>
                                        </div>
                                        <div class="column" v-if="user">
                                            <div style="text-align: center;">
                                                <a class="button is-info is-narrow is-rounded" :href="'/raids/' + raid.id + '/edit'" v-if="trainer == raid.trainer_id">Edit</a>
                                                <a class="button is-success is-narrow is-rounded" :href="'/raids/' + raid.id + '/join/' + user.id" v-else="trainer == raid.trainer_id">Join</a>
                                            </div>
                                        </div>
                                        <div class="column" v-else="user">
                                            <p>Login in order to Join!</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
</template>

<script>
import VueRouter from "vue-router";
import routes from "../routes";
import countdown from "./Countdown";
import RaidCountdown from "./RaidCountdown";
import filters from "./RaidsFilters";

export default {
    props: {
        user: String,
        trainer: String
    },
    components: {
        RaidCountdown,
        countdown,
        filters
    },
    data() {
        return {
            isLoading: false,
            isFullPage: true,
            search: '',
            raids: {},
            pokemon: {}
        }
    },
    created() {
        this.getPokemon()
        this.fillRaids()
    },
    methods: {
        /**
         * Get all the pokemon's available in order to get the name and tier of the raid.
         */
        getPokemon() {
            axios.get('api/pokemon')
                .then((data) => {
                    this.pokemon = data.data
                });
        },

        /**
         * Get the raids for the first time with API call.
         */
        fillRaids() {
            this.isLoading = true
            axios.get('api/raids')
                .then((data) => {
                    this.raids = data.data
                    this.isLoading = false
                });
        },

        /**
         * Search for the raid/s that match the user input.
         */
        find() {
            this.loading = true;
            setTimeout(() => {
                let query = this.search;
                axios.get('api/raids/findRaid?q=' + query)
                    .then((data) => {
                        this.raids = data.data
                        this.loading = false
                    })
                    .catch(() => {
                        console.log('Something went wrong while searching for raids!')
                    });
            }, 2000)
        }
    },
    router: new VueRouter(routes)
}
</script>
