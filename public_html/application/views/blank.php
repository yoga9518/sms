<!DOCTYPE html>
<html lang="en">

<?php echo $head; ?>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <!-- judul -->
            <?php echo $judul;?>
            <!-- /.navbar-header -->

           <?php echo $navbar_header; ?>
            <!-- /.navbar-top-links -->
<!--menu-->
            <?php echo $menu; ?>
            <!-- /.navbar-static-side -->
        </nav>

        <!-- Page Content -->
        <?php echo $isi; ?>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
<?php echo $script_bawah;?>

</body>

</html>
