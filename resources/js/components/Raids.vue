<template>
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
                                <img alt="Placeholder image" :src="'/images/icon_' + raid.name.toLowerCase() + '.jpg'" />
                            </figure>
                        </div>
                        <div class="card-content">
                            <div class="media">
                                <div class="media-content">
                                    <p class="title">{{ raid.name }}</p>
                                    <p class="subtitle">Raid Tier: {{ raid.level }}</p>
                                </div>
                                <div style="margin-top: 5%; display: flex; align-items: center; justify-content: center; padding-right: 14px;">
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
                                            0 / {{ raid.party_size }}
                                        </div>
                                    </div>

                                    <div class="column">
                                        <div style="text-align: center;">
                                            <div v-if="raid.status">Before Hatch:</div>
                                            <div v-else="raid.status"><b>Time Left:</b></div>
                                            28:33
                                        </div>
                                    </div>
                                    <div class="column">
                                        <div style="text-align: center;">
                                            <!--                                        <a class="button is-info is-narrow is-rounded">
                                                                                        <router-link :to="{ name: 'raidEdit', params: { id: raid.id }}">Edit</router-link>
                                                                                    </a>-->
                                            <a class="button is-info is-narrow is-rounded" :href="'/raids/' + raid.id + '/edit'" v-if="user !== ''">Edit</a>
                                            <button class="button is-success is-narrow is-rounded">Join</button>
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

export default {
    props: {
        user: String
    },

    data() {
        return {
            isLoading: false,
            isFullPage: true,
            search: '',
            raids: {}
        }
    },

    created(){
        this.fillRaids();
    },

    methods: {
        fillRaids() {
            axios.get('api/raids')
                .then((data) => {
                    this.raids = data.data
                    this.isLoading = false
                });
        },

        find() {
            setTimeout(() => {
                let query = this.search;
                this.loading = true;
                axios.get('api/raids/findRaid?q=' + query)
                    .then((data) => {
                        this.raids = data.data
                        this.loading = false
                    })
                    .catch(() => {
                        console.log('Something went wrong while searching for raids!')
                    });
            }, 1000)
        }
    },
    /*        openLoading() {
            this.isLoading = true
            setTimeout(() => {
                this.isLoading = false
            }, 10 * 1000)
        },*/

    router: new VueRouter(routes)
}
</script>
