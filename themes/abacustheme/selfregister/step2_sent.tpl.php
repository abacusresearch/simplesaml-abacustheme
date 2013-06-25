<?php 

$this->data['header'] = $this->t('{selfregister:selfregister:link_newuser}');
$this->data['head'] = '<link rel="stylesheet" href="resources/selfregister.css" type="text/css">';

$this->includeAtTemplateBase('includes/header.php'); ?>

<div style="margin: 1em">
	  <h1><?php echo $this->t('s1_head', $this->data['htmlArgs']); ?></h1>
	  <p><?php echo $this->t('s2_para1'); ?></p>
</div>


<?php $this->includeAtTemplateBase('includes/footer.php'); ?>
