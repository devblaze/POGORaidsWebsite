import Home from "./components/ExampleComponent"

export default {
    mode: 'history',
    base: __dirname,

    routes: [
        {
            path: '/example',
            component: Home,
            name: 'example'
        },

        {
            path: '/raids/:id/edit',
            name: 'raidEdit'
        }
    ]
}
