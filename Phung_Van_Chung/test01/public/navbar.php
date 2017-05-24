<nav class="navbar navbar-inverse" style="margin-bottom: 0px; border-radius: 0px;">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">NTQ Solution</a>
        </div>

        <ul class="nav navbar-nav">
            <li <?php echo (basename($_SERVER['SCRIPT_NAME']) == 'index.php') ? "class='active'" : ""; ?> ><a href="index.php">Bài 1</a></li>
            <li <?php echo (basename($_SERVER['SCRIPT_NAME']) == 'bai2.php') ? "class='active'" : ""; ?> ><a href="bai2.php">Bài 2</a></li>
            <li <?php echo (basename($_SERVER['SCRIPT_NAME']) == 'bai3.php') ? "class='active'" : ""; ?> ><a href="bai3.php">Bài 3</a></li>
            <li <?php echo (basename($_SERVER['SCRIPT_NAME']) == 'bai4.php') ? "class='active'" : ""; ?> ><a href="bai4.php">Bài 4</a></li>
        </ul>
    </div>
</nav>
<div style="color:white; padding-top: 20px;">
<div class="container">