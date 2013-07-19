<?php

$this->data['header'] = $this->t('{selfregister:selfregister:link_deluser}');
$this->data['head'] = '<link rel="stylesheet" href="resources/selfregister.css" type="text/css">';

$this->includeAtTemplateBase('includes/header.php'); ?>

<?php if(isset($this->data['error'])){ ?>
          <div class="alert alert-error"><?php echo $this->data['error']; ?></div>
<?php }?>

<?php if(isset($this->data['userMessage'])){ ?>
	<div class="umesg"><?php echo $this->t($this->data['userMessage']); ?></div>
<?php }?>

<h1><?php echo $this->t('review_head'); ?></h1>
<p>
	<?php echo $this->t('review_intro', array('%UID%' => '<b>' . $this->data['uid'] . '</b>') ); ?>
</p>


<?php print $this->data['formHtml']; ?>


<?php $this->includeAtTemplateBase('includes/footer.php'); ?>
