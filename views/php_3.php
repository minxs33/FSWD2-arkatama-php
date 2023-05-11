<?php 

include "../php/functions.php";

includeWithVariables('template/header.php', array('title' => 'Pert-18 PHP 3'));

?>
<div class="container mt-4">
    <div class="row">
        <div class="card p-3">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Category</th>
                    <th>Products Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $result = selectProducts();
                    if($result->num_rows > 0){
                        $i = 1;
                        while($row = $result->fetch_assoc()) {
                            $trimmedDescription = substr($row['description'], 0,50);
                            ?>
                            <tr>
                                <td><?=$i;?></td>
                                <td><?=$row['category_name']?></td>
                                <td><?=$row['products_name']?></td>
                                <td><?=$trimmedDescription?></td>
                                <td><?=$row['price']?></td>
                                <td><?=$row['status']?></td>
                            </tr>
                            <?php
                            $i++;
                          }
                    }

                ?>
            </tbody>
        </table>
        </div>
    </div>
</div>
<?php
include "template/footer.php";
?>