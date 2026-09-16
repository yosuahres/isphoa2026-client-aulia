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

// The bar hides only below this depth, so it is always present at the top of a
// page, and only after a movement this large, so trackpad jitter cannot flicker
// it between states.
const HIDE_HEADER_AT = 48;
const HEADER_SCROLL_STEP = 6;

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

    const frost = root.querySelector('[data-nav-frost]');
    const meta = root.querySelector('[data-nav-meta]');

    let open = false;
    let hidden = false;
    let atTop = window.scrollY <= HIDE_HEADER_AT;
    let lastY = window.scrollY;

    // Keyboard focus overrides the hide: a bar that is off-screen but still in
    // the tab order sends focus somewhere the user cannot see.
    let focused = false;

    // Whether the menu is the thing currently holding the page still.
    let lockedScroll = false;

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

        // A light bar at the top, plain glass once it scrolls. surface-light
        // goes with the ground: on the light bar it sets the links dark, and
        // without it they fall back to light against the navy behind the glass.
        const solid = open || atTop;
        header.classList.toggle('surface-light', solid);
        header.classList.toggle('bg-shell', solid);
        if (frost) frost.classList.toggle('opacity-0', solid);

        // The bar follows the reader's direction: gone on the way down, back on
        // the way up, wherever they are on the page. An open menu keeps it, or
        // its own close button would leave with it.
        header.classList.toggle('-translate-y-full', hidden && ! open && ! focused);

        // The masthead belongs to the top of the page. Once the reader has left
        // it, the bar comes back carrying the menu alone.
        const masthead = atTop || open;
        logo.classList.toggle('opacity-0', ! masthead);
        logo.classList.toggle('pointer-events-none', ! masthead);
        if (meta) {
            meta.classList.toggle('opacity-0', ! masthead);

            // An open menu centres the logo over the bar below xl, so the
            // masthead line steps aside there and stays put on the wide bar.
            meta.classList.toggle('hidden', open);
            meta.classList.toggle('xl:block', open);
        }

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

        // Stop the page behind the overlay from scrolling -- but only give the
        // property back if it was this code that took it. The lightbox locks
        // the same one, and any render here (a focusin in the bar, a scroll)
        // would otherwise clear a lock it never set.
        if (open) {
            document.body.style.overflow = 'hidden';
            lockedScroll = true;
        } else if (lockedScroll) {
            document.body.style.overflow = '';
            lockedScroll = false;
        }

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

    window.addEventListener(
        'scroll',
        () => {
            // Clamped: rubber-band overscroll reports negative offsets, which
            // would read as scrolling up and flash the bar back in.
            const y = Math.max(0, window.scrollY);
            const step = y - lastY;
            if (Math.abs(step) < HEADER_SCROLL_STEP) return;

            lastY = y;

            const nextHidden = step > 0 && y > HIDE_HEADER_AT;
            const nextAtTop = y <= HIDE_HEADER_AT;
            if (nextHidden === hidden && nextAtTop === atTop) return;

            hidden = nextHidden;
            atTop = nextAtTop;
            render();
        },
        { passive: true },
    );

    header.addEventListener('focusin', () => {
        focused = true;
        render();
    });

    header.addEventListener('focusout', (e) => {
        if (header.contains(e.relatedTarget)) return;

        focused = false;
        render();
    });

    showLevel('root');
    render();
}

/**
 * Full-size image views.
 *
 * A [data-lightbox-open="id"] button raises the panel with that id; the panel
 * closes on its backdrop, its close buttons, or Escape. Plain DOM code for the
 * same reason the nav is: Alpine would cost 'unsafe-eval' in script-src.
 *
 * Not a <dialog>: showModal() would put the panel in the top layer, above the
 * page, but its ::backdrop cannot be styled without an inline stylesheet and
 * Safari still animates it inconsistently. A fixed panel is enough here.
 */
function initLightbox() {
    const panels = document.querySelectorAll('[data-lightbox]');
    if (panels.length === 0) return;

    panels.forEach((panel) => {
        const triggers = document.querySelectorAll(
            `[data-lightbox-open="${CSS.escape(panel.id)}"]`,
        );
        if (triggers.length === 0) return;

        // Where focus goes on open, and the panel's only tab stop.
        const closers = panel.querySelectorAll('[data-lightbox-close]');
        const dismiss = closers[closers.length - 1];

        let opener = null;
        let showing = false;

        const open = (trigger) => {
            showing = true;
            opener = trigger;
            panel.hidden = false;

            // The fade only runs if the element is laid out at opacity-0
            // first; toggling both in one frame is a jump cut.
            requestAnimationFrame(() => panel.classList.remove('opacity-0'));

            document.body.style.overflow = 'hidden';
            dismiss?.focus();
        };

        const close = () => {
            if (! showing) return;

            showing = false;
            panel.classList.add('opacity-0');
            document.body.style.overflow = '';

            const finish = () => {
                // Reopened while this fade was still running: the panel is
                // wanted again, so this pass has nothing left to do.
                if (showing) return;

                panel.hidden = true;
                opener?.focus();
                opener = null;
            };

            // Kept in the flow until the fade ends, so it does not vanish
            // mid-transition. transitionend alone would strand it open on a
            // browser that skips the transition (reduced motion, background
            // tab), hence the timeout as the floor.
            const done = setTimeout(finish, 220);
            panel.addEventListener(
                'transitionend',
                (e) => {
                    if (e.target !== panel || e.propertyName !== 'opacity') return;
                    clearTimeout(done);
                    finish();
                },
                { once: true },
            );
        };

        triggers.forEach((trigger) =>
            trigger.addEventListener('click', (e) => {
                // A modified or middle click on the <a> fallback belongs to the
                // browser: that is the reader asking for the file itself, in a
                // tab or a window of their own.
                if (e.metaKey || e.ctrlKey || e.shiftKey || e.altKey || e.button !== 0) return;

                e.preventDefault();
                open(trigger);
            }),
        );
        closers.forEach((button) => button.addEventListener('click', close));

        // Escape is bound to the document, not the panel: clicking the image
        // -- which is not focusable -- drops focus to the body, and a handler
        // on the panel would stop hearing keys from that point on.
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape' && showing) {
                e.stopPropagation();
                close();
            }
        });

        // One focus stop in the panel, so Tab cannot wander into the page
        // behind it while the view is up.
        panel.addEventListener('keydown', (e) => {
            if (e.key === 'Tab' && dismiss) {
                e.preventDefault();
                dismiss.focus();
            }
        });
    });
}

document.addEventListener('DOMContentLoaded', () => {
    initReveal();
    initSiteNav();
    initLightbox();

    // Only pages that anchor to an id need this; the rest have no hash.
    if (document.body.dataset.scrollToHash !== undefined) {
        initScrollToHash();
    }
});
