@extends('layouts.master')

@section('title','About Us')

@section('content')

<div class="container marketing">
                <div class="row featurette">
                  <div class="col-md-7 order-md-2">
                    <h2 class="featurette-heading">Oh yeah, it's that good. <span class="text-muted">See for yourself.</span></h2>
                    <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
                  </div>
                </div>
        <!-- *****PERFILES*****  -->
        <div class="row">
          <div class="col-lg-4">
            <img class="rounded-circle"  src="{{ asset('storage/adri.JPG') }}" width="140" height="140">
            <h2>Adrià Buch</h2>
            <p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna.</p>
          </div><!-- /.col-lg-4 -->
          <div class="col-lg-4">
            <img class="rounded-circle" src="{{ asset('storage/victor.jpeg') }}" alt="Generic placeholder image" width="140" height="140">
            <h2>Heading</h2>
            <p>Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh.</p>
          </div><!-- /.col-lg-4 -->
        </div>
        <div class="row">
                        <div class="col-lg-4">
                          <img class="rounded-circle" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Generic placeholder image" width="140" height="140">
                          <h2>Heading</h2>
                          <p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna.</p>
                        </div><!-- /.col-lg-4 -->
                        <div class="col-lg-4">
                          <img class="rounded-circle" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Generic placeholder image" width="140" height="140">
                          <h2>Heading</h2>
                          <p>Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh.</p>
                        </div><!-- /.col-lg-4 -->
                        </div>
      <!-- *****FINAL PERFILES*****  -->

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
