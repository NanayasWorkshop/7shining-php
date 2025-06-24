// Packages Page JavaScript
const Packages = {
    init() {
        this.setupPackageInteractions();
        this.setupPriceAnimations();
        this.setupHoverEffects();
        this.setupScrollAnimations();
        this.setupStatistics();
        this.setupPartnerTracking();
    },

    /**
     * Package card interactions
     */
    setupPackageInteractions() {
        const packageCards = Utils.querySelectorAll('.package-card');
        
        packageCards.forEach(card => {
            // Enhanced hover effects
            Utils.addEventListener(card, 'mouseenter', () => {
                this.animatePackageCard(card, 'enter');
            });

            Utils.addEventListener(card, 'mouseleave', () => {
                this.animatePackageCard(card, 'leave');
            });

            // Package button interactions
            const packageButton = card.querySelector('.package-button');
            if (packageButton) {
                Utils.addEventListener(packageButton, 'click', (e) => {
                    this.handlePackageSelection(card, e);
                });
            }
        });
    },

    /**
     * Animate package card
     */
    animatePackageCard(card, action) {
        const badge = card.querySelector('.package-badge');
        const price = card.querySelector('.price');
        const features = card.querySelectorAll('.package-features li');

        if (action === 'enter') {
            // Scale effect
            DOM.setStyles(card, {
                transform: 'translateY(-8px) scale(1.02)',
                transition: 'all 0.3s ease'
            });

            // Badge animation
            if (badge) {
                DOM.setStyles(badge, {
                    transform: 'scale(1.1)',
                    transition: 'transform 0.3s ease'
                });
            }

            // Price pulsing
            if (price) {
                DOM.setStyles(price, {
                    transform: 'scale(1.05)',
                    transition: 'transform 0.3s ease'
                });
            }

            // Staggered feature animations
            features.forEach((feature, index) => {
                setTimeout(() => {
                    DOM.setStyles(feature, {
                        transform: 'translateX(5px)',
                        transition: 'transform 0.2s ease'
                    });
                }, index * 50);
            });

        } else if (action === 'leave') {
            // Reset all animations
            DOM.setStyles(card, {
                transform: 'translateY(0) scale(1)'
            });

            if (badge) {
                DOM.setStyles(badge, {
                    transform: 'scale(1)'
                });
            }

            if (price) {
                DOM.setStyles(price, {
                    transform: 'scale(1)'
                });
            }

            features.forEach(feature => {
                DOM.setStyles(feature, {
                    transform: 'translateX(0)'
                });
            });
        }
    },

    /**
     * Handle package selection
     */
    handlePackageSelection(card, event) {
        const packageName = card.querySelector('h3')?.textContent || 'Unknown';
        const packagePrice = card.querySelector('.price')?.textContent || 'Unknown';
        const button = event.target;

        // Analytics tracking
        console.log('Package selected:', {
            package: packageName,
            price: packagePrice,
            timestamp: new Date().toISOString(),
            url: button.href
        });

        // Visual feedback
        DOM.setStyles(button, {
            transform: 'scale(0.95)',
            transition: 'transform 0.1s ease'
        });

        setTimeout(() => {
            DOM.setStyles(button, {
                transform: 'scale(1)'
            });
        }, 100);

        // Add loading state for external links
        if (button.href && button.href.includes('7shining.ch/home')) {
            const originalText = button.textContent;
            button.textContent = 'Weiterleitung...';
            button.style.opacity = '0.8';

            // Reset after a short delay if still on page
            setTimeout(() => {
                button.textContent = originalText;
                button.style.opacity = '1';
            }, 2000);
        }
    },

    /**
     * Price animations
     */
    setupPriceAnimations() {
        const prices = Utils.querySelectorAll('.price');
        
        const priceObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    this.animatePrice(entry.target);
                    priceObserver.unobserve(entry.target);
                }
            });
        }, { threshold: 0.5 });

        prices.forEach(price => {
            priceObserver.observe(price);
        });
    },

    /**
     * Animate price numbers
     */
    animatePrice(priceElement) {
        const text = priceElement.textContent;
        const numbers = text.match(/\d+/g);
        
        if (!numbers) return;

        const mainNumber = parseInt(numbers[0]);
        const duration = 1000;
        const steps = 30;
        const increment = mainNumber / steps;
        let current = 0;
        let step = 0;

        const animate = () => {
            if (step < steps) {
                current += increment;
                const newText = text.replace(/\d+/, Math.floor(current).toString());
                priceElement.textContent = newText;
                step++;
                requestAnimationFrame(animate);
            } else {
                priceElement.textContent = text; // Ensure final value is exact
            }
        };

        animate();
    },

    /**
     * Enhanced hover effects
     */
    setupHoverEffects() {
        // Trust badge interaction
        const trustBadge = document.querySelector('.trust-badge');
        if (trustBadge) {
            Utils.addEventListener(trustBadge, 'click', () => {
                this.createSparkleEffect(trustBadge);
            });
        }

        // Process step interactions
        const processSteps = Utils.querySelectorAll('.process-step');
        processSteps.forEach((step, index) => {
            Utils.addEventListener(step, 'mouseenter', () => {
                // Highlight connected steps
                this.highlightProcessFlow(index);
            });

            Utils.addEventListener(step, 'mouseleave', () => {
                this.resetProcessFlow();
            });
        });

        // FAQ item enhanced interactions
        const faqItems = Utils.querySelectorAll('.faq-item');
        faqItems.forEach(item => {
            Utils.addEventListener(item, 'click', () => {
                // Add click ripple effect
                this.createClickRipple(item);
            });
        });
    },

    /**
     * Create sparkle effect
     */
    createSparkleEffect(element) {
        const sparkles = ['✨', '⭐', '💫', '🌟'];
        
        for (let i = 0; i < 6; i++) {
            setTimeout(() => {
                const sparkle = DOM.createElement('div', {
                    textContent: sparkles[Math.floor(Math.random() * sparkles.length)],
                    className: 'sparkle-effect'
                });

                const angle = (360 / 6) * i;
                const distance = 100;
                const x = Math.cos(angle * Math.PI / 180) * distance;
                const y = Math.sin(angle * Math.PI / 180) * distance;

                DOM.setStyles(sparkle, {
                    position: 'absolute',
                    left: '50%',
                    top: '50%',
                    transform: `translate(-50%, -50%)`,
                    fontSize: '1.5rem',
                    pointerEvents: 'none',
                    zIndex: '1000',
                    animation: `sparkle-burst 1s ease-out forwards`
                });

                sparkle.style.setProperty('--end-x', x + 'px');
                sparkle.style.setProperty('--end-y', y + 'px');

                element.style.position = 'relative';
                element.appendChild(sparkle);

                setTimeout(() => DOM.remove(sparkle), 1000);
            }, i * 100);
        }
    },

    /**
     * Highlight process flow
     */
    highlightProcessFlow(activeIndex) {
        const processSteps = Utils.querySelectorAll('.process-step');
        
        processSteps.forEach((step, index) => {
            if (index <= activeIndex) {
                DOM.addClass(step, 'highlighted');
                const stepIcon = step.querySelector('.step-icon');
                if (stepIcon) {
                    DOM.setStyles(stepIcon, {
                        transform: 'scale(1.2)',
                        transition: 'transform 0.3s ease'
                    });
                }
            } else {
                DOM.setStyles(step, {
                    opacity: '0.5',
                    transition: 'opacity 0.3s ease'
                });
            }
        });
    },

    /**
     * Reset process flow
     */
    resetProcessFlow() {
        const processSteps = Utils.querySelectorAll('.process-step');
        
        processSteps.forEach(step => {
            DOM.removeClass(step, 'highlighted');
            const stepIcon = step.querySelector('.step-icon');
            if (stepIcon) {
                DOM.setStyles(stepIcon, {
                    transform: 'scale(1)'
                });
            }
            DOM.setStyles(step, {
                opacity: '1'
            });
        });
    },

    /**
     * Create click ripple effect
     */
    createClickRipple(element) {
        const ripple = DOM.createElement('div', {
            className: 'click-ripple'
        });

        DOM.setStyles(ripple, {
            position: 'absolute',
            borderRadius: '50%',
            background: 'rgba(212, 175, 55, 0.3)',
            transform: 'scale(0)',
            animation: 'ripple-expand 0.6s ease-out',
            width: '100px',
            height: '100px',
            left: '50%',
            top: '50%',
            marginLeft: '-50px',
            marginTop: '-50px',
            pointerEvents: 'none'
        });

        element.style.position = 'relative';
        element.appendChild(ripple);

        setTimeout(() => DOM.remove(ripple), 600);
    },

    /**
     * Scroll animations
     */
    setupScrollAnimations() {
        // Hero stats counter
        const stats = Utils.querySelectorAll('.stat-number');
        
        const statsObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    this.animateStatNumber(entry.target);
                    statsObserver.unobserve(entry.target);
                }
            });
        }, { threshold: 0.5 });

        stats.forEach(stat => {
            statsObserver.observe(stat);
        });

        // Package cards entrance
        const packageCards = Utils.querySelectorAll('.package-card');
        
        packageCards.forEach((card, index) => {
            DOM.setStyles(card, {
                opacity: '0',
                transform: 'translateY(50px)',
                transition: `opacity 0.6s ease ${index * 0.2}s, transform 0.6s ease ${index * 0.2}s`
            });

            const cardObserver = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        DOM.setStyles(entry.target, {
                            opacity: '1',
                            transform: 'translateY(0)'
                        });
                        cardObserver.unobserve(entry.target);
                    }
                });
            }, { threshold: 0.2 });

            cardObserver.observe(card);
        });
    },

    /**
     * Animate statistics numbers
     */
    animateStatNumber(statElement) {
        const finalValue = statElement.textContent;
        const numericValue = parseInt(finalValue.replace(/\D/g, ''));
        
        if (isNaN(numericValue)) return;

        const duration = 2000;
        const steps = 60;
        const increment = numericValue / steps;
        let current = 0;
        let step = 0;

        const animate = () => {
            if (step < steps) {
                current += increment;
                const currentInt = Math.floor(current);
                statElement.textContent = finalValue.replace(/\d+/, currentInt.toString());
                step++;
                requestAnimationFrame(animate);
            } else {
                statElement.textContent = finalValue;
            }
        };

        animate();
    },

    /**
     * Setup statistics interactions
     */
    setupStatistics() {
        const heroStats = document.querySelector('.hero-stats');
        if (!heroStats) return;

        // Add interactive hover effects
        const stats = Utils.querySelectorAll('.stat');
        
        stats.forEach(stat => {
            Utils.addEventListener(stat, 'mouseenter', () => {
                DOM.setStyles(stat, {
                    transform: 'scale(1.1)',
                    transition: 'transform 0.3s ease'
                });
            });

            Utils.addEventListener(stat, 'mouseleave', () => {
                DOM.setStyles(stat, {
                    transform: 'scale(1)'
                });
            });
        });
    },

    /**
     * Partner tracking for package URLs
     */
    setupPartnerTracking() {
        // This would integrate with the existing partner tracking system
        const packageButtons = Utils.querySelectorAll('.package-button');
        
        packageButtons.forEach(button => {
            Utils.addEventListener(button, 'click', () => {
                // Check if there's a partner ID in the URL or session
                const partnerID = this.getPartnerID();
                
                if (partnerID && button.href) {
                    // Add partner ID to the URL if not already present
                    const url = new URL(button.href);
                    if (!url.searchParams.has('partnerid')) {
                        url.searchParams.set('partnerid', partnerID);
                        button.href = url.toString();
                    }
                }
            });
        });
    },

    /**
     * Get partner ID from session or URL
     */
    getPartnerID() {
        // Check session storage first
        const sessionPartnerID = sessionStorage.getItem('partnerID');
        if (sessionPartnerID) return sessionPartnerID;

        // Check localStorage
        const localPartnerID = localStorage.getItem('partnerID');
        if (localPartnerID) return localPartnerID;

        // Check current URL
        const urlParams = new URLSearchParams(window.location.search);
        const urlPartnerID = urlParams.get('partnerid');
        if (urlPartnerID) {
            // Store for future use
            sessionStorage.setItem('partnerID', urlPartnerID);
            return urlPartnerID;
        }

        return null;
    }
};

// Add CSS for package animations
const packagesCSS = `
@keyframes sparkle-burst {
    0% {
        transform: translate(-50%, -50%) scale(0);
        opacity: 1;
    }
    50% {
        transform: translate(calc(-50% + var(--end-x)), calc(-50% + var(--end-y))) scale(1);
        opacity: 1;
    }
    100% {
        transform: translate(calc(-50% + var(--end-x)), calc(-50% + var(--end-y))) scale(0);
        opacity: 0;
    }
}

@keyframes ripple-expand {
    to {
        transform: scale(4);
        opacity: 0;
    }
}

.package-card.highlighted {
    border-color: var(--color-primary);
    box-shadow: 0 0 20px rgba(212, 175, 55, 0.3);
}

.process-step.highlighted {
    background: linear-gradient(135deg, rgba(212, 175, 55, 0.1), rgba(212, 175, 55, 0.05));
    border-color: var(--color-primary);
}

.stat {
    cursor: pointer;
}

.package-button:hover {
    animation: pulse 0.5s ease-in-out;
}

@keyframes pulse {
    0% { transform: scale(1); }
    50% { transform: scale(1.05); }
    100% { transform: scale(1); }
}
`;

// Inject CSS
const packagesStyle = document.createElement('style');
packagesStyle.textContent = packagesCSS;
document.head.appendChild(packagesStyle);

// Initialize on DOM ready (only on packages page)
document.addEventListener('DOMContentLoaded', () => {
    if (document.querySelector('.packages-hero')) {
        Packages.init();
    }
});