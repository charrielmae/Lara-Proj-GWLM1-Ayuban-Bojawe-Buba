// ===== About page JavaScript =====
// Feature 1: Read More / Read Less on the background text
// Feature 2: Animated counters (start when scrolled into view)

document.addEventListener('DOMContentLoaded', function () {

    // ---------- Read More / Read Less ----------
    const toggleBtn = document.getElementById('read-toggle');
    const moreText  = document.getElementById('more-text');

    if (toggleBtn && moreText) {
        toggleBtn.addEventListener('click', function () {
            const isHidden = moreText.hasAttribute('hidden');

            if (isHidden) {
                moreText.removeAttribute('hidden');
                toggleBtn.textContent = 'Read Less';
            } else {
                moreText.setAttribute('hidden', '');
                toggleBtn.textContent = 'Read More';
            }

            toggleBtn.setAttribute('aria-expanded', String(isHidden));
        });
    }

    // ---------- Animated counters ----------
    const counters = document.querySelectorAll('.count');
    const duration = 1800; // milliseconds

    function animateCount(el) {
        const target = parseInt(el.dataset.target, 10);
        const start  = performance.now();

        function step(now) {
            const progress = Math.min((now - start) / duration, 1);
            // ease-out so it slows down near the end
            const eased = 1 - Math.pow(1 - progress, 3);
            el.textContent = Math.round(target * eased);

            if (progress < 1) {
                requestAnimationFrame(step);
            }
        }

        requestAnimationFrame(step);
    }

    if ('IntersectionObserver' in window) {
        const observer = new IntersectionObserver(function (entries, obs) {
            entries.forEach(function (entry) {
                if (entry.isIntersecting) {
                    animateCount(entry.target);
                    obs.unobserve(entry.target); // run only once
                }
            });
        }, { threshold: 0.6 });

        counters.forEach(function (el) { observer.observe(el); });
    } else {
        // Older browsers: just show the final numbers
        counters.forEach(function (el) { el.textContent = el.dataset.target; });
    }
});
