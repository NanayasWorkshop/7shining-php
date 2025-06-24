// Animation Components
const Animations = {
    init() {
        this.setupScrollAnimations();
        this.setupHoverEffects();
        this.setupLoadingAnimations();
    },

    /**
     * Scroll-triggered animations
     */
    setupScrollAnimations() {
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    this.animateElement(entry.target);
                }
            });
        }, observerOptions);

        // Elements to animate on scroll
        const animateElements = Utils.querySelectorAll(
            '.step, .testimonial, .value-item, .feature-card, .package-card, .faq-item, .article-card'
        );
        
        animateElements.forEach((el, index) => {
            // Set initial state
            DOM.setStyles(el, {
                opacity: '0',
                transform: 'translateY(30px)',
                transition: 'opacity 0.6s ease, transform 0.6s ease'
            });

            // Add stagger delay
            el.style.transitionDelay = `${index * 0.1}s`;
            
            observer.observe(el);
        });
    },

    /**
     * Animate element into view
     */
    animateElement(element) {
        DOM.setStyles(element, {
            opacity: '1',
            transform: 'translateY(0)'
        });

        // Add animation class for CSS animations
        DOM.addClass(element, 'animated');
    },

    /**
     * Hover effects
     */
    setupHoverEffects() {
        // Card hover effects
        const cards = Utils.querySelectorAll('.card, .package-card, .testimonial, .step');
        
        cards.forEach(card => {
            Utils.addEventListener(card, 'mouseenter', () => {
                const icon = card.querySelector('.step-number, .package-icon, .feature-icon');
                if (icon) {
                    DOM.setStyles(icon, {
                        transform: 'scale(1.1)',
                        transition: 'transform 0.3s ease'
                    });
                }
            });
            
            Utils.addEventListener(card, 'mouseleave', () => {
                const icon = card.querySelector('.step-number, .package-icon, .feature-icon');
                if (icon) {
                    DOM.setStyles(icon, {
                        transform: 'scale(1)'
                    });
                }
            });
        });

        // Button hover effects
        const buttons = Utils.querySelectorAll('.cta-button, .secondary-button, .package-button');
        
        buttons.forEach(button => {
            Utils.addEventListener(button, 'click', (e) => {
                // Ripple effect
                this.createRipple(e, button);
                
                // Scale effect
                DOM.setStyles(button, {
                    transform: 'scale(0.95)'
                });
                
                setTimeout(() => {
                    DOM.setStyles(button, {
                        transform: 'scale(1)'
                    });
                }, 150);
            });
        });
    },

    /**
     * Create ripple effect
     */
    createRipple(event, element) {
        const ripple = DOM.createElement('span', {
            className: 'ripple'
        });

        const rect = element.getBoundingClientRect();
        const size = Math.max(rect.width, rect.height);
        const x = event.clientX - rect.left - size / 2;
        const y = event.clientY - rect.top - size / 2;

        DOM.setStyles(ripple, {
            position: 'absolute',
            borderRadius: '50%',
            background: 'rgba(255, 255, 255, 0.6)',
            transform: 'scale(0)',
            animation: 'ripple 0.6s linear',
            width: size + 'px',
            height: size + 'px',
            left: x + 'px',
            top: y + 'px',
            pointerEvents: 'none'
        });

        // Make sure element has relative position
        if (DOM.getStyle(element, 'position') === 'static') {
            element.style.position = 'relative';
        }

        element.appendChild(ripple);

        // Remove ripple after animation
        setTimeout(() => {
            if (ripple.parentNode) {
                ripple.parentNode.removeChild(ripple);
            }
        }, 600);
    },

    /**
     * Loading animations
     */
    setupLoadingAnimations() {
        // Skeleton loading for images
        const images = Utils.querySelectorAll('img[data-src]');
        
        images.forEach(img => {
            this.setupLazyLoading(img);
        });

        // Progress bars
        const progressBars = Utils.querySelectorAll('.progress-bar');
        
        progressBars.forEach(bar => {
            this.animateProgressBar(bar);
        });
    },

    /**
     * Lazy loading for images
     */
    setupLazyLoading(img) {
        const imageObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const img = entry.target;
                    img.src = img.dataset.src;
                    
                    img.addEventListener('load', () => {
                        DOM.removeClass(img, 'lazy');
                        DOM.addClass(img, 'loaded');
                    });
                    
                    imageObserver.unobserve(img);
                }
            });
        });

        imageObserver.observe(img);
    },

    /**
     * Animate progress bar
     */
    animateProgressBar(progressBar) {
        const targetWidth = progressBar.dataset.progress || '0';
        const progressFill = progressBar.querySelector('.progress-fill');
        
        if (!progressFill) return;

        // Animate to target width
        let currentWidth = 0;
        const increment = parseInt(targetWidth) / 50;
        
        const animate = () => {
            if (currentWidth < parseInt(targetWidth)) {
                currentWidth += increment;
                progressFill.style.width = Math.min(currentWidth, parseInt(targetWidth)) + '%';
                requestAnimationFrame(animate);
            }
        };
        
        // Start animation when in view
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    animate();
                    observer.unobserve(entry.target);
                }
            });
        });
        
        observer.observe(progressBar);
    },

    /**
     * Parallax effect
     */
    setupParallax() {
        const parallaxElements = Utils.querySelectorAll('[data-parallax]');
        
        if (parallaxElements.length === 0) return;

        const handleScroll = Utils.throttle(() => {
            const scrolled = window.pageYOffset;
            
            parallaxElements.forEach(element => {
                const rate = scrolled * -0.5;
                const yPos = -(scrolled / parseFloat(element.dataset.parallax || 2));
                
                DOM.setStyles(element, {
                    transform: `translate3d(0, ${yPos}px, 0)`
                });
            });
        }, 16); // ~60fps

        Utils.addEventListener(window, 'scroll', handleScroll);
    },

    /**
     * Typing animation
     */
    typeWriter(element, text, speed = 50) {
        if (!element) return;
        
        element.textContent = '';
        let i = 0;
        
        const type = () => {
            if (i < text.length) {
                element.textContent += text.charAt(i);
                i++;
                setTimeout(type, speed);
            }
        };
        
        type();
    },

    /**
     * Count up animation
     */
    countUp(element, start = 0, end = 100, duration = 2000) {
        if (!element) return;
        
        const range = end - start;
        const increment = range / (duration / 16);
        let current = start;
        
        const timer = setInterval(() => {
            current += increment;
            if (current >= end) {
                current = end;
                clearInterval(timer);
            }
            element.textContent = Math.floor(current);
        }, 16);
    }
};

// Add CSS for ripple animation
const rippleCSS = `
@keyframes ripple {
    to {
        transform: scale(4);
        opacity: 0;
    }
}
`;

// Inject CSS
const style = document.createElement('style');
style.textContent = rippleCSS;
document.head.appendChild(style);

// Initialize on DOM ready
document.addEventListener('DOMContentLoaded', () => {
    Animations.init();
});