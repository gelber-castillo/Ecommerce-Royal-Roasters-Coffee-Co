<html>
<head>
  <?php
  session_start();
  require_once('functions.php');
  include "header.php";
  check_valid_user();
  ?>
</head>
<body>
  <?php
  $selected_coffeeID = $_GET['selected_coffeeID'];

  @ $db = new mysqli('localhost', 'root', '', 'RoyalRoasters');
  if (mysqli_connect_errno()) {
     echo "Error: Could not connect to database.  Please try again later.";
     exit;
  }

  $query = 'select * from coffee where coffeeID='.$selected_coffeeID;

  $result = $db->query($query);
  $array = mysqli_fetch_assoc($result);

  $coffeeID = $array['coffeeID'];
  $coffeeName = $array['coffeeName'];
  $origin =$array['origin'];
  $roast = $array['roast'];
  $desc = $array['description'];
  $inventory  = $array['inventory'];
  $price = $array['price'];
  ?>

  <div class="Poster">
    <div class="imgPoster">
      <img src="images/comingsoon.png" style="width:250px; height:220px;">
    </div>
        <div class="infoPoster">
          <h2><?php echo $coffeeName; ?></h2>
          <h3><?php echo $desc; ?></h3>
          <h4>ID: <?php echo $coffeeID; ?></h4>
          <h4>Origin: <?php echo $origin; ?></h4>
          <h4><?php echo $inventory; ?> in stock</h4>
          <h4>Roast: <?php echo $roast; ?></h4>
          <h4>$<?php echo $price; ?></h4>
          <form action="cart.php" method="get">
            <input type="number" min="1" max=<?php echo $inventory ?> name="quantity" size="5" value="quantity">
            <input type="hidden" name="selected_coffeeID" value=<?php echo $coffeeID; ?> />
            <button>Add to cart</button>
          </form>
        </div>
  </div>

  <?php
  $result->free();
  $db->close(); ?>
</body>
</html>
