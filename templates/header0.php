<!-- https://github.com/tahsinAmin/aNc.git -->
<!-- NOTE: WORK REMAIN
    1. SIGN OUT button if signed in
  2. ..
-->

<head>
  <meta charset="utf-8">
  <title>Shop My Crafty Arts</title>
  <!-- Compiled and minified CSS -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
   <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Roboto&family=Yellowtail&display=swap" rel="stylesheet">
<style media="screen">
     body{
       font-family: 'Roboto', sans-serif;
     }
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
   </style>
</head>
  <body class="grey lighten-4">
    <nav class="white z-depth-0">
      <div class="container">
        <!-- // Work remain. Only goes iff the user is signed in -->
        <a href="#" class="brand-logo brand-text" style="font-family: 'Yellowtail', cursive;">Shop My Crafty Arts</a>
        <ul id="nav-mobile" class="right hide-on-small-and-down">
          <li>
            <a href="signup.php" class="btn brand z-depth-0">Sign Up</a>
            <a href="signin.php" class="btn brand z-depth-0">Sign In</a>
          </li>
        </ul>
      </div>
    </nav>
