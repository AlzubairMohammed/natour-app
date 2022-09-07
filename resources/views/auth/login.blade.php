
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Fav icon -->
  <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('web/logos/favicon.png') }}">
  <!-- custome css -->
  <link rel="stylesheet" href="{{ asset('web/css/login.css') }}">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="{{ asset('web/css/bootstrap.css') }}">
  <!-- Font awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  <title>Log In</title>
</head>

<body>
  <div class="login" style="">
    <div class="container">
      <div class="row">
        <div class="col-md-6 m-auto">
          <div class="card mt-1 mt-md-5 shadow">
            <div class="card-body form-size">
              <form role="form" class="pui-form" id="loginform"  method="POST" action="{{ route('login') }}"> @csrf
                <div class="header text-center">
                  <img src="{{ asset('web/logos/logo.svg') }}" width="190">
                  <h3 class="mt-3">Admin Login</h3>
                  <p>This is a secure system and you will need to provide tour login detalis to access the site</p>
                </div>

                <div class="inputBox mb-3">
                  <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}"  placeholder="Email">
                  @error('email')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>

                  <div class="input passwordInput">
                    <input type="password" name="password"  placeholder="Password" class="form-control @error('password') is-invalid @enderror" id="password"/>
                    <span class="eye">
                      <i class="fas fa-eye" id="togglePassword"></i>
                  </span>
                  </div>
                  @error('password')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror

                <div class="form-check checkbox mt-3">
                  <input type="checkbox" class="form-check-input" id="exampleCheck1">
                  <label class="form-check-label" for="exampleCheck1">Remember password</label>
                </div>
                <button type="submit" class="btn btncustom w-100">Login</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script>
    const togglePassword = document.querySelector("#togglePassword");
    const password = document.querySelector("#password");

    togglePassword.addEventListener("click", function () {
        // toggle the type attribute
        const type = password.getAttribute("type") === "password" ? "text" : "password";
        password.setAttribute("type", type);
        
        // toggle the icon
        this.classList.toggle("fa-eye-slash");
    });
  </script>
</body>

</html>
