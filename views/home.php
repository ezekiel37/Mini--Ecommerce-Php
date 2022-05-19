
<idoctype html>
<head>
    <link rel="stylesheet" href="../public/css/style.css">
    <title>scandiweb</title>
</head>
<body>
<Form class="container" method="POST">
    <div class="header">
        <div>
            <h3>Product List</h3>
        </div>
        <div>
            <a style="text-decoration:none" class="savebtn" href="/addproduct">ADD</a>
            <button class="cancelbtn" id="delete-product-btn" type="submit">MASS DELETE</button>
        </div>
    </div>
    <div class="line"></div>
    <div class="boxcontainer">
    <?php
    foreach ($rows as $row) {
    ?>
    <div class="box">
        <input type="checkbox" value="<?php echo $row['id'] ?>" name="id[]" class="delete-checkbox" />
    <?php
        echo '<div class="boxcontent">';
        echo $row['sku'] . "<br>";
        echo $row['name'] . "<br>";
        echo $row['price'] . "$<br>";
        $productSelect = [
            'Book' => $row['weight'].'kg',
            'Dvd' => $row['size'] . 'mb',
            'Furniture' =>$row['height'].'x'.$row['width'].'x'.$row['length'],
        ];
        echo $productSelect[$row['select']];
        echo  '</div> ';
        echo  '</div> ';
    }               
    echo '</div>'; ?>
</Form>
</body>
</html>