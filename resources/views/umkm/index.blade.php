@extends('template.templatePage')
@section('content')
<!-- jumbotron area -->
<div class="fh5co-hero">
    <div class="fh5co-overlay"></div>
    <div class="fh5co-cover text-center" data-stellar-background-ratio="0.5"
        style="background-image: url({{asset('images/banner/umkm.jpg')}});">
        <div class="desc animate-box">
            <h2>Daftar UMKM Sambirejo</h2>
            <span><a class="btn btn-primary btn-lg" href="#">Get Started</a></span>
        </div>
    </div>
</div>
<!--/ jumbotron end -->

<div class="section-wrap" style="background-color: black">
  <div class="container">
        <?php $j=0;for($i=1;$i<20;$i++):?>
            <p class="text-header text-center mt-3 mb-3">UMKM Dusun ... Sambirejo <?php echo $i ?></p>
            <hr size="100px" width="30%">
        <div class="row mbottom">
            <?php if($j==1){?>
            <div class="col-md-6 mb-4  animate-box">
                <div id="left-content">
                    <p>&nbsp;Lorem ipsum dolor sit, amet consectetur adipisicing elit. Labore, vel id doloribus, nisi quaerat aperiam commodi nemo quam nam consectetur perspiciatis dolorum culpa, sint corporis veritatis quis porro debitis autem?
                        Hic nihil, error, quo id nobis est itaque ab ratione saepe aliquam sed pariatur, voluptatem distinctio suscipit. Quae id magni optio eligendi eaque, debitis, unde dolorem temporibus odio alias corporis.
                    Vel ullam iusto ex impedit numquam molestias, nam sunt cumque quas optio reprehenderit, exercitationem minus illo tempore? Modi explicabo est sit voluptate, cum, ipsum animi ratione praesentium, sequi quisquam labore?</p>
                </div>  
            </div>
            <div class="col-md-6 mb-4  animate-fadeInLeft">
                <div id="right-content">
                    <img src="images/img-6.jpg" alt="">
                </div>
            </div>
            <?php $j=0; } else {?>
                <div class="col-md-6 mb-4 animate-fadeInRight">
                    <div id="right-content">
                    <img src="images/img-6.jpg" alt="">
                </div>
            </div> 
                <div class="col-md-6  animate-box">
                <div id="left-content">
                    <p>&nbsp;Lorem ipsum dolor sit, amet consectetur adipisicing elit. Labore, vel id doloribus, nisi quaerat aperiam commodi nemo quam nam consectetur perspiciatis dolorum culpa, sint corporis veritatis quis porro debitis autem?
                        Hic nihil, error, quo id nobis est itaque ab ratione saepe aliquam sed pariatur, voluptatem distinctio suscipit. Quae id magni optio eligendi eaque, debitis, unde dolorem temporibus odio alias corporis.
                    Vel ullam iusto ex impedit numquam molestias, nam sunt cumque quas optio reprehenderit, exercitationem minus illo tempore? Modi explicabo est sit voluptate, cum, ipsum animi ratione praesentium, sequi quisquam labore?</p>
                </div>  
            </div>
            <?php $j=1; } ?> 
        </div>
        <?php endfor;?>
    </div>
</div>
@endsection