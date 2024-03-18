<?php

// Check if the user is authenticated as staff
$staff_authenticated = isset($_SESSION["authenticated"]);

?>

<header class="header">
    <div class="flex">
        <?php if ($staff_authenticated) : ?>
            <a href="#" class="logo">Welcome Staff</a>
        <?php else : ?>
            <a href="#" class="logo">Welcome Student</a>
        <?php endif; ?>
        <nav class="navbar">
            <?php if ($staff_authenticated) : ?>
                <a href="orders.php">See Orders</a>
                <a href="logout.php">Logout</a>
            <?php else : ?>
                <a href="products.php">View Products</a>
                
                    <a href="login.php">Staff Login</a>
                
            <?php endif; ?>
        </nav>

        <?php
        $select_rows = mysqli_query($conn, "SELECT * FROM `cart`") or die('query failed');
        $row_count = mysqli_num_rows($select_rows);
        ?>

        <a href="cart.php" class="cart">cart <span><?php echo $row_count; ?></span></a>
        <div id="menu-btn" class="fas fa-bars"></div>
    </div>
</header>
