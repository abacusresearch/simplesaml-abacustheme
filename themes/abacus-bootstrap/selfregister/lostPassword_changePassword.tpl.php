<?php

$this->data['header'] = $this->t('{selfregister:selfregister:link_changepw}');
$this->data['head'] = '<link rel="stylesheet" href="resources/selfregister.css" type="text/css">';

$this->includeAtTemplateBase('includes/header.php'); ?>

<div class="row-fluid">
    <div class="span8 offset2">
<?php if(isset($this->data['error'])){ ?>
          <div class="alert alert-error"><?php echo $this->data['error']; ?></div>
<?php }?>

<h1><?php echo $this->t('lpw_head'); ?></h1>
<p><?php echo $this->t('lpw_reg_para1', array('%UID%' => $this->data['uid']) ); ?></p>
<?php print $this->data['formHtml']; ?>
</div>
</div>

<?php $this->includeAtTemplateBase('includes/footer.php'); ?>
