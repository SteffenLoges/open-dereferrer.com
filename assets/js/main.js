function scrollToSelector(selector) {
  var element = document.querySelector(selector);
  if (!element) {
    return;
  }
  element.scrollIntoView({
    behavior: 'smooth',
    block: 'start'
  });
  return false
}

function copyInputValueToClipboard(input, trigger) {
  let onSuccess = () => {
    trigger.classList.add('copied');
    setTimeout(() => {
      trigger.classList.remove('copied');
    }, 1e3);
  }

  if (!navigator.clipboard) {
    // falllback to old method
    input.focus();
    input.select();
    let success = document.execCommand('copy');
    input.setSelectionRange(0, 0);
    input.blur();
    if (!success) {
      console.error('Unable to copy');
      return
    }
    onSuccess();
    return
  }

  navigator.clipboard.writeText(input.value)
    .then(
      () => onSuccess(),
      err => console.error('Unable to copy', err)
    );
}

document.addEventListener("DOMContentLoaded", () => {

  // add smooth scrolling to all links with data-anchor
  let anchors = document.querySelectorAll('[data-anchor]');
  for (let i = 0; i < anchors.length; i++) {
    anchors[i].addEventListener('click', function (e) {
      e.preventDefault();
      scrollToSelector(this.getAttribute('data-anchor'));
    });
  }

  // handle input group copy buttons
  let inputCopyButtons = document.querySelectorAll('.input-group .copy-btn');
  for (let i = 0; i < inputCopyButtons.length; i++) {
    inputCopyButtons[i].addEventListener('click', function (e) {
      e.preventDefault();
      let input = this.parentElement.querySelector('input');
      copyInputValueToClipboard(input, e.target);
    });
  }
})