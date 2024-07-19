<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>@yield("title")</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Custom Google font-->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
      integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
      crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link
      href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@100;200;300;400;500;600;700;800;900&amp;display=swap"
      rel="stylesheet" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ asset("asset/public/css/styles.css") }}" rel="stylesheet" />
    <style>
      .text-color {
        background: linear-gradient(to right, #3A98B9, #1A4453);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
      }

      .nav-link {
        position: relative;
        display: inline-block;
        padding-bottom: 5px;
        color: white;
        text-decoration: none;
      }

      .nav-link::after {
        content: '';
        position: absolute;
        width: 0;
        height: 2px;
        display: block;
        margin-top: 5px;
        left: 50%;
        background: white;
        transition: width 0.3s ease, left 0.3s ease;
      }

      .nav-link:hover::after {
        width: 50%;
        left: 25%;
      }

      .nav-link.active::after {
        width: 50%;
        left: 25%;
      }

      .text-link {
        color: white;
      }

      .text-link:hover {
        color: rgb(235, 235, 235);
      }
    </style>
    @stack("style-img")
  </head>

  <body class="d-flex flex-column h-100">
    <main class="flex-shrink-0">
      <!-- Navigation-->
      <nav class="navbar navbar-expand-lg navbar-light py-3" style="background-color: #3A98B9">
        <div class="container px-5">
          <a class="navbar-brand" href="{{ route("home") }}"><span class="fw-bolder text-white">Isnaeni Emi
              Ardiani</span></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 small fw-bolder">
              <li class="nav-item">
                <a class="nav-link text-white {{ request()->routeIs("home") ? "active" : "" }}"
                  href="{{ route("home") }}">
                  Home
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white {{ request()->routeIs("profile") ? "active" : "" }}"
                  href="{{ route("profile") }}">
                  Profile
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white {{ request()->routeIs("contact") ? "active" : "" }}"
                  href="{{ route("contact") }}">
                  Contact us
                </a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      @if (session("success"))
        <div class="alert alert-success">
          {{ session("success") }}
        </div>
      @endif

      @if ($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif
      @yield("content")
    </main>

    <!-- Footer -->
    <footer class="text-center text-lg-start bg-body-tertiary text-white" style="background-color: #3A98B9">

      <!-- Section: Links  -->
      <section class="border-top">
        <div class="container text-center text-md-start mt-5">
          <!-- Grid row -->
          <div class="row mt-3">
            <!-- Grid column -->
            <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
              <!-- Content -->
              <h6 class="text-uppercase fw-bold mb-4">
                <i class="fas fa-gem me-3"></i>
                @if ($user == null)
                @else
                  {{ $user->name }}
                @endif
              </h6>
              <p>
                @if ($home == null)
                @else
                  {{ $home->deskripsi_about }}
                @endif
              </p>
            </div>
            <!-- Grid column -->

            <!-- Grid column -->
            <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
              <!-- Links -->
              <h6 class="text-uppercase fw-bold mb-4">
                Navigation
              </h6>
              <p>
                <a href="{{ route("home") }}" class="text-reset">Home</a>
              </p>
              <p>
                <a href="{{ route("profile") }}" class="text-reset">Profile</a>
              </p>
              <p>
                <a href="{{ route("contact") }}" class="text-reset">Contact Us</a>
              </p>
            </div>
            <!-- Grid column -->

            <!-- Grid column -->
            <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
              <!-- Links -->
              <h6 class="text-uppercase fw-bold mb-4">Contact</h6>
              @if ($user == null)
                <p><i class="fas fa-home me-3"></i></p>
                <p><i class="fas fa-envelope me-3"></i></p>
                <p><i class="fas fa-phone me-3"></i></p>
                <p>
                  <a href="https://www.linkedin.com/in/isnaeni-emi-46b9a023a/" class="text-decoration-none text-link">
                    <i class="me-3 fab fa-linkedin"></i>
                    Isnaeni Emi Ardiani
                  </a>
                </p>
                <p>
                  <a href="https://github.com/IsnaeniEmi" class="text-decoration-none text-link">
                    <i class="me-3 fab fa-github"></i>
                    Isnaeni Emi
                  </a>
                </p>
              @else
                <p>
                  <i class="fas fa-home me-3"></i>
                  {{ $user->alamat }}
                </p>
                <p>
                  <i class="fas fa-envelope me-3"></i>
                  {{ $user->email }}
                </p>
                <p>
                  <i class="fas fa-phone me-3"></i>
                  {{ $user->telepon }}
                </p>
                <p>
                  <a href="https://www.linkedin.com/in/isnaeni-emi-46b9a023a/" class="text-decoration-none text-link">
                    <i class="me-3 fab fa-linkedin"></i>
                    Isnaeni Emi Ardiani
                  </a>
                </p>
                <p>
                  <a href="https://github.com/IsnaeniEmi" class="text-decoration-none text-link">
                    <i class="me-3 fab fa-github"></i>
                    Isnaeni Emi
                  </a>
                </p>
              @endif
            </div>
            <!-- Grid column -->
          </div>
          <!-- Grid row -->
        </div>
      </section>
      <!-- Section: Links  -->

      <!-- Copyright -->
      <div class="text-center text-white p-4">
        © 2021 Copyright:
        @if ($footer == null)
        @else
          {{ $footer->link_footer }}
        @endif
        <a class="text-reset text-white fw-bold" href="">Isnaeni Emi Ardiani</a>
      </div>
      <!-- Copyright -->
    </footer>
    <!-- Footer -->
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="{{ asset("asset/public/js/scripts.js") }}"></script>
  </body>

</html>
