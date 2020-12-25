@extends('template.templatePage')
@section('content')

@if($TourismPics->isEmpty())
<div class="fh5co-hero" style="height: 360px">
    <div class="fh5co-overlay" style="height: 360px"></div>
    <div class="fh5co-cover text-center" data-stellar-background-ratio="0.5"
        style="background-image: url({{asset('images/cover_bg_1.jpg')}}); height: 360px">
        <div class="desc animate-box">
            <h3>Belum Ada Gambar Wisata</h3>
            @if (Auth::check())
            <h4>Tambah Gambar Wisata {{$tourism->judul}}</h4>
            <span>
                <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#exampleModal">
                    Tambah
                </button>
            </span>
            @endif
        </div>
    </div>
    <!-- form modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"
        style="margin-top: 45px">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <h3 class="modal-title text-center" id="exampleModalLabel">Input Informasi</h3>
                </div>
                <div class="modal-body">
                    <form action="/tourism_pic/{{ $tourism->id_tourism }}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="mb-3">
                            <label for="title" class="col-form-label">Judul Gambar:</label>
                            <input type="text" class="form-control" id="title" name="title">
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Gambar :</label>
                            <input type="file" class="form-control" id="pics" name="pics">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>

                </div>
                </form>
            </div>
        </div>
    </div>
</div>
@else
<!-- banner area -->
<div>
    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
            @foreach($TourismPics as $key => $item)
            <div class="item {{$key == 0 ? 'active' : '' }}">
                <img src="{{asset('imgTourism/tourism_pic/'.$item->pics)}}" alt="..."
                    style="width:max-content; margin:auto; height:360px">
                <div class="container">
                    <!-- banner caption -->
                    <div class="carousel-caption slide-one">
                        <!-- heading -->
                        <h2 class="animated fadeInLeftBig"> {{$item->title}}</h2>
                        @if (Auth::check())
                        <h4>Tambah Gambar Wisata {{$tourism->judul}}</h4>
                        <span>
                            <button type="button" class="btn btn-primary btn-lg" data-toggle="modal"
                                data-target="#exampleModal">
                                Tambah
                            </button>
                        </span>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <!-- form modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"
            style="margin-top: 45px">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                        <h3 class="modal-title text-center" id="exampleModalLabel">Input Informasi
                        </h3>
                    </div>
                    <div class="modal-body">
                        <form action="/tourism_pic/{{ $tourism->id_tourism }}" method="post"
                            enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="mb-3">
                                <label for="title" class="col-form-label">Judul Gambar:</label>
                                <input type="text" class="form-control" id="title" name="title">
                            </div>
                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">Gambar :</label>
                                <input type="file" class="form-control" id="pics" name="pics">
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>

                    </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>
<!--/ banner end -->
@endif
<br>
{{-- Main Card --}}
<div class="fh5co-listing">
    {{-- LIST Wisata --}}
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="fh5co-blog animate-box">
                    <a href="#galery" class="blog-bg"
                        style="background-image: url({{asset('imgTourism/'.$tourism->photos1_tourism)}});">
                    </a>
                    <div class="blog-text">
                        <span class="posted_on">{{$tourism->created_at}}</span>
                        <h3><a href="#">{{$tourism->judul}}</a></h3>
                        <p>{{$tourism->description_tourism}}</p>
                        <div class="text-center">
                            @if($tourism->map_api == null)
                            <h4> Tidak Ada Preview Map </h4>
                            @else
                            <iframe class="center" src="{{ $tourism->map_api }}" width="400" height="300"
                                frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false"
                                tabindex="0"></iframe>
                            @endif
                        </div>
                        <ul class="stuff">
                            <li>
                                <a href="https://api.whatsapp.com/send?phone={{ $tourism->contact }}" target="blank">
                                    <button class="btn btn-success">
                                        <i class="fab fa-whatsapp"></i>
                                    </button>
                                </a>
                                {{ $tourism->contact }}
                            </li>
                            <li>
                                <a href="{{ $tourism->map_url }}" target="_blank"><button class="btn btn-info"><i
                                            class="fas fa-map-marked-alt"></i></button>
                                </a>
                            </li>
                            @if (Auth::check())
                            <li>
                                <form action="{{ route('tourism.destroy', ['tourism' => $tourism->id_tourism]) }}"
                                    method="POST">
                                    {{csrf_field()}}
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="galery" class="fh5co-listing">
    {{-- LIST Wisata --}}
    <div class="container">
        <div class="cls"></div>
        <div class="row">
            @forelse($TourismPics as $item)
            <div class="col-md-4 col-sm-4 fh5co-item-wrap">
                <a class="fh5co-listing-item" data-toggle="modal" data-target="#imageModal">
                    <img src="{{asset('imgTourism/tourism_pic/'.$item->pics)}}" alt="{{ $item->title }}"
                        class="img-responsive">
                    <div class="fh5co-listing-copy">
                        <h2>{{ $item->title }}</h2>
                        <span class="icon">
                            <i class="glyphicon glyphicon-chevron-right"></i>
                        </span>
                    </div>
                </a>
            </div>
            <!-- form modal -->
            <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"
                style="margin-top: 45px">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                            <h3 class="modal-title text-center" id="exampleModalLabel">{{ $item->title }}
                            </h3>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <img src="{{asset('imgTourism/tourism_pic/'.$item->pics)}}" alt="{{ $item->title }}"
                                    class="img-responsive">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <h4 class="text-center white">No Images Yet</h4>
            @endforelse
            <!-- END 3 row -->
        </div>
    </div>

</div>

@endsection

<script>
    $('#imageModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var recipient = button.data('whatever') // Extract info from data-* attributes
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this)
    modal.find('.modal-title').text('New message to ' + recipient)
    modal.find('.modal-body input').val(recipient)
    })
</script>