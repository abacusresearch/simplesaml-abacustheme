<?php

if(!empty($this->data['htmlinject']['htmlContentPost'])) {
	foreach($this->data['htmlinject']['htmlContentPost'] AS $c) {
		echo $c;
	}
}
?>

<footer class="foot">
</footer>
</div><!-- /container-fluid -->
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js"></script>
<script type="text/javascript" src="/<?php echo $this->data['baseurlpath']; ?>resources/script.js"></script>
<script type="text/javascript" src="<?php echo SimpleSAML_Module::getModuleUrl('abacustheme/js/bootstrap.min.js') ?>"></script>
</body>
</html>
