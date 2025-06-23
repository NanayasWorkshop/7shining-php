// Navigation Component
const Navigation = {
    init() {
        this.setupMobileMenu();
        this.setupScrollEffect();
        this.setupActiveLinks();
    },

    /**
     * Mobile menu functionality
     */
    setupMobileMenu() {
        const hamburger = Utils.getElementById('hamburger');
        const navLinks = document.querySelector('.nav-links');
        
        if (!hamburger || !navLinks) return;

        // Toggle mobile menu
        Utils.addEventListener(hamburger, 'click', () => {
            DOM.toggleClass(hamburger, 'active');
            DOM.toggleClass(navLinks, 'active');
        });

        // Close mobile menu when clicking on a link
        const navLinkItems = Utils.querySelectorAll('.nav-links a');
        navLinkItems.forEach(link => {
            Utils.addEventListener(link, 'click', () => {
                DOM.removeClass(hamburger, 'active');
                DOM.removeClass(navLinks, 'active');
            });
        });

        // Close mobile menu when clicking outside
        Utils.addEventListener(document, 'click', (e) => {
            if (!hamburger.contains(e.target) && !navLinks.contains(e.target)) {
                DOM.removeClass(hamburger, 'active');
                DOM.removeClass(navLinks, 'active');
            }
        });

        // Handle escape key
        Utils.addEventListener(document, 'keydown', (e) => {
            if (e.key === 'Escape') {
                DOM.removeClass(hamburger, 'active');
                DOM.removeClass(navLinks, 'active');
            }
        });
    },

    /**
     * Navbar background on scroll
     */
    setupScrollEffect() {
        const navbar = Utils.getElementById('navbar');
        if (!navbar) return;

        const handleScroll = Utils.throttle(() => {
            if (window.scrollY > 50) {
                DOM.setStyles(navbar, {
                    background: 'rgba(255, 255, 255, 0.98)',
                    boxShadow: '0 2px 20px rgba(0, 0, 0, 0.1)'
                });
                DOM.addClass(navbar, 'scrolled');
            } else {
                DOM.setStyles(navbar, {
                    background: 'rgba(255, 255, 255, 0.95)',
                    boxShadow: 'none'
                });
                DOM.removeClass(navbar, 'scrolled');
            }
        }, 100);

        Utils.addEventListener(window, 'scroll', handleScroll);
    },

    /**
     * Set active navigation link
     */
    setupActiveLinks() {
        const currentPath = window.location.pathname;
        const navLinks = Utils.querySelectorAll('.nav-links a');

        navLinks.forEach(link => {
            const linkPath = new URL(link.href).pathname;
            
            // Remove existing active classes
            DOM.removeClass(link, 'active');
            DOM.removeClass(link.parentElement, 'active');

            // Add active class if paths match
            if (linkPath === currentPath || 
                (currentPath === '/' && linkPath === '/') ||
                (currentPath !== '/' && linkPath !== '/' && currentPath.startsWith(linkPath))) {
                DOM.addClass(link, 'active');
                DOM.addClass(link.parentElement, 'active');
            }
        });
    },

    /**
     * Smooth scroll to anchor links
     */
    setupSmoothScroll() {
        const anchorLinks = Utils.querySelectorAll('a[href^="#"]');
        
        anchorLinks.forEach(anchor => {
            Utils.addEventListener(anchor, 'click', (e) => {
                e.preventDefault();
                
                const targetId = anchor.getAttribute('href').substring(1);
                const target = Utils.getElementById(targetId);
                
                if (target) {
                    Utils.scrollToElement(target, 80);
                    
                    // Update URL without scrolling
                    if (history.pushState) {
                        history.pushState(null, null, `#${targetId}`);
                    }
                }
            });
        });
    }
};

// Initialize on DOM ready
document.addEventListener('DOMContentLoaded', () => {
    Navigation.init();
});