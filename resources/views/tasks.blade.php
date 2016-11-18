

@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection


@section('main-content')
    <div id="app">

        <div id="app">

            <p v-if="seen">@{{message}}</p>
            <input type="text" v-model="message"></br>
            </br>
            <button v-on:click="reverseMessage">Reverse</button>

            <ol>
                <li v-for="todo in todos">@{{ todo.name }} | @{{ todo.done }} | @{{ todo.priority }}</li>
            </ol>

        </div>

    </div>
@endsection
