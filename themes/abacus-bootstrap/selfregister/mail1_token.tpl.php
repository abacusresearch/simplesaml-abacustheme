<h1><?php echo $this->t('mailNew_header', $this->data['htmlArgs']);?></h1>

<p><?php echo $this->t('mailNew_mailintro', $this->data['htmlArgs']);?></p>
<p><tt><?php echo $this->data['email']; ?></tt></p>

<p><?php echo $this->t('mailNew_tokenintro', $this->data['htmlArgs']);?></p>
<p><tt><?php echo $this->data['token_part2']; ?></tt></p>

<p><?php echo $this->t('mail_tokeninfo');?></p>

<p><?php echo $this->t('mail1_signature', $this->data['htmlArgs']);?></p>
