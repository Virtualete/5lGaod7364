@extends('layouts.master')

@section('title','Shop')

@section('content')

     <!--********** TIENDA *********** -->
     <div class="content-shop">
     <div class="letter-shop">TIENDA</div>
        <div class="shop">
        <div class="card-deck">
                <div class="card">
                        <img class="card-img-top" src="{{ asset('storage/rich.png') }}" alt="Card image cap">
                        <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content.
                                        This content is a little bit longer.</p>
                                <p class="card-text">
                                        <small class="text-muted">Last updated 3 mins ago</small>
                                </p>
                        </div>
                </div>
        </div>
    </div>
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
