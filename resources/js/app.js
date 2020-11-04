import './bootstrap';
import raids from './components/Raids';
import customslider from './components/customSlider';
import example from './components/ExampleComponent';
import raid from './components/RaidCreate';

let app = new Vue ({
    el: '#app',

    components: {
        raids,
        customslider,
        example,
        raid
    }
});
