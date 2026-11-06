
// ======================================================
// Navbar MujaPhotography — diambil dari library/navbar
// Dihapus: SPA routing; Dipertahankan: animasi GSAP open/close
// ======================================================

const nav             = document.getElementById('site-nav')
const menuOpenBtn     = document.querySelector('.hamburger-menu')
const menuCloseBtn    = document.querySelector('.hamburger-menu-close')
const circle          = document.getElementById('circle')
const path1           = document.getElementById('Path_1')
const path2           = document.getElementById('Path_2')
const line1           = document.getElementById('Line_1')

// Keluar lebih awal jika elemen navbar tidak ada di halaman ini
if (nav && menuOpenBtn && menuCloseBtn) {

  let menuOpened = false

  // ---- Inisialisasi viewportHeight (untuk --vh CSS var) -----
  function setViewportHeight() {
    const vh = window.innerHeight * 0.01
    document.documentElement.style.setProperty('--vh', `${vh}px`)
  }

  function debounce(fn, ms) {
    let timer
    return (...args) => {
      clearTimeout(timer)
      timer = setTimeout(() => fn(...args), ms)
    }
  }

  setViewportHeight()

  window.addEventListener('resize', debounce(() => {
    setViewportHeight()
  }, 300))

  // ---- Inisialisasi ikon close (SVG) -------------------------
  function initMenuIcon() {
    if (!circle) return
    gsap.set(circle, { strokeDasharray: 227, strokeDashoffset: -193 })
    gsap.set(path1,  { strokeDasharray: 10,  strokeDashoffset: 10  })
    gsap.set(path2,  { strokeDasharray: 10,  strokeDashoffset: 10  })
    gsap.set(line1,  { strokeDasharray: 40,  strokeDashoffset: 40  })
  }

  initMenuIcon()

  // ---- Init posisi nav-columns (animasi masuk dari bawah) -----
  gsap.set('.nav-columns', { y: 60, opacity: 0 })

  const menuTl = gsap.timeline({ paused: true })
  menuTl
    .to(nav, { duration: 0, display: 'block' })
    .to('body', { duration: 0, overflow: 'hidden' })
    .to('.nav-columns', {
      duration: 0.9,
      y: 0,
      opacity: 1,
      ease: 'expo.inOut'
    })
    .to('.hamburger-menu span', {
      duration: 0.5,
      delay: -0.9,
      scaleX: 0,
      transformOrigin: '50% 0%',
      ease: 'expo.inOut'
    })

  if (circle) {
    menuTl
      .to(path1, { duration: 0.4, delay: -0.6, strokeDashoffset: 10, strokeDasharray: 5 })
      .to(path2, { duration: 0.4, delay: -0.6, strokeDashoffset: 10, strokeDasharray: 20 })
      .to(line1, { duration: 0.4, delay: -0.6, strokeDashoffset: 40, strokeDasharray: 18 })
      .to(circle, { duration: 0.6, delay: -0.8, strokeDashoffset: 0, ease: 'expo.inOut' })
  }

  menuTl.to('.hamburger-menu-close', { duration: 0.6, delay: -0.8, display: 'block' })

  // ---- Init posisi nav-columns ------------------------------
  gsap.set('.nav-columns', { y: 125 })

  function openMenu() {
    if (menuOpened) return
    menuOpened = true
    menuTl.play(0)
  }

  function closeMenu() {
    if (!menuOpened) return
    menuOpened = false
    menuTl.reverse()
    menuTl.eventCallback('onReverseComplete', () => {
      gsap.set('.hamburger-menu-close', { display: 'none' })
      gsap.set('body', { overflow: 'auto' })
      gsap.set(nav, { display: 'none' })
    })
  }

  // ---- Event listeners --------------------------------------
  menuOpenBtn.addEventListener('click', openMenu)
  menuCloseBtn.addEventListener('click', closeMenu)

  // Tutup menu jika link di nav diklik (navigasi biasa Laravel)
  nav.querySelectorAll('a').forEach(link => {
    link.addEventListener('click', () => {
      // Biarkan navigasi berjalan normal; tutup menu tanpa animasi
      menuOpened = false
      menuTl.pause(0)
      gsap.set('.nav-columns', { y: 60, opacity: 0 })
      gsap.set('.hamburger-menu span', { scaleX: 1, transformOrigin: '50% 0%' })
      gsap.set('.hamburger-menu-close', { display: 'none' })
      gsap.set('body', { overflow: 'auto' })
      gsap.set(nav, { display: 'none' })
      initMenuIcon()
    })
  })
}
