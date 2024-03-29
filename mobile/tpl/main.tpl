<?php require 'header.tpl'; ?>
<div data-role="page" id="menu">
    <div data-role="header">
        <h3>Menu</h3>
    </div>
    <div data-role="content">
        Hi <?php echo $_SESSION['firstname'] ?>! Welcome to HOMOS.
        <a data-role="button" data-transition="slide" href="stream.php">
            Activity Stream
        </a>
        <a data-role="button" data-transition="slide" href="temperature.php">
           Temperature
        </a>
        <a data-role="button" data-transition="slide" href="lights.php">
           Lights
        </a>
        <a data-role="button" data-transition="slide" href="floodlights.php">
           Floodlights
        </a>
        <a data-role="button" data-transition="slide" href="houseinfo.php">
           My Home Info
        </a>
    </div>
    <div data-theme="a" data-role="footer" data-position="fixed">
        <h3>HOMOS Home Monitoring System</h3>
    </div>
</div>
<?php require 'footer.tpl'; ?>
