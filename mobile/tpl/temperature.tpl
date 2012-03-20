<?php require 'header.tpl'; ?>
<div data-role="page" id="temperature">
    <div data-role="header">
        <a href="home.php" data-icon="home"
           data-iconpos="notext" data-direction="reverse">Home</a>
        <h3>Temperature</h3>
    </div>
    <div data-role="content">
        <?php if (!empty($temperatures)) { ?>
        <ul data-role="listview">
            <?php foreach($temperatures as $temperature) { ?>
            <li>
                <?php echo $temperature->getTimestamp(); ?> -
                Device: <?php echo $temperature->getDevice(); ?> -
                Temperature: <?php echo $temperature->getTemperature(); ?>
            </li>
            <?php } ?>
        </ul>
        <?php } else { ?>
        You don't have any temperature events yet. Don't worry, they'll come soon!
        <?php } ?>
    </div>
    <div data-theme="a" data-role="footer" data-position="fixed">
        <h3>HOMOS Home Monitoring System</h3>
    </div>
</div>
<?php require 'footer.tpl'; ?>
