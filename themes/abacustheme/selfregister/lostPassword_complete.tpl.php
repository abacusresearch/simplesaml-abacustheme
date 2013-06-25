<?php 

$this->data['header'] = $this->t('{selfregister:selfregister:link_changepw}');
$this->data['head'] = '<link rel="stylesheet" href="resources/selfregister.css" type="text/css">';

$this->includeAtTemplateBase('includes/header.php'); ?>

<div style="margin: 1em">
	  <h1><?php echo $this->t('lpw_head') ?></h1>
	  <p><?php echo $this->t('lpw_complete_para1') ?></p>
</div>

<?php $this->includeAtTemplateBase('includes/footer.php'); ?>
