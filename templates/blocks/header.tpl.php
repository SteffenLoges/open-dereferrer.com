<?php
if (!defined('ROOT_DIR')) {
    exit('No direct script access allowed');
}
?>

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="description" content="<?php echo OpenDereferrer\Config::i()->get('META_DESCRIPTION'); ?>" />
  <meta name="keywords" content="<?php echo OpenDereferrer\Config::i()->get('META_KEYWORDS'); ?>" />
  <meta name="author" content="Steffen Loges" />
  <link rel="icon" type="image/x-icon" href="/favicon.ico">
  <link rel="apple-touch-icon" sizes="180x180" href="/assets/favicon/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="/assets/favicon/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="/assets/favicon/favicon-16x16.png">
  <link rel="manifest" href="/assets/favicon/site.webmanifest">
  <?php if (isset($redirectTo)) {?>
  <script>
  var redirectURL = '<?php echo htmlspecialchars($redirectTo); ?>';
  <?php /* Try to append text-anchor when using unencoded urls */?>
  if (window.location.hash) {
    redirectURL += window.location.hash;
  }

  setTimeout(function() {
    window.location.href = redirectURL;
  }, <?php echo OpenDereferrer\Config::i()->get('REDIRECT_DELAY'); ?> * 1e3);
  </script>
  <noscript>
    <meta http-equiv="refresh"
      content="<?php echo OpenDereferrer\Config::i()->get('REDIRECT_DELAY'); ?>; url=<?php echo htmlspecialchars($redirectTo); ?>" />
  </noscript>
  <?php }?>
  <title><?php echo OpenDereferrer\Config::i()->get('META_TITLE'); ?></title>
  <link rel="canonical" href="<?php echo OpenDereferrer\Config::i()->get('SITE_URL'); ?>">
  <link rel="icon" type="image/x-icon" href="favicon.ico" />
  <link href="<?php echo OpenDereferrer\Config::i()->get('MAIN_CSS_FILE'); ?>" rel="stylesheet" />
  <script defer src="<?php echo OpenDereferrer\Config::i()->get('MAIN_JS_FILE'); ?>"></script>
  <?php
// Global site tag (gtag.js) - Google Analytics
$gTag = OpenDereferrer\Config::i()->get('GOOGLE_ANALYTICS_TRACKING_ID');
if ($gTag != '') {
    ?>
  <script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo $gTag; ?>"></script>
  <script>
  window.dataLayer = window.dataLayer || [];

  function gtag() {
    dataLayer.push(arguments);
  }
  gtag('js', new Date());

  gtag('OpenDereferrer\Config', '<?php echo $gTag; ?>');
  </script>
  <?php }?>
  <meta name="theme-color" content="#7952b3">
</head>