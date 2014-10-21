<?php



/**
 * Support the htmlinject hook, which allows modules to change header, pre and post body on all pages.
 */
$this->data['htmlinject'] = array(
	'htmlContentPre' => array(),
	'htmlContentPost' => array(),
	'htmlContentHead' => array(),
);


$jquery = array();
if (array_key_exists('jquery', $this->data)) $jquery = $this->data['jquery'];

if (array_key_exists('pageid', $this->data)) {
	$hookinfo = array(
		'pre' => &$this->data['htmlinject']['htmlContentPre'], 
		'post' => &$this->data['htmlinject']['htmlContentPost'], 
		'head' => &$this->data['htmlinject']['htmlContentHead'], 
		'jquery' => &$jquery, 
		'page' => $this->data['pageid']
	);
		
	SimpleSAML_Module::callHooks('htmlinject', $hookinfo);	
}
// - o - o - o - o - o - o - o - o - o - o - o - o -

/**
 * Do not allow to frame simpleSAMLphp pages from another location.
 * This prevents clickjacking attacks in modern browsers.
 *
 * If you don't want any framing at all you can even change this to
 * 'DENY', or comment it out if you actually want to allow foreign
 * sites to put simpleSAMLphp in a frame. The latter is however
 * probably not a good security practice.
 */
header('X-Frame-Options: SAMEORIGIN');

?><!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml" lang="de" xml:lang="de">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<script type="text/javascript" src="/<?php echo $this->data['baseurlpath']; ?>resources/script.js"></script>
<title><?php
if(array_key_exists('header', $this->data)) {
	echo $this->data['header'];
} else {
	echo 'simpleSAMLphp';
}
?></title>

	<link rel="stylesheet" type="text/css" href="<?php echo SimpleSAML_Module::getModuleURL('abacustheme/css/abacus.css'); ?>" />
	<link rel="stylesheet" type="text/css" href="<?php echo SimpleSAML_Module::getModuleURL('abacustheme/css/default.css'); ?>" />
	<link rel="stylesheet" type="text/css" href="<?php echo SimpleSAML_Module::getModuleURL('abacustheme/css/bootstrap.min.css'); ?>" />
	<link rel="stylesheet" type="text/css" href="<?php echo SimpleSAML_Module::getModuleURL('abacustheme/css/bootstrap-responsive.min.css'); ?>" />
	<link rel="icon" type="image/icon" href="<?php echo SimpleSAML_Module::getModuleURL('abacustheme/pics/favicon.ico'); ?>" />

<?php

if(!empty($jquery)) {
	$version = '1.5';
	if (array_key_exists('version', $jquery))
		$version = $jquery['version'];
		
	if ($version == '1.5') {
		if (isset($jquery['core']) && $jquery['core'])
			echo('<script type="text/javascript" src="/' . $this->data['baseurlpath'] . 'resources/jquery.js"></script>' . "\n");
	
		if (isset($jquery['ui']) && $jquery['ui'])
			echo('<script type="text/javascript" src="/' . $this->data['baseurlpath'] . 'resources/jquery-ui.js"></script>' . "\n");
	
		if (isset($jquery['css']) && $jquery['css'])
			echo('<link rel="stylesheet" media="screen" type="text/css" href="/' . $this->data['baseurlpath'] . 
				'resources/uitheme/jquery-ui-themeroller.css" />' . "\n");	
			
	} else if ($version == '1.6') {
		if (isset($jquery['core']) && $jquery['core'])
			echo('<script type="text/javascript" src="/' . $this->data['baseurlpath'] . 'resources/jquery-16.js"></script>' . "\n");
	
		if (isset($jquery['ui']) && $jquery['ui'])
			echo('<script type="text/javascript" src="/' . $this->data['baseurlpath'] . 'resources/jquery-ui-16.js"></script>' . "\n");
	
		if (isset($jquery['css']) && $jquery['css'])
			echo('<link rel="stylesheet" media="screen" type="text/css" href="' . SimpleSAML_Module::getModuleURL('abacustheme/uitheme16/ui.all.css') . '"/>' . "\n");	
	}
}

if(!empty($this->data['htmlinject']['htmlContentHead'])) {
	foreach($this->data['htmlinject']['htmlContentHead'] AS $c) {
		echo $c;
	}
}




if ($this->isLanguageRTL()) {
?>
	<link rel="stylesheet" type="text/css" href="<?php echo $this->data['baseurlpath']; ?>resources/default-rtl.css" />
<?php	
}
?>

	
	<meta name="robots" content="noindex, nofollow" />
	

<?php	
if(array_key_exists('head', $this->data)) {
	echo '<!-- head -->' . $this->data['head'] . '<!-- /head -->';
}
?>
<script type="text/javascript" src="<?php echo SimpleSAML_Module::getModuleURL('abacustheme/js/bootstrap.min.js'); ?>"></script>
</head>
<?php
$onLoad = '';
if(array_key_exists('autofocus', $this->data)) {
	$onLoad .= 'SimpleSAML_focus(\'' . $this->data['autofocus'] . '\');';
}
if (isset($this->data['onLoad'])) {
	$onLoad .= $this->data['onLoad']; 
}

if($onLoad !== '') {
	$onLoad = ' onload="' . $onLoad . '"';
}
?>
<body<?php echo $onLoad; ?>>

<div id="main-wrapper">
	<div id="main">
		<div id="logo-meta-section">
			<div id="logo"><img src="<?php echo SimpleSAML_Module::getModuleURL('abacustheme/pics/abacus_logo.gif'); ?>" class="logo" alt="Home" /></div>
			<div id="metanavigation">
                            <?php 
	
                                $includeLanguageBar = TRUE;
                                if (!empty($_POST)) 
                                        $includeLanguageBar = FALSE;
                                if (isset($this->data['hideLanguageBar']) && $this->data['hideLanguageBar'] === TRUE) 
                                        $includeLanguageBar = FALSE;

                                if ($includeLanguageBar) {


                                        echo '<div id="languagebar">';
                                        $languages = $this->getLanguageList();
                                        $langnames = array(
                                                                'no' => 'Bokmål',
                                                                'nn' => 'Nynorsk',
                                                                'se' => 'Sámegiella',
                                                                'sam' => 'Åarjelh-saemien giele',
                                                                'da' => 'Dansk',
                                                                'en' => 'EN',
                                                                'de' => 'DE',
                                                                'sv' => 'Svenska',
                                                                'fi' => 'Suomeksi',
                                                                'es' => 'Español',
                                                                'fr' => 'FR',
                                                                'it' => 'IT',
                                                                'nl' => 'Nederlands',
                                                                'lb' => 'Luxembourgish', 
                                                                'cs' => 'Czech',
                                                                'sl' => 'Slovenščina', // Slovensk
                                                                'lt' => 'Lietuvių kalba', // Lithuanian
                                                                'hr' => 'Hrvatski', // Croatian
                                                                'hu' => 'Magyar', // Hungarian
                                                                'pl' => 'Język polski', // Polish
                                                                'pt' => 'Português', // Portuguese
                                                                'pt-br' => 'Português brasileiro', // Portuguese
                                                                'ru' => 'русский язык', // Russian
                                                                'et' => 'eesti keel',
                                                                'tr' => 'Türkçe',
                                                                'el' => 'ελληνικά',
                                                                'ja' => '日本語',
                                                                'zh' => '简体中文', // Chinese (simplified)
                                                                'zh-tw' => '繁體中文', // Chinese (traditional)
                                                                'ar' => 'العربية', // Arabic
                                                                'fa' => 'پارسی', // Persian
                                                                'ur' => 'اردو', // Urdu
                                                                'he' => 'עִבְרִית', // Hebrew
                                                                'id' => 'Bahasa Indonesia', // Indonesian
                                                                'sr' => 'Srpski',
                                        );

                                        $textarray = array();
                                        foreach ($languages AS $lang => $current) {
                                                $lang = strtolower($lang);
                                                if ($current) {
                                                        $textarray[] = $langnames[$lang];
                                                } else {
							$textarray[] = '<a href="' . htmlspecialchars(SimpleSAML_Utilities::addURLparameter(SimpleSAML_Utilities::selfURL(), array('language' => $lang))) . '">' .
                                                                $langnames[$lang] . '</a>';
                                                }
                                        }
                                        echo join(' - ', $textarray);
                                        echo '</div>';

                                }



	?>
			</div>
		</div>
		<div id="content-section-folgeseite">
			
			
			<div id="content-section-folgeseite-middle-4">
			<!-- HIER KOMMT CONTENT BEGIN -->
			
                        

	
	
	



<?php

if(!empty($this->data['htmlinject']['htmlContentPre'])) {
	foreach($this->data['htmlinject']['htmlContentPre'] AS $c) {
		echo $c;
	}
}
