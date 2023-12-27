<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="css/login.css">

  <title>SATDIGSA | Login</title>
</head>
<body>


  <div class="row justify-content-center">
    <div class="col-md-5">

    @if(session()->has('status'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      {{ session('status') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

 


   
    <main class="form-signin">
      <form action="/login" method="post">
          @csrf


       <div class="container">

          {{-- LOGO --}}
            <div class="logo">
            <img class="mb-4" src="images/SATDIGSA.png" alt="logo" width="250" height="150">
            </div>

          {{-- FORM USERNAME --}}
          {{-- <div class="form-group">
            <input type="email" name="email" class="form-control" id="email" placeholder="name@example.com" @error('email') is-invalid @enderror autofocus required>
              
              @error('email')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
              @enderror
          </div> --}}
          <div class="form-group">

            <div class="input-group">
              <span class="input-group-text" id="inputGroupPrepend">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                  <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z"/>
                </svg>
              </span>
              <input type="email" name="email" class="form-control" id="email" @error('email') is-invalid @enderror autofocus required>
                
                @error('email')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                @enderror
  
            </div>
          </div>

          {{-- FORM Password --}}      
          <div class="form-group">
            <div class="input-group">

              <span class="input-group-text" id="inputGroupPrepend">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-lock" viewBox="0 0 16 16">
                  <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2zM5 8h6a1 1 0 0 1 1 1v5a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V9a1 1 0 0 1 1-1z"/>
                </svg>
              </span>
              <input type="password" name="password" class="form-control" id="password" required>
              <span class="input-group-text" id="showPasswordToggle">
                <img src="/icon/eye-slash.svg" alt="icon" class="icon">
              </span>
            </div>
          </div>

          <button class="btn btn-light py-2" type="submit">Masuk</button>
       </div>
      </form>
    </main>
  </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="/js/login.js"></script>
</body>
</html>