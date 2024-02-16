<!DOCTYPE html>
<html lang="en">


<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>Food App</title>
</head>


<body>
    
    <div class="container my-5">
        <div class="row">
            <div class="col-12">
                <div class="my-3 text-center">
                    <h2>Food App Filters</h2>
                </div>
                <div class="card rounded">
                    <div class="card-body">
                        <div class="row mb-2">
                            <div class="col-sm-4">
                                <div class="text-sm-end">
                                    <div class="input-group">
                                        <!-- <form action="" method="GET"> -->
                                        <form method="post" action="<?= site_url('FormController/search') ?>">
                                            <input type="text" name="product_name" placeholder="Product Name Filter...">
                                            <button type="submit" class="btn btn-primary">Filter</button>
                                        </form><br><br/>                                  
                                    </div>
                                </div>
                            </div>
                        </div>
 
                        <div class="container text-center">
                            <div class="row">     
                                <div class="col-sm">
                                <form method="post" action="<?= site_url('FormController/categorysearch') ?>">
                                        <select class="form-select" name="product_category" placeholder="Search by Item..." aria-label="Default select example">
                                        <option selected>Product Category</option>
                                        <option value="Pizza">Pizza</option>
                                        <option value="Burger">Burger</option>
                                        <option value="Sandwich">Sandwich</option>
                                        </select>
                                        <button type="submit" class="btn btn-primary">Filter</button>
                                </form>
                                </div>
                                <div class="col-sm">
                                <form method="post" action="<?= site_url('FormController/vegnonvegsearch') ?>">
                                        <select class="form-select" name="veg_non_veg" placeholder="Search by Item..." aria-label="Default select example">
                                        <option selected>Veg / Non Veg</option>
                                        <option value="Veg">Veg</option>
                                        <option value="Non-Veg">Non-Veg</option>
                                        </select>
                                        <button type="submit" class="btn btn-primary">Filter</button>
                                </form>
                                </div>
                                <div class="col-sm">
                                <form method="post" action="<?= site_url('FormController/toppingsearch') ?>">
                                        <select class="form-select" name="topping_name" placeholder="Search by Item..." aria-label="Default select example">
                                        <option selected>Toppings</option>
                                        <option value="Mozzarella">Mozzarella</option>
                                        <option value="Cheddar">Cheddar</option>
                                        <option value="Parmesan">Parmesan</option>
                                        </select>
                                        <button type="submit" class="btn btn-primary">Filter</button>
                                </form>
                                </div>
                            </div>
                        </div>

                        <!-- dynamic filter option -->
                        <p>Trying to get filter options from database</p>   
                            <select id="category_filter">
                                <option value="">Select Category</option>
                            </select>
                                <div id="product_list">
                                    <!-- Product list will be displayed here -->
                                </div>
                                <script>
                                $(document).ready(function(){
                                    $.ajax({
                                        url: '<?= site_url('FormController/getProductCategories') ?>',
                                        type: 'GET',
                                        dataType: 'json',
                                        success: function(response){
                                            $.each(response, function(index, category){
                                                $('#category_filter').append('<option value="' + category.product_category + '">' + category.product_category + '</option>');
                                            });
                                        }
                                    });
                                });
                                </script>

                                <!-- <form action="" method="get">
                                        <label for="product_category">Select Category:</label>
                                        <select name="product_category" id="product_category">
                                            <option value="">All Categories</option>
                                            <php foreach ($idata as $category): ?>
                                                <option value="<= $category['product_category'] ?>"><= $category['product_category'] ?></option>
                                            <php endforeach; ?>
                                        </select>
                                        <button type="submit">Filter</button>
                                    </form> -->
<br></br>
                        <!-- Table -->
                        <div class="table-responsive">
                            <table class="table table-bordered table-centered mb-0">
                                <thead>
                                    <tr>
                                        <th>Product_name</th>
                                        <th>Product_description</th>
                                        <th>Product_category</th>
                                        <th>veg_non_veg</th>
                                        <th>topping_name</th>
                                        <th>group_name</th>
                                    </tr>
                                </thead>
                                <tbody>


                        <!-- app/Views/my_results.php -->

                        <?php if (!empty($data)) : ?>
                            <?php foreach ($data as $row) : ?>
                                <tr>
                                <td><?= $row->product_name ?></td>
                                <td><?= $row->product_description ?></td>   
                                <td><?= $row->product_category ?></td>   
                                <td><?= $row->veg_non_veg ?></td>   
                                <td><?= $row->topping_name ?></td>  
                                <td><?= $row->group_name ?></td>  
                                </tr>
                                
                                    <?php endforeach; ?>
                                    <?php else : ?>
                                    <p>No results found.</p>
                                    <?php endif; ?>
                                </tr>

                        <?php if (!empty($pdata)) : ?>
                            <?php foreach ($pdata as $row) : ?>
                                <tr>
                                <td><?= $row->product_name ?></td>
                                <td><?= $row->product_description ?></td>   
                                <td><?= $row->product_category ?></td>   
                                <td><?= $row->veg_non_veg ?></td>   
                                <td><?= $row->topping_name ?></td>  
                                <td><?= $row->group_name ?></td>  
                                </tr>
                                
                                <?php endforeach; ?>
                                    <?php else : ?>
                                    <p>No results found.</p>
                                    <?php endif; ?>
                                </tr>

                                </tbody>
                            </table>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>