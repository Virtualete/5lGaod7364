@extends('layouts.master')

@section('title','Pellets')

@section('content')

    <div class="content-index">
       
    <img class="index-background" src="{{ asset('storage/pellets.gif') }}">
    <a href="http://beta.pellets.io:8080" class="btn btn-lg btn-secondary">PLAY</a>   
</div>

@endsection

@section('vue')
<script>
    function escalar(){
        document.getElementById('content').style.height = window.innerHeight/1.3+'px';
    }
    escalar();

    window.onresize = function(){
        escalar();
    }
</script>
@endsection
