// Drop the no-js class as early as possible so the .reveal fallback in
// app.css stops forcing every element visible.
document.documentElement.classList.remove('no-js');

/**
 * Fades elements up once they scroll into view, then stops observing them.
 * The hidden state lives in CSS (.reveal), so it is applied before this runs
 * and cannot flash. Ported from the Reveal component in the Next.js app.
 */
function initReveal() {
    const nodes = document.querySelectorAll('[data-reveal]');
    if (nodes.length === 0) return;

    // Applied here rather than as a style attribute in the markup, so the
    // pages need no 'unsafe-inline' in style-src. CSSOM writes are not
    // covered by CSP.
    nodes.forEach((node) => {
        const delay = node.dataset.revealDelay;
        if (delay) node.style.setProperty('--reveal-delay', `${delay}ms`);
    });

    // Without IntersectionObserver, show everything rather than nothing.
    if (! ('IntersectionObserver' in window)) {
        nodes.forEach((node) => node.classList.add('is-visible'));
        return;
    }

    const observer = new IntersectionObserver(
        (entries, obs) => {
            entries.forEach((entry) => {
                if (! entry.isIntersecting) return;
                entry.target.classList.add('is-visible');
                obs.unobserve(entry.target);
            });
        },
        { rootMargin: '0px 0px -12% 0px', threshold: 0.1 },
    );

    nodes.forEach((node) => observer.observe(node));
}

/**
 * Eases from the top of the page down to the element named by the URL hash.
 * Landing on /speakers#some-name should feel like travelling to that speaker
 * rather than teleporting, which is what the browser does by default.
 */
const SCROLL_DURATION = 1400;

const easeInOutCubic = (t) => (t < 0.5 ? 4 * t * t * t : 1 - (-2 * t + 2) ** 3 / 2);

function initScrollToHash() {
    const root = document.documentElement;
    const reduced = window.matchMedia('(prefers-reduced-motion: reduce)');
    let frame = 0;

    const offsetOf = (el) =>
        window.scrollY +
        el.getBoundingClientRect().top -
        (parseFloat(getComputedStyle(el).scrollMarginTop) || 0);

    const run = () => {
        const id = decodeURIComponent(window.location.hash.slice(1));
        if (! id) return;

        const target = document.getElementById(id);
        if (! target) return;

        cancelAnimationFrame(frame);

        const previous = root.style.scrollBehavior;
        root.style.scrollBehavior = 'auto';

        if (reduced.matches) {
            window.scrollTo(0, offsetOf(target));
            root.style.scrollBehavior = previous;
            return;
        }

        window.scrollTo(0, 0);
        const end = offsetOf(target);
        const startedAt = performance.now();

        const step = (now) => {
            const t = Math.min(1, (now - startedAt) / SCROLL_DURATION);
            window.scrollTo(0, end * easeInOutCubic(t));

            if (t < 1) {
                frame = requestAnimationFrame(step);
            } else {
                root.style.scrollBehavior = previous;
            }
        };

        frame = requestAnimationFrame(step);
    };

    if ('scrollRestoration' in history) {
        history.scrollRestoration = 'manual';
    }

    run();
    window.addEventListener('hashchange', run);
}

/**
 * Mobile navigation.
 *
 * Deliberately not Alpine: Alpine compiles its attribute expressions with
 * new Function(), so keeping it would mean allowing 'unsafe-eval' in the
 * script-src of every public page. This menu is small enough that plain DOM
 * code costs less than that concession.
 */
function initSiteNav() {
    const root = document.querySelector('[data-site-nav]');
    if (! root) return;

    const header = root.querySelector('[data-nav-header]');
    const bar = root.querySelector('[data-nav-bar]');
    const panel = root.querySelector('[data-nav-panel]');
    const toggle = root.querySelector('[data-nav-toggle]');
    const logoWide = root.querySelector('[data-nav-logo-wide]');
    const logoMark = root.querySelector('[data-nav-logo-mark]');
    const iconMenu = root.querySelector('[data-nav-icon-menu]');
    const iconClose = root.querySelector('[data-nav-icon-close]');
    const logo = root.querySelector('[data-nav-logo]');
    const levels = root.querySelectorAll('[data-nav-level]');

    if (! panel || ! toggle) return;

    let open = false;

    const showLevel = (name) => {
        levels.forEach((el) => {
            el.hidden = el.dataset.navLevel !== name;
        });
    };

    const render = () => {
        panel.hidden = ! open;
        toggle.setAttribute('aria-expanded', String(open));
        toggle.setAttribute('aria-label', open ? 'Close menu' : 'Open menu');

        // The bar grows while the menu is open so the circular mark fits.
        bar.classList.toggle('h-16', ! open);
        bar.classList.toggle('h-28', open);
        header.classList.toggle('border-line', ! open);
        header.classList.toggle('border-transparent', open);
        header.classList.toggle('xl:border-line', open);

        // Centre the logo while open, leaving the close button alone on the right.
        logo.classList.toggle('absolute', open);
        logo.classList.toggle('left-1/2', open);
        logo.classList.toggle('top-1/2', open);
        logo.classList.toggle('-translate-x-1/2', open);
        logo.classList.toggle('-translate-y-1/2', open);
        logo.classList.toggle('xl:static', open);
        logo.classList.toggle('xl:translate-x-0', open);
        logo.classList.toggle('xl:translate-y-0', open);

        logoWide.classList.toggle('hidden', open);
        logoWide.classList.toggle('xl:block', open);
        logoMark.classList.toggle('hidden', ! open);

        iconMenu.classList.toggle('hidden', open);
        iconClose.classList.toggle('hidden', ! open);

        // Stop the page behind the overlay from scrolling.
        document.body.style.overflow = open ? 'hidden' : '';

        if (! open) showLevel('root');
    };

    toggle.addEventListener('click', () => {
        open = ! open;
        render();
    });

    root.querySelectorAll('[data-nav-open-group]').forEach((button) => {
        button.addEventListener('click', () => showLevel(button.dataset.navOpenGroup));
    });

    root.querySelectorAll('[data-nav-back]').forEach((button) => {
        button.addEventListener('click', () => showLevel('root'));
    });

    // Escape closes, matching what a keyboard user expects of an overlay.
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && open) {
            open = false;
            render();
            toggle.focus();
        }
    });

    showLevel('root');
    render();
}

document.addEventListener('DOMContentLoaded', () => {
    initReveal();
    initSiteNav();

    // Only pages that anchor to an id need this; the rest have no hash.
    if (document.body.dataset.scrollToHash !== undefined) {
        initScrollToHash();
    }
});
