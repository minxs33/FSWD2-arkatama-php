<?php 

include "php_functions/functions.php";

includeWithVariables('views/template/header.php', array('title' => 'Beranda'));
?>
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-lg-1 col-md-2 col-sm-9 text-center bg-light p-2 border-end-none rounded">
            <img src="<?=baseUrl()."/assets/img/profile.jpg"?>" style="width:100%; height:auto;">
            <small class="text-muted fw-lighter fs-0">Pas Foto</small>
        </div>
        <div class="row col-lg-4 col-md-4 col-sm-9 bg-light p-2 border-start-none rounded">
            <div class="col-lg-6 d-flex flex-column my-1">
                <label class="text-muted fw-bold">Nama Lengkap</label>
                <small class="fw-normal">Naufal Fadhilah Alwan</small>
            </div>
            <div class="col-lg-6 d-flex flex-column my-1">
                <label class="text-muted fw-bold">Tempat Tanggal Lahir</label>
                <small class="fw-normal">Depok, 1 Januari 2002</small>
            </div>
            <div class="col-lg-6 d-flex flex-column my-1">
                <label class="text-muted fw-bold">Alamat</label>
                <small class="fw-normal">Jl.Kolintang 1 No 161, RT.11/RW.09, Kec. Mekarjaya, Kel. Sukmajaya, Kota Depok, Jawa Barat</small>
            </div>
            <div class="col-lg-6 d-flex flex-column my-1">
                <label class="text-muted fw-bold">Riwayat Pendidikan</label>
                <div class="accordion accordion-flush" id="accordionFlushExample">

                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingOne">
                        <button class="accordion-button collapsed px-1 py-0" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                            SD
                        </button>
                        </h2>
                        <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body px-0 py-1">
                                <small class="fw-normal px-3">SDI Bina Insani</small>
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingTwo">
                        <button class="accordion-button collapsed px-1 py-0" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                            SMP
                        </button>
                        </h2>
                        <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body px-0 py-1">
                                <small class="fw-normal px-3">SMPN 3 Depok</small>
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingThree">
                        <button class="accordion-button collapsed px-1 py-0" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                            SMK
                        </button>
                        </h2>
                        <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body px-0 py-1 mb-0">
                                <small class="fw-normal px-3">SMKN 1 Depok</small>
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingFour">
                        <button class="accordion-button collapsed px-1 py-0" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour">
                            Universitas
                        </button>
                        </h2>
                        <div id="flush-collapseFour" class="accordion-collapse collapse" aria-labelledby="flush-headingFour" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body px-0 py-1">
                                <small class="fw-normal px-3">Universitas Esa Unggul</small>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-lg-6 d-flex flex-column my-1">
                <label class="text-muted fw-bold">Hobby</label>
                <small class="fw-normal">
                    <ul>
                        <li>Coding</li>
                        <li>Gaming</li>
                        <li>Workout</li>
                    </ul>
                </small>
            </div>
        </div>
    </div>
</div>

<?php
include "views/template/footer.php";
?>