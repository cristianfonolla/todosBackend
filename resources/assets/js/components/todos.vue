<template>
    <!--<div>-->
    <!--<p v-show="seen">{{message}}</p>-->
    <!--<input type="text" v-model="message">-->
    <!--<button v-on:click="reverseMessage">Reverse</button>-->
    <!--</div>-->
    <div>

        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Add Task</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form">
                <div class="box-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Task</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter Task">
                    </div>
                </div>
            </form>
        </div>


        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Tasques</h3>
                <div class="btn-group">
                    <button type="button" class="btn btn-default">{{visibility}}</button>
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                        <span class="caret"></span>
                        <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="#" v-on:click="setVisibility('all')">All</a></li>
                        <li><a href="#" @click="setVisibility('active')">Active</a></li>
                        <li><a href="#/" @click="setVisibility('completed')">Completed</a></li>
                    </ul>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>Task</th>
                        <th>Priority</th>
                        <th>Done</th>
                        <th>Progress</th>
                        <th style="width: 40px">Label</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="(todo, index) in filteredTodos">
                        <td>{{index + from}}</td>
                        <td>{{todo.name}}</td>
                        <td>{{todo.priority}}</td>
                        <td>{{todo.done}}</td>
                        <td>
                            <div class="progress progress-xs">
                                <div class="progress-bar progress-bar-danger" style="width: 55%"></div>
                            </div>
                        </td>
                        <td><span class="badge bg-red">55%</span></td>
                    </tr>
                    </tbody>

                </table>
            </div>
            <!-- /.box-body -->
            <!--TODO http://www.pontikis.net/labs/bs_pagination/demo/-->
            <div class="box-footer clearfix">

                    <span class="pull-left">Showing {{ from }} to {{ to }} of {{ total }} entries</span>

                    <pagination :current-page="1"></pagination>



            </div>
        </div>
    </div>
</template>


<style>


</style>


<script>

import Pagination from './Pagination.vue'

    export default {

    components : { Pagination },

    data() {

        return {

            todos: [],
            visibility: 'all', // 'active' 'completed'
            newTodo: '',
            perPage: 5,
            from: 0,
            to: 0,
            total: 0

        }

    },

        computed: {

            filteredTodos: function() {
                var filters = {
                    all: function (todos) {
                        return todos;
                    },
                    active: function (todos) {
                        return todos.filter(function (todo) {
                            return !todo.done;
                        });
                    },
                    completed: function (todos) {
                        return todos.filter(function (todo) {
                            return todo.done;
                        });
                    }
                }

                return filters[this.visibility](this.todos);


            }

        },

        created() {
            console.log('Component todolist ready.');
            this.fetchData();
        },

        methods: {


        setVisibility: function(visibility) {

            console.log("Han fet click");
            this.visibility = visibility;

        },

        reverseMessage: function() {
            this.message = this.message.split('').reverse().join('');
        },

        fetchData: function() {

            return this.fetchPage(1);

        },

        fetchPage: function(page){

            // GET /someUrl
            this.$http.get('/api/v1/task?page=' + page).then((response) => {
            this.todos = response.data.data;
            this.perPage = response.data.per_page;
            this.to = response.data.to;
            this.from = response.data.from;
            this.total = response.data.total;
            }, (response) => {
            // error callback
            sweetAlert("Oops...", "Something went wrong!", "error");
            console.log(response);

        });


        }





        }

        }







</script>


