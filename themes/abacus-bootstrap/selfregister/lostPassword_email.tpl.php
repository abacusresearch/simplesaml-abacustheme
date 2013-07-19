<?php

$this->data['header'] = $this->t('{selfregister:selfregister:link_lostpw}');
$this->data['head'] = '<link rel="stylesheet" href="resources/selfregister.css" type="text/css">';

$this->includeAtTemplateBase('includes/header.php'); ?>

<?php if(isset($this->data['error'])){ ?>
          <div class="alert alert-error"><?php echo $this->data['error']; ?></div>
<?php }?>

<div class="row-fluid">
    <div class="span8 offset2">
<!--
	<h1><?php echo $this->t('lpw_head'); ?></h1>

	<p><?php echo $this->t('lpw_para1', $this->data['htmlArgs']); ?></p>
-->

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
                            echo '<input type="hidden" id="username" name="email" value="' . htmlspecialchars($this->data['username']). '" />';
                        } else {
                            echo '<input type="text" id="username" tabindex="1" name="email" value="' . htmlspecialchars($this->data['username']) . '" class="input-large" />';
                        }
                    ?>
                    </div>
                </div>
            </div>
            <div class="form-actions">
                <button type="submit" tabindex="4" class="btn btn-primary">
                    <i class="icon-off icon-white"></i>
                    <?php echo $this->t('{abacustheme:selfregister:submit_mail}'); ?>
                </button>
            </div>
	</form>
	</div>
    </div>
</div>

<?php $this->includeAtTemplateBase('includes/footer.php'); ?>
