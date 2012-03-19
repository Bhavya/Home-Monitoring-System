<?php require 'header.tpl'; ?>
<div data-role="page" id="menu">
    <div data-role="header">
        <h3>Menu</h3>
    </div>
    <div data-role="content">
        You are now logged in.
        <a data-role="button" data-transition="slide" href="#stream">
            Activity Stream
        </a>
    </div>
    <div data-theme="a" data-role="footer">
        <h3>HOMOS Home Monitoring System</h3>
    </div>
</div>
<div data-role="page" id="stream">
    <div data-role="header">
        <a href="#menu" data-icon="home"
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
    <div data-theme="a" data-role="footer">
        <h3>HOMOS Home Monitoring System</h3>
    </div>
</div>
<?php require 'footer.tpl'; ?>
