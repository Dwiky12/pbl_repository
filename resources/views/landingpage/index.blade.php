{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <header class="bg-primary text-white text-center py-5">
        <h1>Welcome to Our Application</h1>
        <p>Your solution for everything</p>
    </header>
    
    <section class="container py-5">
        <h2>Vision and Mission</h2>
        @if($visiMisi)
            <p><strong>Vision:</strong> {{ $visiMisi->visi }}</p>
            <p><strong>Mission:</strong> {{ $visiMisi->misi }}</p>
        @else
            <p>No vision and mission available.</p>
        @endif
    </section>
    
    <section class="container py-5">
        <h2>Study Program Profiles</h2>
        <div class="row">
            @foreach($profilProdi as $profile)
                <div class="col-md-4">
                    <h3>{{ $profile->nama_prodi }}</h3>
                    <p>{{ $profile->deskripsi }}</p>
                </div>
            @endforeach
        </div>
    </section>
    
    <section class="container py-5">
        <h2>Curriculum Documents</h2>
        <div class="row">
            @foreach($dokumenKurikulum as $kurikulum)
                <div class="col-md-4">
                    <h3>{{ $kurikulum->nama_kurikulum }}</h3>
                    <p>{{ $kurikulum->tahun_pemberlakuan }} - {{ $kurikulum->semester }}</p>
                </div>
            @endforeach
        </div>
    </section>
    
    <section class="container py-5">
        <h2>SOPs</h2>
        <div class="row">
            @foreach($sop as $sop)
                <div class="col-md-4">
                    <h3>{{ $sop->nama_sop }}</h3>
                    <p>{{ $sop->deskripsi }}</p>
                </div>
            @endforeach
        </div>
    </section>
    
    <section class="container py-5">
        <h2>Tenaga Ahli</h2>
        <div class="row">
            @foreach($tenagaAhli as $ahli)
                <div class="col-md-4">
                    <h3>{{ $ahli->nama_tenagaahli }}</h3>
                    <p>{{ $ahli->asal_instansi }} - {{ $ahli->bidang_keahlian }}</p>
                </div>
            @endforeach
        </div>
    </section>
    
    <section class="container py-5">
        <h2>Koleksi Jurnal</h2>
        <div class="row">
            @foreach($koleksiJurnal as $jurnal)
                <div class="col-md-4">
                    <h3>{{ $jurnal->nama_jurnal }}</h3>
                    <p>{{ $jurnal->penerbit }} - {{ $jurnal->tahun }}</p>
                </div>
            @endforeach
        </div>
    </section>
    
    <footer class="bg-dark text-white text-center py-3">
        &copy; 2024 Your Company. All rights reserved.
    </footer>
</body>
</html>
 --}}

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Business Frontpage - Start Bootstrap Template</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="{{asset('Landing')}}/assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{asset('Landing')}}/css/styles.css" rel="stylesheet" />
    </head>
    <body>
        <!-- Responsive navbar-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container px-5">
                <a class="navbar-brand" href="#!">Start Bootstrap</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="#!">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="#!">About</a></li>
                        <li class="nav-item"><a class="nav-link" href="#!">Contact</a></li>
                        <li class="nav-item"><a class="nav-link" href="#!">Services</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Header-->
        <header class="bg-dark py-5">
            <div class="container px-5">
                <div class="row gx-5 justify-content-center">
                    <div class="col-lg-6">
                        <div class="text-center my-5">
                            <h1 class="display-5 fw-bolder text-white mb-2">Present your business in a whole new way</h1>
                            <p class="lead text-white-50 mb-4">Quickly design and customize responsive mobile-first sites with Bootstrap, the world’s most popular front-end open source toolkit!</p>
                            <div class="d-grid gap-3 d-sm-flex justify-content-sm-center">
                                <a class="btn btn-primary btn-lg px-4 me-sm-3" href="#features">Get Started</a>
                                <a class="btn btn-outline-light btn-lg px-4" href="#!">Learn More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Features section-->
        <section class="py-5 border-bottom" id="features">
            <div class="container px-5 my-5">
                <div class="row gx-5">
                    <div class="col-lg-4 mb-5 mb-lg-0">
                        <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-collection"></i></div>
                        <h2 class="h4 fw-bolder">Featured title</h2>
                        <p>Paragraph of text beneath the heading to explain the heading. We'll add onto it with another sentence and probably just keep going until we run out of words.</p>
                        <a class="text-decoration-none" href="#!">
                            Call to action
                            <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                    <div class="col-lg-4 mb-5 mb-lg-0">
                        <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-building"></i></div>
                        <h2 class="h4 fw-bolder">Featured title</h2>
                        <p>Paragraph of text beneath the heading to explain the heading. We'll add onto it with another sentence and probably just keep going until we run out of words.</p>
                        <a class="text-decoration-none" href="#!">
                            Call to action
                            <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                    <div class="col-lg-4">
                        <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-toggles2"></i></div>
                        <h2 class="h4 fw-bolder">Featured title</h2>
                        <p>Paragraph of text beneath the heading to explain the heading. We'll add onto it with another sentence and probably just keep going until we run out of words.</p>
                        <a class="text-decoration-none" href="#!">
                            Call to action
                            <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </section>
        <footer class="py-5 bg-dark">
            <div class="container px-5"><p class="m-0 text-center text-white">Copyright &copy; Your Website 2023</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="{{asset('Landing')}}/https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="{{asset('Landing')}}/js/scripts.js"></script>
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script src="{{asset('Landing')}}/https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    </body>
</html>

