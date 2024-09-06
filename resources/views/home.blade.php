<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>

<!-- Header -->
<header class="bg-primary text-white text-center py-3">
    <h1>{{__('Herderson Technologies')}}</h1>
</header>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">HendersonTech</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('posts.index') }}">Post</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('post-categories.index') }}">Categories</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#contact-form">Contact</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Slider -->
<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="{{asset('images/post'.rand(1, 2).'.png')}}" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
            <img src="{{asset('images/post'.rand(1, 2).'.png')}}" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
            <img src="{{asset('images/post'.rand(1, 2).'.png')}}" class="d-block w-100" alt="...">
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

<!-- Post Cards (3 columns, 2 rows) -->
<section class="container my-5">
    <div class="row">
        @if (!$posts->count())
            <div class="col-md-4">
                <div class="card post-card">
                    <img src="https://via.placeholder.com/350x150" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Post Title 1</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        <a href="#" class="btn btn-primary">Read More</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card post-card">
                    <img src="https://via.placeholder.com/350x150" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Post Title 2</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        <a href="#" class="btn btn-primary">Read More</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card post-card">
                    <img src="https://via.placeholder.com/350x150" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Post Title 3</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        <a href="#" class="btn btn-primary">Read More</a>
                    </div>
                </div>
            </div>
        @endif
        @foreach ($posts as $keyPostDatum => $datumPost)
            <div class="col-md-4">
                <div class="card post-card">
                    @if($datumPost->image)
                        <img
                            src="{{asset('/uploads/posts/' . $datumPost->image)??'https://via.placeholder.com/350x150'}}"
                            height="150" width="350" class="card-img-top" alt="...">
                    @else
                        <img src="{{asset('images/post'.rand(1, 2).'.png')}}"
                             height="150" width="350" class="card-img-top" alt="...">
                    @endif

                    <div class="card-body">
                        <h5 class="card-title">{{$datumPost->title}}</h5>
                        <p class="card-text">{{ substr($datumPost->body ?? '',0,50 )}}..</p>
                        <a href="{{ URL::to($postUrl) . '/' . $datumPost->id }}" class="btn btn-primary">Read More</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="row">
        <div class="col">
            <nav>
                {{ $posts->appends(request()->query())->links('pagination::bootstrap-4') }}
            </nav>
        </div>
    </div>
    <div class="row">

        @foreach($apiPosts as $key=> $apiPostDatum)
            @if($key<6)
                <div class="col-md-4">
                    <div class="card post-card">
                        <img src="https://via.placeholder.com/350x150" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{$apiPostDatum['title']}}</h5>
                            <p class="card-text">{{$apiPostDatum['body']}}</p>
                            <a href="#" class="btn btn-primary">Read More</a>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
</section>

<!-- Contact Form -->
<section class="container mb-5">
    <h2>Contact Us</h2>
    <form class="contact-form" id="contact-form">
        <div class="mb-3">
            <label for="name" class="form-label">Full Name</label>
            <input type="text" class="form-control" id="name" placeholder="Enter your full name">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" placeholder="Enter your email">
        </div>
        <div class="mb-3">
            <label for="message" class="form-label">Message</label>
            <textarea class="form-control" id="message" rows="3" placeholder="Enter your message"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</section>

<!-- Footer -->
<footer class="footer">
    <p>Follow us on:</p>
    <div class="social-icons">
        <a href="#"><i class="fab fa-facebook"></i></a>
        <a href="#"><i class="fab fa-instagram"></i></a>
        <a href="#"><i class="fab fa-linkedin"></i></a>
        <a href="#"><i class="fab fa-youtube"></i></a>
        <a href="#"><i class="fab fa-quora"></i></a>
    </div>
    <p>&copy; 2024 Your Company. All rights reserved.</p>
</footer>

<!-- Bootstrap JS & FontAwesome Icons -->
<script src="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free/js/all.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
