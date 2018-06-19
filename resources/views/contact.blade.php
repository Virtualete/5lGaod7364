@extends('layouts.master')

@section('title','Contact')

@section('content')
<div class="content-contact">
 <div class="contact">CONTACT</div>
        <div class="container-fluid bg-grey">
                <div class="row"  id="row-contact">
                        <div class="col-sm-5">
                                <p>Contact us and we'll get back to you within 24 hours.</p>
                                <p>
                                        <span class="glyphicon glyphicon-map-marker"></span> Barcelona, CAT</p>
                                <p>
                                <p>
                                        <span class="glyphicon glyphicon-envelope"></span> contact@quantumbitgames.com</p>
                        </div>
                        <div class="col-sm-7">
                                <div class="row">
                                        <div class="col-sm-6 form-group">
                                                <input class="form-control" id="name" name="name" placeholder="Name" type="text" required>
                                        </div>
                                        <div class="col-sm-6 form-group">
                                                <input class="form-control" id="email" name="email" placeholder="Email" type="email" required>
                                        </div>
                                </div>
                                <textarea class="form-control" id="comments" name="comments" placeholder="Comment" rows="5"></textarea>
                                <br>
                                <div class="row">
                                        <div class="col-sm-12 form-group">
                                                <button class="button-contact" type="submit">Send</button>
                                        </div>
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
