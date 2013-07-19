<?php 

$this->data['header'] = $this->t('{selfregister:selfregister:link_newuser}');
$this->data['head'] = '<link rel="stylesheet" href="resources/selfregister.css" type="text/css">';

$this->includeAtTemplateBase('includes/header.php'); ?>


<div class="row-fluid">
    <div class="span8 offset2">

<?php if(isset($this->data['error'])){ ?>
          <div class="alert alert-error"><?php echo $this->data['error']; ?></div>
<?php }?>
	<div class="alert alert-success"><?php echo $this->t('s2_para1'); ?></div>

        <form action="?" method="post" name="f" class="well form-horizontal">
<?php
        if (isset($this->data['RelayState'])) {
                echo('<input type="hidden" name="RelayState" value="' . $this->data['RelayState'] . '" />');
        }
        if (isset($this->data['AuthState'])) {
                echo('<input type="hidden" name="AuthState" value="' . $this->data['AuthState'] . '" />');
        }
        if (isset($this->data['token_part1'])) {
                echo('<input type="hidden" name="token_part1" value="' . $this->data['token_part1'] . '" />');
        }
        if (isset($this->data['email'])) {
                echo('<input type="hidden" name="email" value="' . $this->data['email'] . '" />');
        }
?>
            <div class="control-group">
                <label for="username" class="control-label"><?php echo $this->t('{abacustheme:login:email}'); ?></label>
                <div class="controls">
                    <div class="input-prepend">
                        <span class="add-on"><i class="icon-envelope"></i></span>
                    <?php
                            echo '<span class="input-large uneditable-input">' . htmlspecialchars($this->data['email']) . '</span>';
                    ?>
                    </div>
                </div>
	    </div>
            <div class="control-group">
                <label for="token_part2" class="control-label"><?php echo $this->t('{abacustheme:selfregister:activation_code}'); ?></label>
                <div class="controls">
                    <div class="input-prepend">
                        <span class="add-on"><i class="icon-lock"></i></span>
                    <?php
                        echo '<input type="text" id="token_part2" tabindex="1" name="token_part2" value="' . htmlspecialchars($this->data['token_part2']) . '" class="input-large" />';
                    ?>
                    </div>
                </div>
            </div>
            <div class="form-actions">
                <button type="submit" tabindex="4" class="btn btn-primary">
                    <i class="icon-off icon-white"></i>
                    <?php echo $this->t('{abacustheme:selfregister:submit}'); ?>
                </button>
            </div>
        </form>
        </div>
</div>
<?php $this->includeAtTemplateBase('includes/footer.php'); ?>
