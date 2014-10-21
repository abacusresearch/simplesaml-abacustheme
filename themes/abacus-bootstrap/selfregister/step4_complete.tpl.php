<?php 

//$this->data['header'] = $this->t('{selfregister:selfregister:link_newuser}');
//$this->data['head'] = '<link rel="stylesheet" href="resources/selfregister.css" type="text/css">';

$this->includeAtTemplateBase('includes/header.php'); ?>

<div class="row-fluid">
    <div class="span8 offset2">
  <h1><?php echo $this->t('new_complete_head'); ?></h1>
  <p><?php echo $this->t('new_complete_para1', $this->data['htmlArgs']); ?></p>
</div>
</div>

<?php $this->includeAtTemplateBase('includes/footer.php'); ?>
