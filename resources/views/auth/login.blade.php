@extends("layouts.app")

@section("title")
  Login
@endsection

@section("content")
  <!-- Page content-->
  <section class="py-5">
    <div class="container px-5">
      <!-- Contact form-->
      <div class="bg-light rounded-4 py-5 px-4 px-md-5">
        <div class="text-center mb-5">
          <h1 class="fw-bolder">Login</h1>
        </div>
        <div class="row gx-5 justify-content-center">
          <div class="col-lg-8 col-xl-6">
            <form id="contactForm" data-sb-form-api-token="API_TOKEN" method="POST" action={{ route("login") }}>
              @csrf
              <!-- Email address input-->
              <div class="form-floating
              mb-3">
                <input class="form-control" id="email" type="email"
                  class="form-control @error("email") is-invalid @enderror" name="email" value="{{ old("email") }}"
                  required autocomplete="email" autofocus />
                @error("email")
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
                <label for="email">Email address</label>
                <div class="invalid-feedback" data-sb-feedback="email:required">An email is required.</div>
                <div class="invalid-feedback" data-sb-feedback="email:email">Email is not valid.</div>
              </div>
              <!-- Pass input-->
              <div class="form-floating mb-3">
                <input class="form-control" id="password" type="password"
                  class="form-control @error("password") is-invalid @enderror" name="password" required
                  autocomplete="current-password" />
                @error("password")
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
                <label for="name">Password</label>
                <div class="invalid-feedback" data-sb-feedback="name:required">A password is required.</div>
              </div>
              <!-- Submit Button-->
              <div class="d-grid">
                <button class="btn btn-primary btn-lg border-0" id="submitButton" type="submit"
                  style="background-color: #008ABA">
                  Login
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
