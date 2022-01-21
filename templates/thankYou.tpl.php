<?php
if (!defined('ROOT_DIR')) {
    exit('No direct script access allowed');
}
?>

<!DOCTYPE html>
<html lang="en">
<?php require __DIR__ . '/blocks/header.tpl.php';?>

<body class="d-flex justify-content-center flex-column flex-grow-1 container align-items-center text-center">
  <div><span class="mdi mdi-hand-peace" area-hidden="true" style="font-size: 8rem;"></span></div>
  <h1 class="display-1 text-uppercase fw-bold" style="letter-spacing: 3px;">Thank You!</h1>
  <p class="lead">Your donation has been received and will be used to help us continue to provide the best possible
    service.</p>
  <div class="text-muted mt-4 small">
    <a class="text-decoration-none" tabindex="-1"
      href="<?php echo OpenDereferrer\Config::i()->get('SITE_URL'); ?>"><?php echo OpenDereferrer\Config::i()->get('BRAND_NAME'); ?></a>.
    The Open-Source, Ad-Free Dereferring Service.
  </div>
</body>

</html>