<style>
</style>
<template>
    <div>
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Add task</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="#">
                <div class="box-body">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="name" class="form-control" id="name" placeholder="Enter task name here"
                               v-model="newTodo"
                               @keyup.enter="addTodo">
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
                        <li><a href="#"  v-on:click="setVisibility('all')">All</a></li>
                        <li><a href="#"  @click="setVisibility('active')">Active</a></li>
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
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <todo v-for="(todo, index) in filteredTodos"
                          v-bind:todo="todo"
                          v-bind:index="index"
                          v-bind:from="from"
                          @todo-deleted="deleteTodo"></todo>

                    <!--<tr >-->
                    <!--<td>{{index + from }}</td>-->
                    <!--<td>{{todo.name}}-->
                    <!--<input v-model="todo.name"> -->
                    <!--</td>-->
                    <!--<td>{{todo.priority}}</td>-->
                    <!--<td>{{todo.done}}</td>-->
                    <!--<td>-->
                    <!--<div class="progress progress-xs">-->
                    <!--<div class="progress-bar progress-bar-danger" style="width: 55%"></div>-->
                    <!--</div>-->
                    <!--</td>-->
                    <!--<td><span class="badge bg-red">55%</span></td>-->
                    <!--</tr>-->
                    </tbody>

                </table>
            </div>
            <!-- /.box-body -->
            <!--
            TODO http://www.pontikis.net/labs/bs_pagination/demo/
            http://fareez.info/blog/pagination-component-using-vuejs/
            https://laravel.com/docs/5.3/pagination
            https://laravel.com/api/5.1/Illuminate/Pagination/AbstractPaginator.html
            -->
            <div class="box-footer clearfix">
                <span class="pull-left">Showing {{ from }} to {{ to }} of {{ total }} entries</span>

                <pagination
                        :current-page="page"
                        :items-per-page="perPage"
                        :total-items="total"
                        @page-changed="pageChanged"></pagination>
            </div>
        </div>
    </div>
</template>
<script>
import Pagination from './Pagination.vue'
import Todo from './Todo.vue'
export default {
    components : { Pagination, Todo },
    data() {
        return {
            todos: [],
            visibility: 'all', // 'active' 'completed'
            newTodo: '',
            perPage: 5,
            from: 0,
            to: 0,
            total: 0,
            page: 1,
            editing: false
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
        console.log('Component todolist created.');
        this.fetchData();
    },
    methods: {
        pageChanged: function(pageNum) {
            this.page = pageNum;
            this.fetchPage(pageNum);
        },
        addTodo: function() {
            var value = this.newTodo && this.newTodo.trim();
            if (!value) {
                return;
            }
            var todo = {
                name: value,
                priority: 1,
                done: false
            };
            this.todos.push(todo);
            this.newTodo = '';
            this.addTodoToApi(todo);
            this.fetchPage(this.page);
        },
        setVisibility: function(visibility) {
            this.visibility = visibility;
        },
        fetchData: function() {
            return this.fetchPage(1);
        },
        addTodoToApi: function(todo) {
            this.$http.post('/api/v1/task', {
                    name: todo.name,
                    priority: todo.priority,
                    done: todo.done
                }).then((response) => {
                console.log(response);
            }, (response) => {
                // error callback
                sweetAlert("Oops...", "Something went wrong!", "error");
                console.log(response);
            });
        },
        fetchPage: function(page) {
            this.$http.get('/api/v1/task?page=' + page).then((response) => {
                console.log(response);
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
        },
        deleteTodo: function(index) {
            this.todos.splice(index,1)
        }
    }
}
</script>
