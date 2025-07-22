// Form Components
const Forms = {
    init() {
        this.setupFormValidation();
        this.setupFormSubmission();
        this.setupInputEffects();
    },

    /**
     * Form validation
     */
    setupFormValidation() {
        const forms = Utils.querySelectorAll('form[data-validate]');
        
        forms.forEach(form => {
            const inputs = form.querySelectorAll('input, textarea, select');
            
            inputs.forEach(input => {
                // Real-time validation
                Utils.addEventListener(input, 'blur', () => {
                    this.validateField(input);
                });

                Utils.addEventListener(input, 'input', () => {
                    // Clear error state on input
                    this.clearFieldError(input);
                });
            });

            // Form submission validation
            Utils.addEventListener(form, 'submit', (e) => {
                if (!this.validateForm(form)) {
                    e.preventDefault();
                }
            });
        });
    },

    /**
     * Validate individual field
     */
    validateField(field) {
        const value = field.value.trim();
        const type = field.type;
        const required = field.hasAttribute('required');
        let isValid = true;
        let errorMessage = '';

        // Remove existing error
        this.clearFieldError(field);

        // Required validation
        if (required && !value) {
            isValid = false;
            errorMessage = 'Dieses Feld ist erforderlich.';
        }
        // Email validation
        else if (type === 'email' && value && !Utils.isValidEmail(value)) {
            isValid = false;
            errorMessage = 'Bitte geben Sie eine gültige E-Mail-Adresse ein.';
        }
        // Phone validation
        else if (type === 'tel' && value && !/^[\d\s\+\-\(\)]+$/.test(value)) {
            isValid = false;
            errorMessage = 'Bitte geben Sie eine gültige Telefonnummer ein.';
        }
        // Min length validation
        else if (field.hasAttribute('minlength')) {
            const minLength = parseInt(field.getAttribute('minlength'));
            if (value && value.length < minLength) {
                isValid = false;
                errorMessage = `Mindestens ${minLength} Zeichen erforderlich.`;
            }
        }

        if (!isValid) {
            this.showFieldError(field, errorMessage);
        }

        return isValid;
    },

    /**
     * Validate entire form
     */
    validateForm(form) {
        const fields = form.querySelectorAll('input, textarea, select');
        let isValid = true;

        fields.forEach(field => {
            if (!this.validateField(field)) {
                isValid = false;
            }
        });

        return isValid;
    },

    /**
     * Show field error
     */
    showFieldError(field, message) {
        DOM.addClass(field, 'error');
        
        // Remove existing error message
        const existingError = field.parentNode.querySelector('.field-error');
        if (existingError) {
            DOM.remove(existingError);
        }

        // Add new error message
        const errorElement = DOM.createElement('div', {
            className: 'field-error',
            textContent: message
        });

        DOM.setStyles(errorElement, {
            color: '#e74c3c',
            fontSize: '0.875rem',
            marginTop: '0.5rem'
        });

        field.parentNode.appendChild(errorElement);
    },

    /**
     * Clear field error
     */
    clearFieldError(field) {
        DOM.removeClass(field, 'error');
        
        const errorElement = field.parentNode.querySelector('.field-error');
        if (errorElement) {
            DOM.remove(errorElement);
        }
    },

    /**
     * AJAX form submission
     */
    setupFormSubmission() {
        const ajaxForms = Utils.querySelectorAll('form[data-ajax]');
        
        ajaxForms.forEach(form => {
            Utils.addEventListener(form, 'submit', async (e) => {
                e.preventDefault();
                
                if (!this.validateForm(form)) {
                    return;
                }

                const submitButton = form.querySelector('button[type="submit"], input[type="submit"]');
                const originalText = submitButton ? submitButton.textContent : '';

                try {
                    // Show loading state
                    if (submitButton) {
                        submitButton.textContent = 'Wird gesendet...';
                        submitButton.disabled = true;
                        DOM.addClass(submitButton, 'loading');
                    }

                    // Submit form
                    const response = await API.submitForm(form);
                    
                    // Handle success
                    if (response.success !== false) {
                        API.showNotification('Nachricht erfolgreich gesendet!', 'success');
                        form.reset();
                        
                        // Redirect if specified
                        if (response.redirect) {
                            setTimeout(() => {
                                window.location.href = response.redirect;
                            }, 2000);
                        }
                    } else {
                        throw new Error(response.message || 'Fehler beim Senden der Nachricht');
                    }

                } catch (error) {
                    API.handleError(error);
                } finally {
                    // Reset button state
                    if (submitButton) {
                        submitButton.textContent = originalText;
                        submitButton.disabled = false;
                        DOM.removeClass(submitButton, 'loading');
                    }
                }
            });
        });
    },

    /**
     * Input effects and enhancements
     */
    setupInputEffects() {
        const inputs = Utils.querySelectorAll('input, textarea');
        
        inputs.forEach(input => {
            // Floating label effect
            if (input.parentNode.classList.contains('floating-label')) {
                this.setupFloatingLabel(input);
            }

            // Auto-resize textarea
            if (input.tagName === 'TEXTAREA') {
                this.setupAutoResize(input);
            }

            // Number formatting
            if (input.hasAttribute('data-format-number')) {
                this.setupNumberFormatting(input);
            }
        });
    },

    /**
     * Floating label effect
     */
    setupFloatingLabel(input) {
        const checkValue = () => {
            if (input.value.trim() !== '' || input === document.activeElement) {
                DOM.addClass(input.parentNode, 'focused');
            } else {
                DOM.removeClass(input.parentNode, 'focused');
            }
        };

        Utils.addEventListener(input, 'focus', checkValue);
        Utils.addEventListener(input, 'blur', checkValue);
        Utils.addEventListener(input, 'input', checkValue);
        
        // Check initial value
        checkValue();
    },

    /**
     * Auto-resize textarea
     */
    setupAutoResize(textarea) {
        const resize = () => {
            textarea.style.height = 'auto';
            textarea.style.height = textarea.scrollHeight + 'px';
        };

        Utils.addEventListener(textarea, 'input', resize);
        Utils.addEventListener(textarea, 'focus', resize);
        
        // Initial resize
        resize();
    },

    /**
     * Number formatting
     */
    setupNumberFormatting(input) {
        Utils.addEventListener(input, 'input', () => {
            const value = input.value.replace(/[^\d]/g, '');
            if (value) {
                input.value = Utils.formatNumber(parseInt(value));
            }
        });
    }
};

// Initialize on DOM ready
document.addEventListener('DOMContentLoaded', () => {
    Forms.init();
});