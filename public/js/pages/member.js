// Member Page JavaScript
const Member = {
    isExpanded: false,
    isAnimating: false,

    init() {
        this.setupEntranceAnimations();
        this.setupHoverEffects();
        this.setupCollapsibleIframe();
        this.setupMembershipButtons();
        this.setupScrollEffects();
    },

    /**
     * Entrance animations
     */
    setupEntranceAnimations() {
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    DOM.setStyles(entry.target, {
                        opacity: '1',
                        transform: 'translateY(0)'
                    });
                }
            });
        }, observerOptions);

        // Elements to animate on scroll
        const animateElements = Utils.querySelectorAll(
            '.membership-card, .benefit-item, .value-circle'
        );
        
        animateElements.forEach(el => {
            DOM.setStyles(el, {
                opacity: '0',
                transform: 'translateY(30px)',
                transition: 'opacity 0.6s ease, transform 0.6s ease'
            });
            observer.observe(el);
        });
    },

    /**
     * Hover effects for membership cards
     */
    setupHoverEffects() {
        const membershipCards = Utils.querySelectorAll('.membership-card');
        
        membershipCards.forEach(card => {
            Utils.addEventListener(card, 'mouseenter', () => {
                // Add subtle pulse effect to icon
                const icon = card.querySelector('.membership-icon');
                if (icon) {
                    DOM.setStyles(icon, {
                        transform: 'scale(1.1)',
                        transition: 'transform 0.3s ease'
                    });
                }
            });
            
            Utils.addEventListener(card, 'mouseleave', () => {
                const icon = card.querySelector('.membership-icon');
                if (icon) {
                    DOM.setStyles(icon, {
                        transform: 'scale(1)'
                    });
                }
            });
        });

        // Enhanced hover effects for value circles
        const valueCircles = Utils.querySelectorAll('.value-circle');
        
        valueCircles.forEach(circle => {
            Utils.addEventListener(circle, 'mouseenter', () => {
                // Add ripple effect
                this.createRippleEffect(circle);
            });
        });
    },

    /**
     * Create ripple effect
     */
    createRippleEffect(element) {
        const ripple = DOM.createElement('div', {
            className: 'ripple-effect'
        });

        DOM.setStyles(ripple, {
            position: 'absolute',
            borderRadius: '50%',
            background: 'rgba(255, 255, 255, 0.3)',
            transform: 'scale(0)',
            animation: 'ripple 0.6s linear',
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
        
        setTimeout(() => {
            if (ripple.parentNode) {
                ripple.parentNode.removeChild(ripple);
            }
        }, 600);
    },

    /**
     * Collapsible iframe functionality
     */
    setupCollapsibleIframe() {
        const toggleButton = Utils.getElementById('toggleRegistrationBtn');
        const activeMembershipBtn = Utils.getElementById('activeMembershipBtn');
        const registrationContainer = Utils.getElementById('registrationFormContainer');
        const registrationSection = Utils.getElementById('registration-form');
        
        if (!toggleButton || !registrationContainer) return;

        // Toggle function
        const toggleRegistrationForm = () => {
            if (this.isAnimating) return;
            
            this.isAnimating = true;
            DOM.addClass(toggleButton, 'loading');
            
            if (!this.isExpanded) {
                this.expandForm();
            } else {
                this.collapseForm();
            }
        };

        // Expand form function
        const expandForm = () => {
            const toggleIcon = toggleButton.querySelector('.toggle-icon');
            const toggleText = toggleButton.querySelector('.toggle-text');
            
            if (toggleIcon) toggleIcon.textContent = '▲';
            if (toggleText) toggleText.textContent = 'Anmeldeformular schließen';
            DOM.addClass(toggleButton, 'active');
            
            // Expand container
            DOM.addClass(registrationContainer, 'expanding');
            
            setTimeout(() => {
                DOM.addClass(registrationContainer, 'expanded');
                
                // Load iframe content if not already loaded
                this.loadIframeContent();
                
                setTimeout(() => {
                    this.isExpanded = true;
                    this.isAnimating = false;
                    DOM.removeClass(toggleButton, 'loading');
                }, 300);
            }, 50);
        };

        // Collapse form function
        const collapseForm = () => {
            const toggleIcon = toggleButton.querySelector('.toggle-icon');
            const toggleText = toggleButton.querySelector('.toggle-text');
            
            if (toggleIcon) toggleIcon.textContent = '▼';
            if (toggleText) toggleText.textContent = 'Anmeldeformular öffnen';
            DOM.removeClass(toggleButton, 'active');
            
            // Collapse container
            DOM.removeClass(registrationContainer, 'expanded');
            
            setTimeout(() => {
                DOM.removeClass(registrationContainer, 'expanding');
                this.isExpanded = false;
                this.isAnimating = false;
                DOM.removeClass(toggleButton, 'loading');
            }, 500);
        };

        // Store methods for use in other functions
        this.expandForm = expandForm;
        this.collapseForm = collapseForm;

        // Event listeners
        Utils.addEventListener(toggleButton, 'click', toggleRegistrationForm);

        // Active membership button functionality
        if (activeMembershipBtn) {
            Utils.addEventListener(activeMembershipBtn, 'click', (e) => {
                e.preventDefault();
                
                // Scroll to registration section
                this.scrollToRegistration(registrationSection);
                
                // Wait for scroll to complete, then expand form if not already expanded
                setTimeout(() => {
                    if (!this.isExpanded && !this.isAnimating) {
                        toggleRegistrationForm();
                    }
                }, 800);
            });
        }

        // Auto-expand if URL has hash #registration-form
       if (window.location.hash === '#registration-form') {
           setTimeout(() => {
               this.scrollToRegistration(registrationSection);
               setTimeout(() => {
                   if (!this.isExpanded && !this.isAnimating) {
                       toggleRegistrationForm();
                   }
               }, 500);
           }, 100);
       }

       // Handle browser back/forward with hash
       Utils.addEventListener(window, 'hashchange', () => {
           if (window.location.hash === '#registration-form') {
               this.scrollToRegistration(registrationSection);
               if (!this.isExpanded && !this.isAnimating) {
                   setTimeout(() => {
                       toggleRegistrationForm();
                   }, 300);
               }
           }
       });

       // Keyboard accessibility
       Utils.addEventListener(toggleButton, 'keydown', (e) => {
           if (e.key === 'Enter' || e.key === ' ') {
               e.preventDefault();
               toggleRegistrationForm();
           }
       });
   },

   /**
    * Load iframe content
    */
   loadIframeContent() {
       const container = Utils.getElementById('wboRegistrationContainer');
       if (!container || container.innerHTML.trim() !== '') return;

       // Add loading indicator
       const loadingDiv = DOM.createElement('div', {
           className: 'iframe-loading',
           innerHTML: `
               <div style="
                   display: flex;
                   align-items: center;
                   justify-content: center;
                   padding: 2rem;
                   color: #D4AF37;
                   font-size: 1.1rem;
               ">
                   <div style="
                       width: 20px;
                       height: 20px;
                       border: 2px solid #e0e0e0;
                       border-top: 2px solid #D4AF37;
                       border-radius: 50%;
                       animation: spin 1s linear infinite;
                       margin-right: 1rem;
                   "></div>
                   Formular wird geladen...
               </div>
           `
       });

       container.appendChild(loadingDiv);

       // Simulate iframe loading (replace with actual iframe code)
       setTimeout(() => {
           loadingDiv.innerHTML = `
               <div style="
                   background: #f8f9fa;
                   border: 2px dashed #D4AF37;
                   border-radius: 8px;
                   padding: 3rem;
                   text-align: center;
                   color: #666;
               ">
                   <h3 style="color: #D4AF37; margin-bottom: 1rem;">Anmeldeformular</h3>
                   <p>Das Erfolgsassistent-Formular würde hier geladen werden.</p>
                   <p style="font-size: 0.9rem; margin-top: 1rem;">
                       In der Produktionsumgebung wird hier das echte Registrierungsformular angezeigt.
                   </p>
               </div>
           `;
       }, 1500);
   },

   /**
    * Smooth scroll to registration section
    */
   scrollToRegistration(section) {
       if (!section) return;

       const offset = 100; // Offset for fixed header
       const elementPosition = section.offsetTop;
       const offsetPosition = elementPosition - offset;

       window.scrollTo({
           top: offsetPosition,
           behavior: 'smooth'
       });
   },

   /**
    * Membership button interactions
    */
   setupMembershipButtons() {
       const membershipButtons = Utils.querySelectorAll('.membership-button, .final-cta-buttons .cta-button');
       
       membershipButtons.forEach(button => {
           Utils.addEventListener(button, 'click', (e) => {
               const membershipType = button.textContent.includes('Aktiv') ? 'active' : 'standard';
               
               // Console log for tracking
               console.log('Membership registration clicked:', {
                   type: membershipType,
                   buttonText: button.textContent.trim(),
                   timestamp: new Date().toISOString()
               });
               
               // Add click effect
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
    * Scroll effects and parallax
    */
   setupScrollEffects() {
       // Add parallax effect to hero background
       const hero = document.querySelector('.membership-hero');
       
       if (hero) {
           const handleScroll = Utils.throttle(() => {
               const scrolled = window.pageYOffset;
               if (scrolled < window.innerHeight) {
                   const rate = scrolled * -0.5;
                   hero.style.backgroundPosition = `center ${rate}px`;
               }
           }, 16);

           Utils.addEventListener(window, 'scroll', handleScroll);
       }

       // Progressive enhancement for the growth diagram
       const growthSteps = Utils.querySelectorAll('.growth-step');
       
       if (growthSteps.length > 0) {
           const growthObserver = new IntersectionObserver((entries) => {
               entries.forEach(entry => {
                   if (entry.isIntersecting) {
                       DOM.setStyles(entry.target, {
                           opacity: '1',
                           transform: 'translateX(0)'
                       });
                   }
               });
           }, { threshold: 0.5 });

           growthSteps.forEach(step => {
               DOM.setStyles(step, {
                   opacity: '0',
                   transform: 'translateX(30px)',
                   transition: 'opacity 0.6s ease, transform 0.6s ease'
               });
               growthObserver.observe(step);
           });
       }
   },

   /**
    * Dynamic text effects
    */
   setupTextEffects() {
       // Add typewriter effect to hero quote
       const heroQuote = document.querySelector('.cta-highlight');
       if (heroQuote) {
           const originalText = heroQuote.textContent;
           heroQuote.textContent = '';
           heroQuote.style.borderRight = '2px solid #D4AF37';
           
           let i = 0;
           const typeWriter = () => {
               if (i < originalText.length) {
                   heroQuote.textContent += originalText.charAt(i);
                   i++;
                   setTimeout(typeWriter, 50);
               } else {
                   // Remove cursor after typing is complete
                   setTimeout(() => {
                       heroQuote.style.borderRight = 'none';
                   }, 1000);
               }
           };
           
           // Start typewriter effect after a delay
           setTimeout(typeWriter, 1000);
       }
   },

   /**
    * Floating animation for benefit icons
    */
   setupFloatingAnimations() {
       const benefitIcons = Utils.querySelectorAll('.benefit-icon, .value-icon');
       
       benefitIcons.forEach((icon, index) => {
           // Stagger the animation start
           setTimeout(() => {
               icon.style.animation = `float 3s ease-in-out infinite`;
               icon.style.animationDelay = `${index * 0.2}s`;
           }, index * 100);
       });
   },

   /**
    * Community circle interaction
    */
   setupCommunityCircle() {
       const communityCircle = document.querySelector('.community-circle');
       if (!communityCircle) return;

       // Add click interaction
       Utils.addEventListener(communityCircle, 'click', () => {
           communityCircle.style.animation = 'none';
           setTimeout(() => {
               communityCircle.style.animation = 'float 3s ease-in-out infinite, pulse-ring 2s ease-out infinite';
           }, 10);
       });

       // Add hover effect
       Utils.addEventListener(communityCircle, 'mouseenter', () => {
           DOM.setStyles(communityCircle, {
               transform: 'scale(1.05)',
               transition: 'transform 0.3s ease'
           });
       });

       Utils.addEventListener(communityCircle, 'mouseleave', () => {
           DOM.setStyles(communityCircle, {
               transform: 'scale(1)'
           });
       });
   }
};

// Add CSS for animations
const memberCSS = `
@keyframes ripple {
   to {
       transform: scale(4);
       opacity: 0;
   }
}

@keyframes float {
   0%, 100% { transform: translateY(0px); }
   50% { transform: translateY(-10px); }
}

@keyframes pulse-ring {
   0% {
       transform: scale(0.8);
       opacity: 1;
   }
   100% {
       transform: scale(1.2);
       opacity: 0;
   }
}

@keyframes spin {
   0% { transform: rotate(0deg); }
   100% { transform: rotate(360deg); }
}

.registration-form-container {
   max-height: 0;
   overflow: hidden;
   transition: max-height 0.5s ease-in-out, opacity 0.3s ease;
   opacity: 0;
   margin-top: 2rem;
   border-radius: 15px;
   background: #f8f9fa;
   border: 2px solid #e0e0e0;
}

.registration-form-container.expanded {
   max-height: 2000px;
   opacity: 1;
   padding: 2rem;
   border-color: #D4AF37;
   box-shadow: 0 10px 30px rgba(212, 175, 55, 0.1);
}

.registration-form-container.expanding {
   opacity: 1;
}

.toggle-button.loading {
   pointer-events: none;
   opacity: 0.7;
}

.growth-step {
   opacity: 0;
   transform: translateX(30px);
   animation: slide-in 0.6s ease forwards;
   animation-delay: var(--delay, 0s);
}

@keyframes slide-in {
   to {
       opacity: 1;
       transform: translateX(0);
   }
}
`;

// Inject CSS
const memberStyle = document.createElement('style');
memberStyle.textContent = memberCSS;
document.head.appendChild(memberStyle);

// Initialize on DOM ready (only on member page)
document.addEventListener('DOMContentLoaded', () => {
   if (document.querySelector('.membership-hero')) {
       Member.init();
       Member.setupTextEffects();
       Member.setupFloatingAnimations();
       Member.setupCommunityCircle();
   }
});