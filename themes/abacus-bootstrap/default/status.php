<?php
if(array_key_exists('header', $this->data)) {
	if($this->getTag($this->data['header']) !== NULL) {
		$this->data['header'] = $this->t($this->data['header']);
	}
}

$this->includeAtTemplateBase('includes/header.php');
?>

<div class="row">
    <div class="span12">
        <h2><?php if (isset($this->data['header'])) { echo($this->data['header']); } else { echo($this->t('{status:some_error_occured}')); } ?></h2>
        <p><?php echo($this->t('{status:intro}')); ?></p>
        <?php if (isset($this->data['remaining'])) {
            echo('<p>' . $this->t('{status:validfor}', array('%SECONDS%' => $this->data['remaining'])) . '</p>');
        }

        if(isset($this->data['sessionsize'])) {
            echo('<p>' . $this->t('{status:sessionsize}', array('%SIZE%' => $this->data['sessionsize'])) . '</p>');
        }
        ?>
    </div>
</div>

<div class="row">
    <div class="span8 offset2">
        <h2><?php echo($this->t('{status:attributes_header}')); ?></h2>

        <?php
        // consent style listng start
        $attributes = $this->data['attributes'];

        function present_list($attr) {
            if (is_array($attr) && count($attr) > 1) {
                $str = '<ul>';
                foreach ($attr as $value) {
                    $str .= '<li>' . htmlspecialchars($attr) . '</li>';
                }
                $str .= '</ul>';
                return $str;
            } else {
                return htmlspecialchars($attr[0]);
            }
        }

        function present_assoc($attr) {
            if (is_array($attr)) {
                
                $str = '<dl>';
                foreach ($attr AS $key => $value) {
                    $str .= "\n" . '<dt>' . htmlspecialchars($key) . '</dt><dd>' . present_list($value) . '</dd>';
                }
                $str .= '</dl>';
                return $str;
            } else {
                return htmlspecialchars($attr);
            }
        }

        function present_attributes($t, $attributes, $nameParent) {
            $alternate = array('odd', 'even'); $i = 0;
            
            $parentStr = (strlen($nameParent) > 0)? strtolower($nameParent) . '_': '';
            $str = (strlen($nameParent) > 0)? '<table class="table table-condensed table-bordered table-striped">': '<table id="table_with_attributes"  class="table table-condensed table-bordered table-striped">';

            foreach ($attributes as $name => $value) {
            
                $nameraw = $name;
                $name = $t->getAttributeTranslation($parentStr . $nameraw);

                if (preg_match('/^child_/', $nameraw)) {
                    $parentName = preg_replace('/^child_/', '', $nameraw);
                    foreach($value AS $child) {
                        $str .= '<tr><td>' . present_attributes($t, $child, $parentName) . '</td></tr>';
                    }
                } else {	
                    if (sizeof($value) > 1) {
                        $str .= '<tr><td>' . htmlspecialchars($name) . '</td><td><ul>';
                        foreach ($value AS $listitem) {
                            if ($nameraw === 'jpegPhoto') {
                                $str .= '<li><img src="data:image/jpeg;base64,' . htmlspecialchars($listitem) . '" /></li>';
                            } else {
                                $str .= '<li>' . present_assoc($listitem) . '</li>';
                            }
                        }
                        $str .= '</ul></td></tr>';
                    } elseif(isset($value[0])) {
                        $str .= '<tr><td>' . htmlspecialchars($name) . '</td>';
                        if ($nameraw === 'jpegPhoto') {
                            $str .= '<td><img src="data:image/jpeg;base64,' . htmlspecialchars($value[0]) . '" /></td></tr>';
                        } else {
                            $str .= '<td>' . htmlspecialchars($value[0]) . '</td></tr>';
                        }
                    }
                }
                $str .= "\n";
            }
            $str .= '</table>';
            return $str;
        }
            
        echo(present_attributes($this, $attributes, ''));
    ?>
    </div>
</div>
<?php
// consent style listing end

if (isset($this->data['logout'])) {
	echo('<h2>' . $this->t('{status:logout}') . '</h2>');
	echo('<p>' . $this->data['logout'] . '</p>');
}

if (isset($this->data['logouturl'])) {
	echo('<h2>' . $this->t('{status:logout}') . '</h2>');
	echo('<p>[ <a href="' . htmlspecialchars($this->data['logouturl']) . '">' . $this->t('{status:logout}') . '</a> ]</p>');
}
?>
	
<?php $this->includeAtTemplateBase('includes/footer.php'); ?>
