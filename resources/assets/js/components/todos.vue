<template>

    <div>

        <p v-show="seen">{{message}}</p>
        <input type="text" v-model="message">
        <button v-on:click="reverseMessage">Reverse</button>

        <ol>
            <li v-for="todo in todos">{{todo.name}} | {{todo.priority}} | {{todo.done}}</li>
        </ol>

    </div>





</template>



<style>


</style>



<script>

    export default {

        data(){

            return {

            message: 'hola que tal',
            seen: false,
            todos: [],

            }


        },

        created() {
            console.log('Component todolist ready.')
            this.fetchData();
        },

        methods: {

        reverseMessage: function() {
            this.message = this.message.split('').reverse().join('');
        },

        fetchData: function() {
        // GET /someUrl
            this.$http.get('/api/v1/task').then((response) => {
            this.todos = response.data.data;
            }, (response) => {
            // error callback
            sweetAlert("Oops...", "Something went wrong!", "error");
            console.log(response);
        });

        }

        }

        }




</script>


<!--data: {-->

<!--message:'Hello Vue!',-->
<!--seen: false,-->
<!--todos: [-->

<!--{-->

<!--name: 'Learn JC',-->
<!--done: true,-->
<!--priority: 27-->

<!--},-->
<!--{-->

<!--name: 'Learn PHP',-->
<!--done: false,-->
<!--priority: 13-->

<!--},-->
<!--{-->

<!--name: 'Learn Pa',-->
<!--done: false,-->
<!--priority: 23-->

<!--}-->

<!--]-->


<!--},-->

<!--methods: {-->

<!--reverseMessage: function() {-->
<!--this.message = this.message.split('').reverse().join('');-->
<!--},-->

<!--fetchData: function() {-->
<!--// GET /someUrl-->
<!--this.$http.get('/api/v1/task').then((response) => {-->
<!--this.todos = response.data.data;-->
<!--}, (response) => {-->
<!--// error callback-->
<!--sweetAlert("Oops...", "Something went wrong!", "error");-->
<!--console.log(response);-->
<!--});-->
<!--}-->
<!--},-->

<!--created: function() {-->
<!--console.log('Component created!');-->
<!--this.fetchData()-->
<!--}-->