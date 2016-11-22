<template>



    <table class="table table-bordered">
        <tr>


            <th>Tasca</th>
            <!--<th style="width: 40px">Label</th>-->
        </tr>
        <tr v-for="todo in todos">
                    <!--<p v-show="seen">{{message}}</p>-->
                    <!--<input type="text" v-model="message">-->
                    <!--<button v-on:click="reverseMessage">Reverse</button>-->
                            {{todo.name}} | {{todo.priority}} | {{todo.done}}
            <!--<td><span class="badge bg-red">55%</span></td>-->
        </tr>
        
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


