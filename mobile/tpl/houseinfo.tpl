<?php require 'header.tpl'; ?>
<div data-role="page" id="houseinfo">
    <div data-role="header">
        <a href="home.php" data-icon="home"
           data-iconpos="notext" data-direction="reverse">Home</a>
        <h3>Household Info</h3>
    </div>
    <div data-role="content">
        <?php if (!empty($houseInfo)) { ?>
        <strong>Phone Number:</strong> <?php echo $houseInfo->getPhone(); ?><br /><br />
        <strong>Address:</strong><br />
        <?php echo nl2br($houseInfo->getAddress()); ?>
        <?php } else { ?>
        Something went wrong loading your household information.
        <?php } ?>
    </div>
    <div data-theme="a" data-role="footer" data-position="fixed">
        <h3>HOMOS Home Monitoring System</h3>
    </div>
</div>
<?php require 'footer.tpl'; ?>
