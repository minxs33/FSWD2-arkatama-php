<?php 

include "../php_functions/functions.php";

includeWithVariables('template/header.php', array('title' => 'Pert-17 PHP 2'));
?>
<div class="container mt-4">
    <h5 class="text-muted">Soal 1 :</h5>
    <div class="row justify-content-between">
        <div class="col-sm-9 col-md-6 col-lg-3 p-3 d-flex justify-content-center">
            <div class="bg-light shadow-sm p-2 rounded">
                    <p class="fs-5 fw-semibold text-muted">Triangle Upside Left</p>
                    <?=triangleUpsideLeft(5,"*")?>
            </div>
        </div>

        <div class="col-sm-9 col-md-6 col-lg-3 p-3 d-flex justify-content-center">
            <div class="bg-light shadow-sm p-2 rounded text-center">
                <div>
                    <p class="fs-5 fw-semibold text-muted">Triangle Upside Right</p>
                    <?=triangleUpsideRight(5,"*")?>
                </div>
            </div>
        </div>

        <div class="col-sm-9 col-md-6 col-lg-3 p-3 d-flex justify-content-center">
            <div class="bg-light shadow-sm p-2 rounded">
                <p class="fs-5 fw-semibold text-muted">Triangle Downside Left</p>
                <?=triangleDownsideLeft(5,"*")?>
            </div>
        </div>

        <div class="col-sm-9 col-md-6 col-lg-3 p-3 d-flex justify-content-center">
            <div class="bg-light shadow-sm p-2 rounded text-center">
                <div>
                    <p class="fs-5 fw-semibold text-muted">Triangle Downside Right</p>
                    <?=triangleDownsideRight(5,"*")?>
                </div>
            </div>
        </div>
        
    </div>

    <h5 class="text-muted">Soal 2 :</h5>
    <div class="row">
        <div class="col-sm-12 col-md-3">
            <label class="text-muted fw-semibold">Pilih bentuk</label>
            <form method="GET">
                <div class="form-check">
                    <input class="form-check-input pattern" value="1" type="radio" name="pattern" id="flexRadioDefault1">
                    <label class="form-check-label" for="flexRadioDefault1">
                        Triangle Upside Left
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input pattern" value="2" type="radio" name="pattern" id="flexRadioDefault2">
                    <label class="form-check-label" for="flexRadioDefault2">
                        Triangle Upside Right
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input pattern" value="3" type="radio" name="pattern" id="flexRadioDefault3">
                    <label class="form-check-label" for="flexRadioDefault3">
                        Triangle Downside Left
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input pattern" value="4" type="radio" name="pattern" id="flexRadioDefault4">
                    <label class="form-check-label" for="flexRadioDefault4">
                        Triangle Downside Right
                    </label>
                </div>
            </form>
        </div>
        <div class="col-sm-12 col-md-9">
            <div class="bg-light shadow-sm p-2 rounded d-flex justify-content-center">
                <div id="hasil_pattern">
                    
                </div>
            </div>
        </div>
    </div>

    <h5 class="text-muted">Soal 3 :</h5>
    <div class="row justify-content-between">
        <div class="col-sm-9 col-md-6 col-lg-3 p-3 d-flex justify-content-center">
            <div class="bg-light shadow-sm p-2 rounded">
                    <p class="fs-5 fw-semibold text-muted">Triangle Upside Left</p>
                    <?=triangleUpsideLeft(6,"$")?>
            </div>
        </div>

        <div class="col-sm-9 col-md-6 col-lg-3 p-3 d-flex justify-content-center">
            <div class="bg-light shadow-sm p-2 rounded text-center">
                <div>
                    <p class="fs-5 fw-semibold text-muted">Triangle Upside Right</p>
                    <?=triangleUpsideRight(9,"#")?>
                </div>
            </div>
        </div>

        <div class="col-sm-9 col-md-6 col-lg-3 p-3 d-flex justify-content-center">
            <div class="bg-light shadow-sm p-2 rounded">
                <p class="fs-5 fw-semibold text-muted">Triangle Downside Left</p>
                <?=triangleDownsideLeft(10,"@")?>
            </div>
        </div>

        <div class="col-sm-9 col-md-6 col-lg-3 p-3 d-flex justify-content-center">
            <div class="bg-light shadow-sm p-2 rounded text-center">
                <div>
                    <p class="fs-5 fw-semibold text-muted">Triangle Downside Right</p>
                    <?=triangleDownsideRight(7,"*")?>
                </div>
            </div>
        </div>
        
    </div>

</div>

<script type="text/javascript">
    let radio = document.querySelectorAll("input[name='pattern']");
    let hasil = document.getElementById("hasil_pattern");
    radio.forEach((elem) => {
        elem.addEventListener("change", function(e) {
            var item = e.target.value;
            console.log(item);
            const xhttp = new XMLHttpRequest();
            xhttp.open("POST", "<?=baseUrl()?>/php_functions/functions.php");
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send("pattern="+item);

            xhttp.onload = function() {
                hasil.innerHTML = this.responseText;
            }
        });
    })
</script>
<?php
include "template/footer.php";
?>