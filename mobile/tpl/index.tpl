<?php include 'header.tpl'; ?>
<div data-role="page" id="login">
    <div data-role="header">
        <h3>Login</h3>
    </div>
    <div data-role="content">
        <?php if ($loginmsg) { ?>
        <?php echo $loginmsg; ?>
        <?php } ?>
        <form action="index.php?login=1" method="post">
        <div data-role="fieldcontain">
            <fieldset data-role="controlgroup">
                <input id="email" name="username" placeholder="E-Mail Address" value="" type="text" />
                <input id="password" name="password" placeholder="Password" value="" type="password" />
            </fieldset>
            <input type="submit" value="Login" />
        </div>
        </form>
    </div>
    <div data-theme="a" data-role="footer" data-position="fixed">
        <h3>HOMOS Home Monitoring System</h3>
    </div>
</div>
<?php include 'footer.tpl'; ?>
