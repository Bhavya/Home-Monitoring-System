<?php require 'header.tpl'; ?>
<div data-role="page" id="stream">
    <div data-role="header">
        <a href="home.php" data-icon="home"
           data-iconpos="notext" data-direction="reverse">Home</a>
        <h3>Activity Stream</h3>
    </div>
    <div data-role="content">
        <?php if (!empty($events)) { ?>
        <ul data-role="listview">
            <?php foreach($events as $event) { ?>
            <li><?php echo $event['timestamp']; ?> - <?php echo $event['event']; ?></li>
            <?php } ?>
        </ul>
        <?php } else { ?>
        You don't have any events yet. Don't worry, they'll come soon!
        <?php } ?>
    </div>
    <div data-theme="a" data-role="footer" data-position="fixed">
        <h3>HOMOS Home Monitoring System</h3>
    </div>
</div>
<?php require 'footer.tpl'; ?>
