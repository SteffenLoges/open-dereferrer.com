<?php
if (!defined('ROOT_DIR')) {
    exit('No direct script access allowed');
}
?>
<footer>
  <div class="container d-flex justify-content-between">
    <div class="copyright">
      Released under the <a href="https://opensource.org/licenses/MIT" target="_blank">MIT license</a>.
      2021-<?php echo date('Y'); ?>
      <a
        href="<?php echo OpenDereferrer\Config::i()->get('SITE_URL'); ?>"><?php echo OpenDereferrer\Config::i()->get('BRAND_NAME'); ?></a>
    </div>

    <div class="links">
      <a href="<?php echo OpenDereferrer\Config::i()->get('DONATE_URL'); ?>" target="_blank">
        <span class="mdi mdi-hand-coin" aria-hidden="true"></span>
        Buy me a coffee
      </a>
      <a href="<?php echo OpenDereferrer\Config::i()->get('GITHUB_URL'); ?>" target="_blank">
        <span class="mdi mdi-github" aria-hidden="true"></span>
        View on GitHub
      </a>
    </div>
  </div>
</footer>