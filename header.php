<?php
/**
 * @package Codec
 * @subpackage Codec_Theme
 */
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Codec <?php wp_title('░', true, 'left'); ?></title>
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<!--[if lt IE 8]><script src="http://ie7-js.googlecode.com/svn/version/2.0(beta3)/IE8.js" type="text/javascript"></script>[endif]-->
<?php // wp_head(); ?>
<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/default.css">
<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/prism.css">
<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/js/prism.js"></script>

<!--
<script type="text/javascript">hljs.initHighlightingOnLoad();</script>
<script type="text/javascript" src="https://use.typekit.com/quk8pbh.js"></script>
<script type="text/javascript">try{Typekit.load();}catch(e){}</script>
-->
</head>
<body>
  <div id="page">
    <div id="header">
      <div id="description"><a href="https://www.trembl.org/">➜☠←trembl</a> A polylogic polysemantic Memex, a pseudo-xanalogical 'Zettelkasten'</div>
      <div id="title">
        <form method="get" id="searchform" action="<?php echo home_url(); ?>">
          <input type="text" value="Codec" name="s" id="searchinput" onfocus="if (this.value == 'Codec') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Codec';}" /><input type="submit" id="searchsubmit" value="↩" />
        </form>
      </div>
    </div>
  <hr />
