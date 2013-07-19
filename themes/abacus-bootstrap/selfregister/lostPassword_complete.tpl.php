<?php 

$this->data['header'] = $this->t('{selfregister:selfregister:link_changepw}');
$this->data['head'] = '<link rel="stylesheet" href="resources/selfregister.css" type="text/css">';

$this->includeAtTemplateBase('includes/header.php'); ?>

<div class="row-fluid">
    <div class="span8 offset2">
	  <h1><?php echo $this->t('lpw_head') ?></h1>
	  <p><?php echo $this->t('lpw_complete_para1') ?></p>
</div>
</div>

<?php $this->includeAtTemplateBase('includes/footer.php'); ?>
