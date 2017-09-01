<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--<link rel="stylesheet" href="/bootstrap-3.3.7-dist/css/bootstrap.min.css">-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" 
        integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <header class="jumbotron text-center">
            <h1>YITZ'S STORE</h1>
        </header>

        <table class="table table-bordered">
        <caption class="text-center"><h3>Items in your cart</h3></caption>
            <thead> 
                <tr> 
                    <th class="text-center">Item</th>
                    <th class="text-center">Unit Price</th>
                    <th class="text-center">Quantity</th>
                    <th class="text-center">Total Price</th>
                    <th class="text-center">Change Quantity</th>
                    <th class="text-center">Remove</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($_SESSION['cart'] as $key=>$value): ?>
                <tr>    
                    <td><?= $key ?></td>
                    <td class="text-right">$<?= number_format($items[$key], 2) ?></td>
                    <td class="text-right"><?= $value ?></td>
                    <td class="text-right">$<?= number_format($items[$key]* $value, 2) ?></td>
                    <td class="text-center">
                        <form method="post"> 
                            <input type="number" step="1" min="1" name="changeQuantity">
                            <input type="hidden" name="key" value="<?= $key ?>">
                            <button type="submit" class="btn btn-xs btn-primary">changeQuantity</button>
                        </form>
                    </td>
                    <td class="text-center">
                        <form method="post">
                            <input type="hidden" name="removeItem" value="<?= $key ?>">
                            <button type="submit" class="btn btn-xs btn-primary">remove</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach ?>
            </tbody>
            <tfoot>
                <th colspan="3">Total</th>
                <td class="text-right"><?='$'. number_format($totalPrice, 2) ?></td> 
                <td colspan="2" class="text-right">
                <form method="post">
                    <input type="hidden" name="clearCart" value="clear">
                    <button type="submit" class="btn btn-xs btn-warning">clear cart</button>
                </form>
                </td>
            </tfoot> 
        </table> 

        <form class="form-horizontal" method="post">
            <h3 class="text-center">Add items to your cart</h3>
            <div class="form-group">
                <label for="item" class="col-sm-2 control-label">Select an Item</label>
                <div class="col-sm-10">
                    <select class="form-control" id="item" name="item">
                        <?php foreach ($items as $key=>$value) :?>
                        <option value="<?= $key ?>"><?= $key ?> </option>
                        <?php endforeach ?>
                    </select>
                </div>
            </div>
        
            <div class="form-group">
                <label for="quantity" class="col-sm-2 control-label">Quantity</label>
                <div class="col-sm-10">
                    <input type="number" step="1" min="1" class="form-control" id="quantity" name="quantity" placeholder="quantity" required>
                </div>
            </div>
        
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-primary">Add to cart</button>
                </div>
            </div>
        </form>
    </div>  
</body>
</html>