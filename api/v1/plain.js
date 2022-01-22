const OpenDereferrer = {

  defaultOptions: {
    ignoreHosts: [],
    noSplash: false,
    encodeURL: false,
  },

  init(options) {
    this.options = Object.assign({}, this.defaultOptions, options);
    this.updateLinks();
  },

  isIgnored(url) {
    let host;
    try {
      host = new URL(url).host;
    } catch (e) {
      return true;
    }

    // ignore current host
    if (window.location.host === host) {
      return true;
    }

    return this.options.ignoreHosts.some(h => h === host);
  },

  anonymizeURL(url) {

    if (this.options.encodeURL) {
      url = btoa(url).replace('+', '-').replace('/', '_').replace(/=+$/, '');
    }

    return 'https://' + (this.options.noSplash ? 'nosplash.' : '') + 'open-dereferrer.com/' + encodeURIComponent(url);

  },

  updateLinks() {

    let links = document.querySelectorAll('a');
    links.forEach(link => {
      let href = link.getAttribute('href');
      if (href && !this.isIgnored(href)) {
        link.setAttribute('href', this.anonymizeURL(href));
      }
    });

  }

}