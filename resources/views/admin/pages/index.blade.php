@extends('admin.layouts.app')

@section('htmlheader_title')
	Home
@endsection

@section('contentheader_title')
	Bienvenue
@endsection

@section('content')
	<div class="container">
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">Home</div>

                <div class="panel-body">
                    You are logged in !
                    <br/>
                    <br/>
                    <img src="{{ asset('/img/yes.gif') }}">
                </div>
            </div>
        </div>
	</div>
@endsection
