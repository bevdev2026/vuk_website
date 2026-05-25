(function () {
  var toggle  = document.querySelector('.nav-toggle');
  var close   = document.querySelector('.nav-close');
  var overlay = document.querySelector('.nav-overlay');
  var header  = document.getElementById('site-header');

  function openMenu() {
    document.body.classList.add('nav-open');
    toggle.setAttribute('aria-expanded', 'true');
    overlay.removeAttribute('aria-hidden');
    close.focus();
  }

  function closeMenu() {
    document.body.classList.remove('nav-open');
    toggle.setAttribute('aria-expanded', 'false');
    overlay.setAttribute('aria-hidden', 'true');
    toggle.focus();
  }

  toggle.addEventListener('click', openMenu);
  close.addEventListener('click', closeMenu);

  // Close when a nav link inside the overlay is tapped
  overlay.querySelectorAll('.nav-link').forEach(function (link) {
    link.addEventListener('click', closeMenu);
  });

  // Close on backdrop tap (click on overlay itself, not its children)
  overlay.addEventListener('click', function (e) {
    if (e.target === overlay) closeMenu();
  });

  // Escape key
  document.addEventListener('keydown', function (e) {
    if (e.key === 'Escape' && document.body.classList.contains('nav-open')) {
      closeMenu();
    }
  });

  // Scroll: add .scrolled class to header after 20px
  window.addEventListener('scroll', function () {
    header.classList.toggle('scrolled', window.scrollY > 20);
  }, { passive: true });
}());
