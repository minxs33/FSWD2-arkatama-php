<?php 

include "../../php/functions.php";
includeWithVariables('../template/header.php', array('title' => 'Pert-19 PHP 4'));
?>
<style>
    .btn:focus{
    outline: none;
}
</style>
<div class="container mt-4">
    <div class="card p-4">
        <?php
            $id = $_GET['id'];
            $result = selectUsersBy("id",$id);
            $row = $result->fetch_array(MYSQLI_ASSOC);
        ?>
        <form action="<?=baseUrl()?>/php/user_model.php?action=editUsers" method="POST" enctype="multipart/form-data">
        <div class="row">
            <h5 class="text-success fw-bold p-1"><i class="fas fa-user fa-sm"></i> Edit User</h5>
            <hr>
            <input type="hidden" name="id" value="<?=$row['id']?>">
            <div class="mb-3 px-2">
                <label for="name" class="form-label">Full Name</label>
                <input type="text" class="form-control" id="name" name="name" value="<?=$row['name']?>" placeholder="John Doe">
            </div>
            <div class="col-lg-6 p-2">
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?=$row['email']?>" placeholder="email@example.com">
                </div>
                <div class="mb-3">
                    <label for="role" class="form-label">Role</label>
                    <select class="form-select" id="role" name="role" aria-label="Default select example">
                        <?php
                            $result = selectAll("roles");
                            if($result->num_rows > 0){
                                $i = 1;
                                while($row2 = $result->fetch_assoc()) {
                                    if($row['role'] == $row2['id']){
                                        echo "<option value=".$row2['id']." selected>".$row2['role_name']."</option>";
                                        
                                    }else{
                                    ?>
                                        <option value="<?=$row2['id']?>"><?=$row2['role_name']?></option>
                                    <?php
                                    }
                                }
                            }
                        ?>
                    </select>
                </div>
            </div>
            <div class="col-lg-6 p-2">
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <div class="input-group">
                        <input type="password" class="form-control border-end-0" id="password" name="password" placeholder="password">
                        <span class="input-group-append">
                            <button type="button" id="togglePassword" class="btn btn-outline-secondary border-start-0 border ms-n3">
                                <i id="icon" class="fa fa-eye-slash"></i>
                            </button>
                        </span>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Phone Number</label>
                    <input type="text" class="form-control" id="phone" name="phone" value="<?=$row['phone']?>" placeholder="08xxxxxxxxx">
                </div>
            </div>
            <div class="mb-3 px-2">
                <label for="address" class="form-label">Address</label>
                <textarea name="address" class="form-control" id="address" rows="3"><?=$row['address']?></textarea>
            </div>
            <div class="mb-3 px-2">
                <label for="avatar" class="form-label">Avatar</label>
                <input class="form-control" name="avatar" type="file" id="avatar">
            </div>

            <span class="d-flex justify-content-end gap-2">
                <button class="btn btn-warning" type="submit">
                    <i class="fas fa-rotate"></i> Reset
                </button>
                <button class="btn btn-success" type="submit">
                    <i class="fas fa-plus"></i> Submit
                </button>
            </span>
        </div>
    </form>
    </div>
</div>

<script>
    const togglePassword = document
        .querySelector('#togglePassword');
    const password = document.querySelector('#password');
    const icon = document.getElementById('icon');
    togglePassword.addEventListener('click', () => {
        const type = password
            .getAttribute('type') === 'password' ?
            'text' : 'password';
        password.setAttribute('type', type);
        icon.classList.toggle('fa-eye');
    });
</script>

<?php
include "../template/footer.php";
?>