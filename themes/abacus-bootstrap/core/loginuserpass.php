<?php
$this->data['header'] = $this->t('{abacustheme:login:user_pass_header}');

if (strlen($this->data['username']) > 0) {
	$this->data['autofocus'] = 'password';
} else {
	$this->data['autofocus'] = 'username';
}
$this->includeAtTemplateBase('includes/header.php');

?>
<script type="text/javascript">

function updateUserState()
{
	if (document.getElementById('username').value) {
    $.ajax({
        type: 'POST',
        cache: false,
        url: '<?php echo SimpleSAML_Utilities::getBaseURL(); ?>module.php/selfregister/api.php',
        data: 'id=emailexists&email=' + document.getElementById('username').value,
        dataType: 'json',
        success: function(data) {
	    if(data.exists) {
		$(".login-action").show();
		$(".next-action").hide();
		$(".register-action").hide();
		$("#password").focus();
		$(".btn-login").removeAttr("disabled");
		$(".btn-lostpwd").removeAttr("disabled");
		$(".btn-lostpwd").attr("href","<?php echo SimpleSAML_Utilities::getBaseURL(); ?>module.php/selfregister/lostPassword.php?email=" + encodeURIComponent(document.getElementById('username').value) + "<?php echo "&AuthState=" . urlencode($_REQUEST['AuthState']) . '"'?>);
	    } else {
		$(".next-action").hide();
		$(".login-action").hide();
		$(".register-action").show();
		$(".btn-register").attr("href","<?php echo SimpleSAML_Utilities::getBaseURL(); ?>module.php/selfregister/newUser.php?email=" + encodeURIComponent(document.getElementById('username').value) + "<?php echo "&AuthState=" . urlencode($_REQUEST['AuthState']) . '"'?>);
	    }
        }
    });
    } else {
		$(".btn-login").attr("disabled", "disabled");
		$(".btn-lostpwd").attr("disabled", "disabled");
    }
    return false;
}

$(document).ready(function(){
	updateUserState();
});

</script>


<div class="row-fluid">
    <div class="span8 offset2">
<!--        <h2><?php echo $this->t('{abacustheme:login:user_pass_header}'); ?></h2> -->
<!--        <p><?php echo $this->t('{login:user_pass_text}'); ?></p> -->
        <?php if ($this->data['errorcode'] !== NULL) { ?>
        <div class="alert alert-block alert-error">
            <h4 class="alert-heading">
                <img src="/<?php echo $this->data['baseurlpath']; ?>resources/icons/experience/gtk-dialog-error.48x48.png" class="visible-desktop" />
                <?php echo $this->t('{login:error_header}'); ?>
                <small><?php echo $this->t('{errors:title_' . $this->data['errorcode'] . '}'); ?></small>
            </h4>
            <p><?php echo $this->t('{errors:descr_' . $this->data['errorcode'] . '}'); ?></p>
        </div>
        <?php } ?>
    </div>
</div>

<div class="row-fluid">
    <div class="span8 offset2">
<!--
        <img src="/<?php echo $this->data['baseurlpath']; ?>resources/icons/experience/gtk-dialog-authentication.48x48.png" alt="" class="hidden-phone" />
-->
    </div>
</div>
<div class="row-fluid">

    <div class="span8 offset2">

        <form action="?" method="post" name="f" class="well form-horizontal">
            <div class="control-group">
                <label for="username" class="control-label"><?php echo $this->t('{abacustheme:login:email}'); ?></label>
                <div class="controls">
                    <div class="input-prepend">
                        <span class="add-on"><i class="icon-envelope"></i></span>
                    <?php
                        if ($this->data['forceUsername']) {
                            echo '<span class="input-large uneditable-input">' . htmlspecialchars($this->data['username']) . '</span>';
                            echo '<input type="hidden" id="username" name="username" value="' . htmlspecialchars($this->data['username']) . '" />';
                        } else {
                            echo '<input type="text" id="username" tabindex="1" name="username" value="' . htmlspecialchars($this->data['username']) . '" class="input-large" />';
                        }
                    ?>
                    </div>
                </div>
            </div>
            <div class="control-group login-action" style="display:none">
                <label for="password" class="control-label"><?php echo $this->t('{login:password}'); ?></label>
                <div class="controls">
                    <div class="input-prepend">
                        <span class="add-on"><i class="icon-lock"></i></span>
                        <input id="password" type="password" tabindex="2" name="password" class="input-large" />
                    </div>
                </div>
            </div>
            <?php if (array_key_exists('organizations', $this->data)) { ?>
            <div class="control-group">
                <label for="organization" class="control-label"><?php echo $this->t('{login:organization}'); ?></label>
                <div class="controls">
                    <div class="input-prepend">
                        <span class="add-on"><i class="icon-globe"></i></span>
                        <select name="organization" tabindex="3">
                        <?php
                            $selectedOrg = NULL;
                            if (array_key_exists('selectedOrg', $this->data))
                                $selectedOrg = $this->data['selectedOrg'];
                            foreach ($this->data['organizations'] as $orgId => $orgDesc) {
                                if (is_array($orgDesc)) {
                                    $orgDesc = $this->t($orgDesc);
                                }

                                if ($orgId === $selectedOrg) {
                                    $selected = 'selected="selected" ';
                                } else {
                                    $selected = '';
                                }

                                echo '<option ' . $selected . 'value="' . htmlspecialchars($orgId) . '">' . htmlspecialchars($orgDesc) . '</option>';
                            }
                        ?>
                        </select>
                    </div>
                </div>
            </div>
            <?php } ?>
            <?php foreach ($this->data['stateparams'] as $name => $value) {
                echo('<input type="hidden" name="' . htmlspecialchars($name) . '" value="' . htmlspecialchars($value) . '" />');
            }
            ?>
            <div class="form-actions login-action" style="display:none">
                <button type="submit" tabindex="4" class="btn btn-primary btn-login">
                    <i class="icon-off icon-white"></i>
                    <?php echo $this->t('{login:login_button}'); ?>
                </button>
                <a tabindex=5 class="btn btn-lostpwd">
                    <i class="icon icon-refresh"></i>
                    <?php echo $this->t('{selfregister:selfregister:link_lostpw}'); ?>
                </a>
            </div>
            <div class="form-actions register-action" style="display:none">
		<p><?php echo $this->t('{abacustheme:login:register_user_message}');?>
		</p>
                <a tabindex="4" class="btn btn-primary btn-register">
                    <i class="icon-off icon-white"></i>
                    <?php echo $this->t('{selfregister:selfregister:link_newuser}'); ?>
                </a>
            </div>
            <div class="form-actions next-action">
                <a tabindex="4" class="btn btn-primary btn-next">
                    <i class="icon-off icon-white"></i>
                    <?php echo $this->t('{abacustheme:login:link_next}'); ?>
                </a>
            </div>
        </form>
    </div>

<?php

if(!empty($this->data['links'])) {
	echo '<ul class="links" style="margin-top: 2em">';
	foreach($this->data['links'] AS $l) {
		echo '<li><a href="' . htmlspecialchars($l['href']) . '">' . htmlspecialchars($this->t($l['text'])) . '</a></li>';
	}
	echo '</ul>';
}
?>

<!--
<div class="row-fluid">
    <div class="span10 offset2">
    <?php
        echo('<h2>' . $this->t('{login:help_header}') . '</h2>');
        echo('<p>' . $this->t('{login:help_text}') . '</p>');
    ?>
    </div>
</div>
-->

<script type="text/javascript">
$("#username").change(function() {
  updateUserState();
});

</script>
<?php $this->includeAtTemplateBase('includes/footer.php'); ?>
