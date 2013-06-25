<?php 

$this->data['header'] = $this->t('{selfregister:selfregister:link_newuser}');
$this->data['head'] = '<link rel="stylesheet" href="resources/selfregister.css" type="text/css">';

$this->includeAtTemplateBase('includes/header.php'); ?>

<div style="margin: 1em">
	  <h1><?php echo $this->t('new_mailUsed_head'); ?></h1>
	  <p><?php echo $this->t('new_mailUsed_para1', $this->data['htmlArgs']); ?></p>
</div>

<?php $this->includeAtTemplateBase('includes/footer.php'); ?>
