<?php
    // các thông số
    $host = "localhost";
    $user = "root";
    $pwd = "root";
    $db = "t2507e";
    // b1. kết nối db
    $conn = new mysqli($host,$user,$pwd,$db);
    if($conn->connect_error){
        die("Connect database fail!");
    }
    // b2. query data
    $sql = "select products.*, categories.name as category_name 
                from products left join categories 
                on products.category_id = categories.id";
    $rs = $conn->query($sql);
    // b3. get result (data)
    $data = [];
    if($rs->num_rows > 0){
        while($row=$rs->fetch_assoc()){
            $data[] = $row;
        }
    }
    // var_dump($data);die();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product</title>
    <?php include("html/style.php");?>
</head>
<body>
    <section>
        <div class="container-fluid">
            <div class="row">
                <?php include("html/aside.php");?>
                <main class="col">
                    <h1>Product</h1>
                    <a href="#"class="btn btn-outline-primary">Create a product</a>
                    <table class="table mt-2">
                        <thead>
                            <tr>
                            <th scope="col">#ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Image</th>
                            <th scope="col">Price</th>
                            <th scope="col">Qty</th>
                            <th scope="col">Category</th>
                            <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($data as $item):?>
                            <tr>
                                <th scope="row"><?php echo $item["id"]; ?></th>
                                <td><?php echo $item["name"]; ?></td>
                                <td><img src="<?php echo $item["thumbnail"]; ?>" width="60"/></td>
                                <td><?php echo $item["price"]; ?></td>
                                <td><?php echo $item["qty"]; ?></td>
                                <td><?php echo $item["category_name"]; ?></td>
                                <td>
                                    <a href="#"class="btn btn-outline-info">Edit</a>
                                    <a href="#"class="btn btn-outline-danger">Delete</a>
                                </td>
                            </tr>
                            <?php endforeach;?>
                        </tbody>
                        </table>
                </main>
            </div>
        </div>
    </section>
</body>
</html>