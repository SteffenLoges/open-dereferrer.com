<?php
if (!defined('ROOT_DIR')) {
    exit('No direct script access allowed');
}

$tabs = [
    [
        'title' => 'PHP',
        'exampleFile' => 'php',
    ],
    [
        'title' => 'JavaScript',
        'exampleFile' => 'javaScript',
    ],
    [
        'title' => 'Go',
        'exampleFile' => 'go',
    ],
];

?>
<div class="card bg-dark text-white mt-4">
  <div class="card-body">
    <h5 class="card-title">Manual Integration</h5>
    <p class="card-text">
    <p>
      Simply prepend the <?php echo OpenDereferrer\Config::i()->get('BRAND_NAME'); ?> URL to the URL you want to
      redirect to.
      <br>
      <small>Example:</small>
      <code class="d-block"><b><?php echo OpenDereferrer\Config::i()->get('SITE_URL'); ?>/</b>https://google.com</code>
    </p>

    <?php if (OpenDereferrer\Config::i()->get('NOSPLASH_SUBDOMAIN') !== '') {?>
    <p class="mt-3">
      To enable instant redirects without the splash screen, add the
      <code><?php echo OpenDereferrer\Config::i()->get('NOSPLASH_SUBDOMAIN'); ?>.</code> subdomain to the URL.
      <br>
      <small>Example:</small>
      <code
        class="d-block mt-1"><?php echo 'http' . (OpenDereferrer\Config::i()->get('USE_SSL') ? 's' : '') . '://<b>' . OpenDereferrer\Config::i()->get('NOSPLASH_SUBDOMAIN') . '.</b>' . OpenDereferrer\Config::i()->get('SITE_TLD'); ?>/https://google.com</code>
    </p>

    <?php }?>

    <p class="mt-3 alert alert-dark small">
      While we support unencoded URLs, we highly recommend the usage of <a
        href="https://en.wikipedia.org/wiki/Percent-encoding" target="_blank">percent-encoding</a> or <a
        href="https://en.wikipedia.org/wiki/Base64" target="_blank">base64-encoding</a> when implementing
      <?php echo OpenDereferrer\Config::i()->get('BRAND_NAME'); ?> into your website.<br>
      See the snippets below for examples.
    </p>

    <h5>Snippets</h5>
    <div class="tabs mt-4">

      <?php foreach ($tabs as $i => $tab) {?>
      <input type="radio" name="tabs" id="tab_<?php echo $tab['title']; ?>" <?php echo ($i === 0 ? ' checked' : ''); ?>>
      <label for="tab_<?php echo $tab['title']; ?>"><?php echo $tab['title']; ?></label>
      <?php }?>

      <div class="tab-content">
        <?php foreach ($tabs as $tab) {?>
        <section><?php require __DIR__ . '/examples/' . $tab['exampleFile'] . '.php';?></section>
        <?php }?>
      </div>

    </div>
    </p>
  </div>
</div>