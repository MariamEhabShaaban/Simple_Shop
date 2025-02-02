<?php require 'operation.php'?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Simple_Shop</title>
</head>
<body>
<div class="container mt-5">  
    <form action="" method="POST">
                <select  style ="display:inline"  name="item" class="form-group form-control w-75" required>
                    <?php foreach($items as $item => $price): ?>
                        <option value="<?= $item ?>">
                            <?= $item . " - $" . $price ?>
                        </option>
                    <?php endforeach; ?>
                </select>
                <input    class="form-group btn btn-primary mt-2" type="submit" name="add" value="add to cart">
            
        
    </form>
    <?php if(!empty($_SESSION['cart'])):?>
        <?php $carts=$_SESSION['cart'];?>
        <table class="table mt-5">
        <thead>
            <tr>
                <th>Item</th>
                <th>Price</th>
                <th>Count</th>
                <th>Action</th>
                
            </tr>

        </thead>
        <tbody>
            <?php
            foreach($carts as $item => $cnt):?>
            <tr>
    
                <td><?php echo $item?></td>
                <td><?php echo $items[$item]?></td>
                <td><?php echo $cnt?></td>
                <td>
                    <form action="" method="POST">
                        <input type="hidden" name="item" value="<?php echo $item?>">
                        <button name="remove" class="btn btn-outline-danger mt-2">Remove</button>
                    </form>
                    
                </td>
            </tr>
            <?php endforeach;?>
        </tbody>
        <tfoot>
            <?php $total=0;
      foreach($_SESSION['cart'] as $item => $num){
           $total+=$items[$item]*$num;
      }?>
            <tr>
            <td><h3><b>Total</b></h3></td>
            <td><?php echo "<h3><b>$total  $ </h3></b>"?></td>
            </tr>
        </tfoot>
    </table>
    <?php endif?>
    <?php if(empty($_SESSION['cart'])):?>
        <h3> Your Chart is empty</h3>
    <?php endif?>   
       

</div>
</body>
</html>
