<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/css/marketing.css">

    <title>Tweeter Marketing</title>
</head>
<body>
    <nav class="fixed-top navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/marketing') }}">
                <i class="fa fa-twitter text-primary"></i> Marketing
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                </ul>
                <ul class="navbar-nav ml-auto">
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}"> <i class="fa fa-sign-in"></i> {{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}"> <i class="fa fa-file"></i>  {{ __('Register') }}</a>
                            </li>
                        @endif
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('tweetlist') }}"> My Tweets </a>
                                <a class="dropdown-item" href="{{ route('following') }}"> Following </a>
                                <a class="dropdown-item" href="{{ route('followers') }}"> Followers </a>
                                <a class="dropdown-item" href="{{ route('profile', ['user'=> Auth::user()->profile->id ]) }}"> Profile </a>

                                <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>

<section id="secOne">
    <div class="jumbotron mt-5">
        <div class="container">
            <h1 class="display-4">Start with the ones who shape what's happening</h1>
            <br />
            <a class="btn btn-primary btn-lg" href="#secFive" role="button">Learn more</a>
        </div>
    </div>
</section>

<section id="secTwo">
    <div class="jumbotron">
        <div class="container" data-depth="0.6">
            <h6 class="display-4">Ignite the conversation, change the world </h6>
            <p class="lead">
                People on Twitter are its superpower. They start the conversations that change how we
                see the world and, sometimes, how we live in it.
            </p>
        </div>
    </div>
</section>

<section id="secThree">
    <div class="jumbotron jumbotron-fluid">
      <div class="container">
        <h2 class="display-4">
            77% of people on Tweeter are more likely to share their views and recommendations, as opposed
            to 49% of people not on Tweetter
        </h2>
      </div>
    </div>
</section>

<section id="secFive">
    <div class="block">
        <img src="{{ asset('img/community.jpeg') }}" data-speed="-0.25" class="img-parallax" alt="community">
        <h2>Here’s why the world’s biggest headlines, memes, and movements start on Tweetter</h2>
    </div>
    <div class="block">
        <img src="{{ asset('img/alone.jpeg') }}" data-speed="-1" class="img-parallax" alt="alone">
        <h2>Start with the ones who defy convention</h2>
    </div>
    <div class="block">
        <img src="{{ asset('img/different-colors.jpg') }}" data-speed="0.75" class="img-parallax" alt="different colors">
        <h2>Start with the fans in the front row</h2>
    </div>
    <div class="block">
        <img src="{{ asset('img/happy.jpeg') }}" data-speed="1" class="img-parallax" alt="happy">
        <h2>When they’re on Tweetter, they’re different</h2>
    </div>
    <div class="block">
        <img src="{{ asset('img/tweeter.jpg') }}" data-speed="-0.75" class="img-parallax" alt="tweeter">
        <h2>When people on Tweetter speak up, the world listens</h2>
    </div>
</section>

<section id="secFour">
    <div class="jumbotron jumbotron-fluid">
      <div class="container">
          <div class="col-sm-5">
              <h3 class="display-5">My goal is to simplify complexity. I just want to build stuff that really simplifies our base human interaction.</h3>
              <hr>
              <p class="lead">Jack Patrick Dorsey</p>
              <p class="lead"></p>
          </div>
      </div>
    </div>
</section>

<footer>
    @include('layouts/footer')
</footer>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/parallax/3.1.0/parallax.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.7/ScrollMagic.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.7/plugins/debug.addIndicators.min.js"></script>
    <script src="/js/marketing.js"></script>
</body>
</html>
