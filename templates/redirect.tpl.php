<?php
if (!defined('ROOT_DIR')) {
    exit('No direct script access allowed');
}
?>

<!DOCTYPE html>
<html lang="en">
<?php require __DIR__ . '/blocks/header.tpl.php';?>

<body class="redirect d-flex justify-content-center flex-grow-1 container align-items-center text-center">
  <main class="card card-dark" style="width: 600px;">
    <div class="card-body py-4">
      <h6 class="card-title">You are being redirected to</h6>
      <p class="card-text my-4">
        <a class="h5 text-decoration-none text-black"
          href="<?php echo htmlspecialchars($redirectTo); ?>"><?php echo htmlspecialchars($redirectHost); ?></a>
      </p>
      <h6 class="card-subtitle text-muted">
        If you don't want to wait, <a id="redirect-btn" href="<?php echo htmlspecialchars($redirectTo); ?>">click
          here</a>.
        <script>
        var redirectURL = '<?php echo htmlspecialchars($redirectTo); ?>';
        <?php /* Try to append text-anchor when using unencoded urls */?>
        if (window.location.hash) {
          redirectURL += window.location.hash;
        }

        document.querySelector('#redirect-btn').addEventListener('click', function(e) {
          e.preventDefault();
          window.location.href = redirectURL;
        });
        </script>
      </h6>
    </div>
    <div class="card-footer text-muted">
      <a class="text-decoration-none" tabindex="-1"
        href="<?php echo OpenDereferrer\Config::i()->get('SITE_URL'); ?>"><?php echo OpenDereferrer\Config::i()->get('BRAND_NAME'); ?></a>.
      The Open-Source, Ad-Free Dereferring Service.
    </div>
    </div>
  </main>
</body>

</html>