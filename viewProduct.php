<?php
  session_start();
  require_once('functions.php');
  include "header.php";
  check_valid_user();

  $selected_coffeeID = $_GET['selected_coffeeID'];

  @ $db = DBconnect();
  $query = 'select * from coffee where coffeeID='.$selected_coffeeID;
  $result = $db->query($query);
  $array = mysqli_fetch_assoc($result);

  $coffeeID     = $array['coffeeID'];
  $_SESSION['selected_coffeeID']=$coffeeID;
  $coffeeName   = $array['coffeeName'];
  $origin       = $array['origin'];
  $roast        = $array['roast'];
  $desc         = $array['description'];
  $inventory    = $array['inventory'];
  $price        = $array['price'];
  // image pathing creation. if nonexistant, use palceholder image
  $imgpath      = "images/".$coffeeID.".jpg";
  if (!(file_exists($imgpath))) {
      $imgpath = "images/comingsoon.png";
  }
  ?>

  <div class="Poster">
    <div class="imgPoster">
      <img src=<?php echo $imgpath;?> style="width:250px; height:220px;">
    </div>
        <div class="infoPoster">
          <h2><?php echo $coffeeName; ?></h2>
          <h3><?php echo $desc; ?></h3>
          <h4>ID: <?php echo $coffeeID; ?></h4>
          <h4>Origin: <?php echo $origin; ?></h4>
          <h4><?php echo $inventory; ?> in stock</h4>
          <h4>Roast: <?php echo $roast; ?></h4>
          <h4>$<?php echo $price; ?></h4>
          <form action="cart.php" method="post">
            <input type="number" min="1" max=<?php echo $inventory ?> name="quantity" size="5" required="required">
            <button>Add to cart</button>
          </form>
        </div>
  </div>

  <?php
  $result->free();
  $db->close(); ?>
</body>
</html>
