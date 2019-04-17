<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Jekyll v3.8.5">
  <title>Sign In</title>

  <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/sign-in/">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.4.0.min.js"></script>

  <!-- Bootstrap core CSS -->
<link href="https://getbootstrap.com/docs/4.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      -ms-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }

    body{
      display: block!important;
    }
  </style>
  <!-- Custom styles for this template -->
  <link href="styles/signup.css" rel="stylesheet">
</head>
  <body class="text-center">
    <nav class="navbar navbar-light bg-light justify-content-between">
      <a class="navbar-brand" href="index.php" style="padding: 10px;border: 1px solid #b3b3b3;">Sign Up</a>
    </nav>
        <form class="form-signup">
          <img class="mb-4" src="data:image/png;base64,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"
          alt="" width="72" height="72">
          <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
          <label for="signinEmail" class="sr-only">Email address</label>
          <input type="email" id="signinEmail" class="form-control" placeholder="Email address" required="">
          <label for="signinPassword" class="sr-only">Password</label>
          <input type="password" id="signinPassword" class="form-control" placeholder="Password" required="">
          <div class="checkbox mb-3">
            <label>
              <input type="checkbox" value="remember-me"> Remember me
              <br/>
            </label>
          </div>
          <button class="btn btn-lg btn-primary btn-block" id="signinbtn" type="submit">Sign In</button>
          <p class="mt-5 mb-3 text-muted">© 2017-2019</p>
        </form>
  </body>
  <script src="js/main.js"></script>
</html>
