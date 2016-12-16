<style>
</style>
<template>

</template>
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
            total: 0,
            page: 1
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
            this.todos.push({
                name: value,
                priority: 1,
                done: false
            });
            this.newTodo = '';
        },
        setVisibility: function(visibility) {
            this.visibility = visibility;
        },
        fetchData: function() {
            return this.fetchPage(1);
        },
        fetchPage: function(page) {
            // GET /someUrl
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
        }
    }
}
</script>