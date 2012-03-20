<?php require 'header.tpl'; ?>
<div data-role="page" id="lights">
    <div data-role="header">
        <a href="home.php" data-icon="home"
           data-iconpos="notext" data-direction="reverse">Home</a>
        <h3>Lights</h3>
    </div>
    <div data-role="content">
        <form action="lights.php" method="post">
            <label for="room" class="select">Room</label>
            <select name="room" id="room">
                <?php foreach ($devices as $device) { ?>
                    <option value="<?php echo $device->getDeviceId(); ?>">
                        <?php echo $device->getName(); ?>
                    </option>
                <?php } ?>
            </select>
            <fieldset class="ui-grid-a">
            <div class="ui-block-a">
                <button type="submit" name="lightsOn">Lights On</button>
            </div>
            <div class="ui-block-b">
                <button type="submit" name="lightsOff">Lights Off</button>
            </div>
            </fieldset>
        </form>
        <?php if (!empty($lights)) { ?>
        <ul data-role="listview" style="margin-top: 20px">
            <?php foreach($lights as $light) { ?>
            <li>
                <?php echo $light->getTimestamp(); ?> -
                Device: <?php echo $light->getDevice(); ?> -
                State: <?php echo $light->getState() ? 'On' : 'Off'; ?>
            </li>
            <?php } ?>
        </ul>
        <?php } else { ?>
        You don't have any light events yet. Don't worry, they'll come soon!
        <?php } ?>
    </div>
    <div data-theme="a" data-role="footer" data-position="fixed">
        <h3>HOMOS Home Monitoring System</h3>
    </div>
</div>
<?php require 'footer.tpl'; ?>
