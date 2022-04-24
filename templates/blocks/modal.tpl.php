<?php
if (!defined('ROOT_DIR')) {
    exit('No direct script access allowed');
}

$otherOptions = [
    [
        'title' => 'HTML',
        'icon' => 'code-tags',
        'value' => '<a href="' . $modal_base64URL . '">' . $modal_host . '</a>',
    ],
    [
        'title' => 'BBCode',
        'icon' => 'code-brackets',
        'value' => "[url=" . $modal_base64URL . "]" . $modal_host . "[/url]",
    ],
    [
        'title' => 'Plain',
        'icon' => 'link-variant',
        'value' => $modal_fullURL,
    ],
];

?>
<noscript>
  <style>
  .copy-btn {
    display: none;
  }

  input[type=text] {
    border-top-right-radius: 4px !important;
    border-bottom-right-radius: 4px !important;
  }
  </style>
</noscript>

<div id="modal-url-submitted">
  <div class="modal-backdrop"></div>
  <div class="modal show d-block" tabindex="-1">
    <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content rounded-0 border-0">
        <div class="modal-header">
          <h4 class="modal-title text-center w-100 pt-1">
            <strong>Your anonymized URL is:</strong>
          </h4>
          <a href="<?php echo OpenDereferrer\Config::i()->get('SITE_URL'); ?>" id="modal-close">x</a>
        </div>
        <div class="modal-body">
          <div class="mx-3 mx-md-5 mb-3 mb-md-5 mt-2 mt-mb-3">
            <div class="input-group">
              <input type="text" readonly class="form-control form-control-lg select-all" aria-label="anonymized URL"
                aria-describedby="anonymize" value="<?php echo htmlspecialchars($modal_base64URL); ?>">
              <button class="btn btn-primary copy-btn" type="button">Copy</button>
            </div>
          </div>

          <section class="modal-other-options text-white px-3 px-md-5 py-3">
            <h5>
              <strong>Other options</strong>
            </h5>
            <?php foreach ($otherOptions as $option) {?>
            <div class="input-group mt-3">
              <div class="input-group-text d-block text-center" style="width: 120px;">
                <span class="mdi mr-1 mdi-<?php echo $option['icon']; ?>" aria-hidden="true"></span>
                <?php echo $option['title']; ?>
              </div>
              <input type="text" readonly class="form-control form-control-sm select-all" aria-label="anonymized URL"
                aria-describedby="anonymize" value="<?php echo htmlspecialchars($option['value']); ?>">
              <button class="btn btn-info text-dark copy-btn" type="button">Copy</button>
            </div>
            <?php }?>

            <p class="small text-white mt-3">
              Are you a developer and want to integrate
              <?php echo OpenDereferrer\Config::i()->get('BRAND_NAME'); ?> into your website?
              Check out the <a class="text-white"
                href="<?php echo OpenDereferrer\Config::i()->get('SITE_URL'); ?>/?#documentation">documentation</a>
              for more information!
            </p>
          </section>
        </div>
      </div>
    </div>
  </div>
</div>