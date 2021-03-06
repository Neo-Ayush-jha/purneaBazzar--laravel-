<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Purnea Bazaar</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light "
        style="background-image: linear-gradient(to right, rgba(32, 40, 119, 1), rgba(55, 46, 149, 1), rgba(83, 49, 177, 1), rgba(114, 48, 205, 1), rgba(150, 41, 230, 1)) !important">
        <div class="container">
            <a class="navbar-brand text-light" href="/">#Purnea Bazar</a>
            <form action="" method="GET" class="d-flex">
                <input type="text" class="form-control" size="70">
                <input type="submit" name="find" class="btn btn-success">
            </form>
            <ul class="navbar-nav ">
                <li class="nav-item"><a href="{{route("home")}}" class="nav-link text-light"><strong>Home</strong></a></li>
                <li class="nav-item"><a href="{{route("cart")}}" class="nav-link text-light"><strong>Cart</strong></a></li>
                @guest
                <li class="nav-item"><a href="{{route("register")}}" class="nav-link text-light"><strong>Signup</strong></a></li>
                <li class="nav-item"><a href="{{route("login")}}" class="nav-link text-light"><strong>Login</strong></a></li>

                @endguest

                @auth
                <li class="nav-item"><form action="{{route("logout")}}" method="POST">
                    @csrf
                    <input type="submit" class="nav-link text-light bg-transparent border-0 fw-bold" value="Logout">
                    </form>
                </li>

                @endauth
            </ul>
        </div>
    </nav>
    @section('ayush')

    @show
    <div class="container-fluid">
        <div class="row text-light"style="background-image: linear-gradient(to right, rgba(32, 40, 119, 1), rgba(55, 46, 149, 1), rgba(83, 49, 177, 1), rgba(114, 48, 205, 1), rgba(150, 41, 230, 1)) !important">
            <h4 class="text-center mb-5 mt-3 ">Purnea Bazar</h4>
            <div class="col-3 mx-auto my-auto">
                {{-- <div class="col my-auto"> --}}
                    <p class="fs-5">Quick link</p>
                    <p class="fw-light">Home</p>
                    <p class="fw-light">About</p>
                    <p class="fw-light">Project</p>
                    <p class="fw-light">Workshop</p>
                    <p class="fw-light">Hire us</p>
                {{-- </div> --}}
            </div>
            <div class="col-3 mx-auto my-auto">
                <p class="fs-5">About Class</p>
                <p class="fw-light">About Instructor</p>
                <p class="fw-light">MileStones</p>
                <p class="fw-light">Community</p>
                <p class="fw-light">Our Tea,</p>
            </div>
            <div class="col-3 mx-auto my-auto">
                <p class="fs-5">Ramavtar Market, Near Dog Hospital</p>
                <p class="fw-light">Thana Chowk, Gandhinagar, Madhubani, Purnea - 854301</p>
                <p class="fw-light">9117685337</p>
                <p class="fw-light">www.ayush91176@gmail.com</p>
            </div>
            
            <p class="fw-light text-center">?? Code with Ayush Jha, All rights reserved</p>
        </div>
    </div>
</body>

</html>
