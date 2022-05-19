<?php
?>

<head>
    <title>Scandiweb</title>

    <link rel="stylesheet" href="/public/css/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</head>

<body>
    <form method="post" id="product_form">
        <div class="formcontainer">
            <!-- button-->
            <div class="header">
                <div>
                    <h3>Product Add</h3>
                </div>
                <div>
                    <button class="savebtn" id="submitbtn" type="submit">Save</button>
                    <button class="cancelbtn" id="cancel" type="button">Cancel</button>
                </div>
            </div>
            <div class="line"></div>

            <div>

                <label>Sku</label>
                <input id="sku" type="text" name="sku" />
                <small id="skuValid">
                </small>
                <p style="display:none" id="skuflag">true</p>
            </div>
            <div>
                <label>Name</label>
                <input id="name" type="text" name="name" />
                <small id="nameValid">
                </small>
            </div>
            <div>
                <label>Price($)</label>
                <input id="price" type="text" name="price" />
                <small id="priceValid">
                </small>
            </div>
            <div class="switcher">
                <label>Type Switcher</label>

                <select name="select" id="productType">

                    <option value="Dvd" id="Dvd">DVD</option>
                    <option value="Furniture" id="Furniture">Furniture</option>
                    <option value="Book" id="Book">Book</option>
                </select>
            </div>
            <!-- --->
            <div class="product">
                <div class="Dvd">

                    <label>Size (Mb)</label>
                    <input id="size" type="text" name="size" />
                    <small id="sizeValid">
                    </small>
                    <p> Please, provide size in mb </p>
                </div>
                <div class="Furniture">

                    <label>Height (CM)</label>
                    <input id="height" type="text" name="height" /></br>
                    <small id="heightValid">
                    </small>

                    <label>Width (CM)</label>
                    <input id="width" type="text" name="width" /></br>
                    <small id="widthValid">
                    </small>
                    <label>Length (CM)</label>
                    <input id="length" type="text" name="length" /></br>
                    <small id="lengthValid">
                    </small>
                    <p>Please, provide dimensions (HxWxL) in CM </p>
                </div>
                <div class="Book">

                    <label>Weight (Kg)</label>
                    <input id="weight" type="text" name="weight" />
                    <small id="weightValid">
                    </small>
                    <p>Please, provide weight in kg</p>
                </div>
            </div>

        </div>

    </form>
    <script src="/public/js/script.js"></script>
</body>