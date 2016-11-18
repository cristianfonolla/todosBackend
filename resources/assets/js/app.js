//




/**
 * First we will load all of this project's JavaScript dependencies which
 * include Vue and Vue Resource. This gives a great starting point for
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example', require('./components/Example.vue'));
Vue.component('todos', require('./components/todos.vue'));

// const app = new Vue({
//     el: '#app'
// });

const app = new Vue({
    el: '#app'
});





















// /**
//  * First we will load all of this project's JavaScript dependencies which
//  * include Vue and Vue Resource. This gives a great starting point for
//  * building robust, powerful web applications using Vue and Laravel.
//  */
//
// require('./bootstrap');
//
// /**
//  * Next, we will create a fresh Vue application instance and attach it to
//  * the page. Then, you may begin adding components to this application
//  * or customize the JavaScript scaffolding to fit your unique needs.
//  */
//
// Vue.component('example', require('./components/Example.vue'));
//
// //Vm: view model
// const app = new Vue({
//     el: '#app',
//     data: {
//         message: 'Hello',
//         seen: false,
//         todos.vue: [
//             {
//                 name: 'fer 1',
//                 done: true,
//                 priority: 42
//             },
//             {
//                 name: 'fer php',
//                 done: false,
//                 priority: 51
//             },
//             {
//                 name: 'Comprar pa',
//                 done: false,
//                 priority: 11
//             }
//         ]
//     },
//     methods: {
//         reverseMessage: function() {
//             this.message = this.message.split('').reverse().join('');
//         },
//         // fetchData: function() {
//         //     // GET /someUrl
//         //     this.$http.get('/api/v1/task').then((response) => {
//         //         this.todos.vue = response.data.data;
//         // }, (response) => {
//         //         // error callback
//         //         sweetAlert("Oops...", "Something went wrong!", "error");
//         //         console.log(response);
//         //     });
//         // }
//     },
//     created: function() {
//         console.log('App created!');
//         this.fetchData()
//     }
// });


