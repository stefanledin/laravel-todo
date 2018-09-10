if ('serviceWorker' in navigator) {
    window.addEventListener("load", () => {
        navigator.serviceWorker.register("/serviceworker.js");
    });
}

/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

/*
Vue.component('example-component', require('./components/ExampleComponent.vue'));
*/
const app = new Vue({
    el: '#app',
    data: {
        todos: [],
        new_todo: ''
    },
    created: async function () {
        const todos = await axios.get('/todos');
        this.todos = todos.data;
    },
    methods: {
        onSubmit: async function () {
            this.todos.push({label: this.new_todo});
            const newTodo = axios.post('/todos', {
                new_todo: this.new_todo
            });
            console.log(newTodo);
            this.new_todo = '';
        }
    }
});