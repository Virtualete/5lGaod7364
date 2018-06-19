@extends('layouts.master')

@section('title','Index')

@section('content')

    <div class="content-index">
       
    <img class="index-background" src="{{ asset('storage/pellets.gif') }}">
    <a href="http://beta.pellets.io:8080" class="btn btn-lg btn-secondary button-play">PLAY</a>   
</div>

<main role="main">

<section class="jumbotron text-center">
  <div class="container">
    <h1 class="jumbotron-heading">Latest News</h1>
    <p class="lead text-muted">Something short and leading about the collection below—its contents, the creator, etc. Make it short and sweet, but not too short so folks don't simply skip over it entirely.</p>
  </div>
</section>

<div class="album py-5 bg-light">
  <div class="container">

    <div class="row">
 
 <div class="col-md-4">
        <div class="card mb-4 box-shadow">

             <img  class="card-img-top" src="{{ asset('storage/pellets4.png') }}" alt="" class="">
          <div class="card-body">
            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
            <div class="d-flex justify-content-between align-items-center">
              <div class="btn-group">
                <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
              </div>
              <small class="text-muted">9 mins</small>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card mb-4 box-shadow">
        <img  class="card-img-top" src="{{ asset('storage/pellets2.png') }}" alt="" class="">
          <div class="card-body">
            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
            <div class="d-flex justify-content-between align-items-center">
              <div class="btn-group">
                <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
              </div>
              <small class="text-muted"> 1h</small>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card mb-4 box-shadow">
        <img  class="card-img-top" src="{{ asset('storage/pellets3.png') }}" alt="" class="">
          <div class="card-body">
            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
            <div class="d-flex justify-content-between align-items-center">
              <div class="btn-group">
                <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
              </div>
              <small class="text-muted">2days</small>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

</main>


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
