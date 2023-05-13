<?php 

include "../../php/functions.php";
includeWithVariables('../template/header.php', array('title' => 'Pert-19 PHP 4'));
include "../../php/session.php";


?>
<div class="container mt-4">
    <div class="card row p-3">
        <?php
            if(!empty($_SESSION['warning']))
            {
            ?>
                <div class="alert alert-danger"><?=$_SESSION['warning']?></div>
            <?php
            session_destroy();
            }
        ?>
        <span class="mb-2" ><a class="btn btn-md btn-success fw-semibold" href="<?=baseUrl()?>/views/pertemuan_19/add_user.php"><i class="fas fa-user-plus"></i> Add User</a></span>
        
        <div class="table-responsive">
            <table class="table table-hover text-center">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Email</th>
                        <th>Name</th>
                        <th>Avatar</th>
                        <th>Phone Number</th>
                        <th>Address</th>
                        <th>Role</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $result = selectUsers("users");
                        if($result->num_rows > 0){
                            $i = 1;
                            while($row = $result->fetch_assoc()) {
                                $trimmedAddress = substr($row['address'], 0,50);
                                ?>
                                <tr>
                                    <td><?=$i;?></td>
                                    <td><?=$row['email']?></td>
                                    <td><?=$row['name']?></td>
                                    <td>
                                        <?php
                                            if(!empty($row['avatar'])){
                                                echo "<img style='width:50px; height:auto;' class='img-thumbnail rounded' src='".baseUrl()."/assets/avatar/".$row['avatar']."' alt='".$row['avatar']."'>";
                                            }else{
                                                echo "<img style='width:50px; height:auto;' class='img-thumbnail rounded' src='".baseUrl()."/assets/avatar/default.jpg' alt='default avatar'>";
                                            }
                                        ?>
                                    </td>
                                    <td><?=$row['phone']?></td>
                                    <td><?=$trimmedAddress?></td>
                                    <td><?=$row['role_name']?></td>
                                    <td>
                                        <a class="btn btn-warning" href="<?=baseUrl()?>/views/pertemuan_19/edit_user.php?id=<?=$row['users_id']?>"><i class="fas fa-edit fa-sm"></i></a>
                                        <a class="btn btn-danger" href="<?=baseUrl()?>/php/user_model.php?action=deleteUsers&id=<?=$row['users_id']?>"><i class="fas fa-trash fa-sm"></i></a>
                                    </td>
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
include "../template/footer.php";
?>