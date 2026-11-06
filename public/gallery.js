/**
 * ============================================================
 * MUJA PHOTOGRAPHY — Gallery Section
 * Adaptasi dari library/gallery (formasi "data-grid-first")
 *
 * Grid foto akan naik dari bawah satu per satu saat section
 * di-pin, lalu judul "Portofolio" muncul dari bawah.
 *
 * Butuh: GSAP + ScrollTrigger (dimuat di layouts/app.blade.php)
 * ============================================================
 */
(function () {
    'use strict';

    function initGallery() {
        var grid = document.querySelector('[data-grid-first]');

        if (!grid || !window.gsap || !window.ScrollTrigger) {
            return;
        }

        var gsap = window.gsap;

        gsap.registerPlugin(window.ScrollTrigger);

        var gridImages = grid.querySelectorAll('.grid__img');
        var title = grid.parentNode.querySelector('.content__title');

        gsap.timeline({
            defaults: {
                ease: 'sine',
            },
            scrollTrigger: {
                trigger: grid,
                start: 'center center',
                end: '+=250%',
                pin: grid.parentNode,
                scrub: 0.5,
            },
        })
            .from(gridImages, {
                stagger: 0.07,
                y: function () {
                    return gsap.utils.random(window.innerHeight, window.innerHeight * 1.8);
                },
            })
            // Judul muncul setelah grid mulai tertata
            .from(
                title,
                {
                    duration: 1.2,
                    ease: 'power4',
                    yPercent: 180,
                    autoAlpha: 0,
                },
                0.8,
            );
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initGallery);
    } else {
        initGallery();
    }
})();
