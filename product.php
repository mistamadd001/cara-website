<?php 
  include "php/connection.php"; 
  $error=""; 
  $errormsg="";
  if(isset($_GET["itemid"])){ 
    if(!is_numeric($_GET["itemid"])){ 
      $error=true; 
      $errormsg=" Security, Serious error. Contact webmaster: itemid enter: ".$_GET["itemid"];
    }else{
      $ciID=$_GET["itemid"];
      $query = 'SELECT * from products WHERE item_id="'.$ciID.'"';
      $results=mysql_query($query);
      if($results){
        $num = mysql_num_rows($results);
        $row=mysql_fetch_assoc($results);
      }else{ 
        $error=true; 
        $errormsg .=mysql_error(); 
      }
    }
  }
  print_r($errormsg);
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cara Pearson Glass</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">
    <script src="js/jquery.min.js"></script>
    <script>
      $(function(){
        $("#header").load("header.html", function(){
          $(".shop").addClass("active");
        });
      });
      var imgSwitch = function(i){
        document.getElementById('js-img').src = "images/shop/<?php echo $row['item_img'], '_"+i+".png';?>";
      }
    </script>
  </head>
  <body>
    <div class="container-fluid">
      <div id='header'></div>
      <div class='content'>
        <div class='row'>
          <div class='col-md-6'>
            <div class='zoom'>
              <img id='js-img' class='zoom-image <?php if($row["item_quantity"] == 0) echo "unavailable"; ?>' src="images/shop/<?php echo $row['item_img'], '_1.png';?>"></img>
            </div>
            <div class='thumb'>
              <img class='product-image <?php if($row["item_quantity"] == 0) echo "unavailable"?>' onclick='imgSwitch("1")'  src='images/shop/<?php echo $row['item_img']?>_1.png'></img>
              <img class='product-image <?php if($row["item_quantity"] == 0) echo "unavailable"?>' onclick='imgSwitch("2")'  src='images/shop/<?php echo $row['item_img']?>_2.png'></img>
              <img class='product-image <?php if($row["item_quantity"] == 0) echo "unavailable"?>' onclick='imgSwitch("3")'  src='images/shop/<?php echo $row['item_img']?>_3.png'></img>
              <img class='product-image <?php if($row["item_quantity"] == 0) echo "unavailable"?>' onclick='imgSwitch("4")'  src='images/shop/<?php echo $row['item_img']?>_4.png'></img>
            </div>
          </div>
          <div class='col-md-6'>
            <div>
              <h2><?php echo $row['item_name'];?></h2>
              <p><?php echo $row['item_desc'];?></p>
            </div>
            <form action="php/addtocart.php" method="post">
                Quantity
                <label> 
                  <select name="qty" style='color: black;'>; 
                    <?php 
                      if($row['item_quantity']>0){
                        for($i=1; $i<=6; $i++) { 
                          echo '<option value='.$i.'>'.$i.'</option>'; 
                        }
                      }else
                        echo '<option value="unavailable">Item Unavailable</option>';
                    ?>
                  </select> 
                </label>
                <label> 
                  <button type='submit' class='btn btn-primary'><input type="submit" name="submit" value="Add to Cart"/></button>
                </label>
                <input name="iID" type="hidden" value="<?php echo $row['item_id']?>"/>
            </form> 
          </div>
        </div>
      </div>
      <div class='webdev'>
        <span>Produced using <a href='http://C9.io/'>C9.io</a></span>
        <span class='pull-right'>Built by <a href='#'>Huijsse Developments</a></span>
      </div>
    </div>
  </body>
</html>