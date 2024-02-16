<!DOCTYPE html>
<html lang="en">


<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />

    <title>Food App</title>
</head>


<body>
    
    <div class="container my-5">
        <div class="row">
            <div class="col-12">
                <div class="my-3 text-center">
                <a href="<?= base_url('/search') ?>" class="btn btn-primary">GO TO FILTERING OPTIONS</a>
                <br></br>
                <h2>ENTIRE MENU USING GET METHOD</h2>

                </div>
                <div class="card rounded">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-centered mb-0">
                                <thead>
                                    <tr>
                                        <th style="min-width: 10px">#</th>
                                        <th>Product_name</th>
                                        <th>Product_description</th>
                                        <th>Product_category</th>
                                        <th>veg_non_veg</th>
                                        <th>topping_name</th>
                                        <th>group_name</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    <?php if(!empty($result)){
                                        $i =1;
                                        foreach ($result as $row){
                                        
                                        ?>
                                    <tr>
                                        <td><?= $i ?></td>
                                        
                                        <td><?php echo $row->product_name ?></td>
                                        <td><?php echo $row->product_description ?></td>
                                        <td><?php echo $row->product_category ?></td>
                                        <td><?php echo $row->veg_non_veg ?></td>
                                        <td><?php echo $row->topping_name ?></td>
                                        <td><?php echo $row->group_name ?></td>
                                    </tr>
                                    <?php $i++;
                                    }
                                } ?>

                                </tbody>
                            </table>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>