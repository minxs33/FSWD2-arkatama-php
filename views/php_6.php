<?php 

include "../php/functions.php";

includeWithVariables('template/header.php', array('title' => 'Pert-21 PHP 6'));

class Animal {
    private $nama;
    private $jenis;

    public function __construct($nama, $jenis) {
        $this->nama = $nama;
        $this->jenis = $jenis;
    }

    public function getInfo() {
        return "Hewan ini adalah " . $this->nama . ", jenis " . $this->jenis;
    }
}

class Cat extends Animal {
    public function __construct($nama) {
        parent::__construct($nama, "kucing");
    }

    public function getInfo() {
        return parent::getInfo() . ". Kucing adalah hewan yang suka bermain dan bersih";
    }
}

class Dog extends Animal {
    public function __construct($nama) {
        parent::__construct($nama, "anjing");
    }

    public function getInfo() {
        return parent::getInfo() . ". Anjing adalah hewan yang setia dan cerdas";
    }
}

?>
<div class="container mt-4">
    <div class="card p-3 fw-medium text-muted">
        <?php
        $animal = new Animal("Harimau", "karnivora");
        echo $animal->getInfo()."<br>";
        
        $cat = new Cat("Kitty");
        echo $cat->getInfo()."<br>";
        
        $dog = new Dog("Buddy");
        echo $dog->getInfo()."<br>";
        ?>
    </div>
</div>
<?php
include "template/footer.php";
?>