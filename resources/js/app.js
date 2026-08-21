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

document.addEventListener('DOMContentLoaded', () => {
    initReveal();

    // Only pages that anchor to an id need this; the rest have no hash.
    if (document.body.dataset.scrollToHash !== undefined) {
        initScrollToHash();
    }
});
