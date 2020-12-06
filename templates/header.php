<!-- https://github.com/tahsinAmin/aNc.git -->
<!-- NOTE: WORK REMAIN
    1. SIGN OUT button if signed in
  2. ..
-->

<head>
  <meta charset="utf-8">
  <title>Online Stationary</title>
  <!-- Compiled and minified CSS -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
   <style media="screen">
     .brand{
       background: #009688 !important;
     }
     .brand-text{
       color: #009688 !important;
     }
     form{
       max-width: 460px;
       margin: 20px auto;
       padding: 20px;
     }
     nav{
       position: fixed;
       top: 0;
       z-index: 1;
     }
   </style>
</head>
  <body class="grey lighten-4">
    <nav class="white z-depth-0">
      <div class="container">
        <a href="dash.php" class="brand-logo brand-text">Arts&Crafts</a> // Work remain. Only goes iff the user is signed in
        <ul id="nav-mobile" class="right hide-on-small-and-down">
          <li><a href="checkout.php" class="btn brand z-depth-0 btn-floating btn-large pulse" style="background-color: #cbb09c !important;"><i class="fas fa-shopping-cart"></i></a></li>
          <li><a href="index.php" class="btn brand z-depth-0">Log Out</a>
          </li>
        </ul>
      </div>
    </nav>
