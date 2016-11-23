<template>
<!--<div>-->
    <!--<p v-show="seen">{{message}}</p>-->
    <!--<input type="text" v-model="message">-->
    <!--<button v-on:click="reverseMessage">Reverse</button>-->
<!--</div>-->
    <table class="table table-bordered">
       <thead>
       <tr>
           <th>Name</th>
           <th>Priority</th>
           <th>Done</th>
       </tr>
       </thead>
        <tbody>
            <tr v-for="todo in todos">
                <td>{{ todo.name }}</td>
                <td>{{ todo.priority }}</td>
                <td>{{ todo.done }}</td>
            </tr>
        </tbody>
    </table>
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


