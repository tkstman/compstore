<?php
  session_start();
  if(isset($_SESSION['ulogin']))
  {
  }
  else
  {
    header('location: signin.php');
  }
 ?>
<!DOCTYPE html>

<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Jekyll v3.8.5">
  <title>Catalog</title>

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
  </style>
  <!-- Custom styles for this template -->
  <link href="styles/signup.css" rel="stylesheet">
</head>
  <body class="text-center">
    <div class="container">
      <nav class="navbar navbar-light bg-light justify-content-between">
        <div>
          <a class="navbar-brand" href="index.php" style="padding: 10px;border: 1px solid #b3b3b3;" href="account.php">Account</a>
          <a class="navbar-brand" href="logout.php" style="padding: 10px;border: 1px solid #b3b3b3;" href="logout.php">Sign Out</a>
        </div>
        <form class="form-inline my-2 my-lg-0">
          <input id="inputsearch" class="form-control " type="search" aria-label="Search" placeholder="Search: eg Brand, Model, Category" required="" autofocus="">
          <button id="searchbtn" class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
      </nav>
      <div id="searchresults">

      </div>

      <!--Modal For Adding Address-->
      <div class="modal fade" id="addressModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="addressModalLabel">New Address</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form>
                <div class="form-group">
                  <label for="recipient-name" class="col-form-label">Address:</label>
                  <input type="text" class="form-control" id="address-name">
                </div>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary" id="saveAddress">Save Address</button>
            </div>
          </div>
        </div>
      </div>

      <!--Modal For Adding Card-->
      <div class="modal fade" id="cardModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="cardModalLabel">New Card</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form>
                <div class="form-group">
                  <label for="recipient-name" class="col-form-label">Card Number:</label>
                  <input type="text" class="form-control" id="cardnumber">
                </div>
                <div class="form-group">
                  <label for="message-text" class="col-form-label">Name:</label>
                  <input type="text" class="form-control" id="cardname">
                </div>
                <div class="form-group">
                  <label for="month">Month:</label>
                  <select class="form-control" id="month">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                    <option>6</option>
                    <option>7</option>
                    <option>8</option>
                    <option>9</option>
                    <option>10</option>
                    <option>11</option>
                    <option>12</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="year">Year:</label>
                  <select class="form-control" id="year">
                    <option>2019</option>
                    <option>2020</option>
                    <option>2021</option>
                    <option>2022</option>
                  </select>
                </div>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary" id="saveCard" >Save Card</button>
            </div>
          </div>
        </div>
      </div>

  </body>
  <script src="js/main.js"></script>
</html>
