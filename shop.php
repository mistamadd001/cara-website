<?php
  include 'php/connection.php';
  $query = 'SELECT * from products';
  $results = mysql_query($query);
  if($results){ 
    $num = mysql_num_rows($results); 
  }else{ 
    echo mysql_error(); 
  } 
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
    </script>
  </head>
  <body>
    <div class="container-fluid">
      <div id='header'></div>
      <div class='content'>
        <table width='100%'>
          <?php  
          if($num>0){ 
            while($row=mysql_fetch_assoc($results)){ 
              if($row['item_quantity']>0){
              ?>
            <tr>
                <td class='image'><a href="product.php?itemid=<?php echo $row['item_id'];?>">
                  <img class='product-image' src="images/shop/<?php echo $row['item_img'];?>"></a></td>
                <td class='name'><a href="product.php?itemid=<?php echo $row['item_id'];?>">
                  <?php echo $row['item_name'];?></a></td>
            </tr> 
            <?php
              }else{
              ?>
              <tr class='unavailable'>
                <td class='image'><a href="product.php?itemid=<?php echo $row['item_id'];?>">
                  <img class='uImg' style='position: absolute;' src='unavailable.png'></img>
                  <img class='product-image' style='filter: blur(40px);' src="images/shop/<?php echo $row['item_img'];?>"></a></td>
                <td class='name'><a href="product.php?itemid=<?php echo $row['item_id'];?>">
                  <?php echo $row['item_name'];?></a></td>
            </tr> 
            <?php  
                }
              }
            }else{   
              ?>
              <tr> 
                <td>No items available.</td> 
              </tr> 
            <?php
            }
          ?>
        </table>
      </div>
      <div class='webdev'>
        <span>Produced using <a href='http://C9.io/'>C9.io</a></span>
        <span class='pull-right'>Built by <a href='#'>Huijsse Developments</a></span>
      </div>
    </div>
  </body>
</html>