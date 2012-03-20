<?php require 'header.tpl'; ?>
<div data-role="page" id="lights">
    <div data-role="header">
        <a href="home.php" data-icon="home"
           data-iconpos="notext" data-direction="reverse">Home</a>
        <h3>Floodlights</h3>
    </div>
    <div data-role="content">
        <?php if (!empty($floodlights)) { ?>
        <ul data-role="listview">
            <?php foreach($floodlights as $light) { ?>
            <li>
                <?php echo $light->getTimestamp(); ?> -
                Device: <?php echo $lights->getDevice(); ?> -
                State: <?php echo $lights->getState() ? 'On' : 'Off'; ?>
            </li>
            <?php } ?>
        </ul>
        <?php } else { ?>
        You don't have any floodlight events yet. Don't worry, they'll come soon!
        <?php } ?>
    </div>
    <div data-theme="a" data-role="footer" data-position="fixed">
        <h3>HOMOS Home Monitoring System</h3>
    </div>
</div>
<?php require 'footer.tpl'; ?>

