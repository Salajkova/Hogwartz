<?php
$roleForHeader = $_SESSION["role"];

?>


<header>
    <div class="logo">
        <a href="../admin/students.php">
        <img src="../img/hogwarts-logo.png" alt=""></a>
    </div>
    <nav>
        <ul> 
            
            <li><a href="students.php">Seznam žáků</a></li>
            <li><a href="addstudent.php">Přidat žáka</a></li>
            <?php if($roleForHeader === "admin"): ?>
                <li><a href="photos.php">Obrázky</a></li> 
            <?php endif;?>
           
            <li><a href="logout.php">Odhlásit</a></li>
            <!-- li*4>a -->
        </ul>
    </nav>
    <div class="menu-icon">
        <i class="fa-solid fa-bars"></i>
        
    </div>
</header>