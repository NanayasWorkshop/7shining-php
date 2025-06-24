// Utility Functions
const Utils = {
    /**
     * Debounce function calls
     */
    debounce(func, wait, immediate) {
        let timeout;
        return function executedFunction(...args) {
            const later = () => {
                timeout = null;
                if (!immediate) func(...args);
            };
            const callNow = immediate && !timeout;
            clearTimeout(timeout);
            timeout = setTimeout(later, wait);
            if (callNow) func(...args);
        };
    },

    /**
     * Throttle function calls
     */
    throttle(func, limit) {
        let inThrottle;
        return function(...args) {
            if (!inThrottle) {
                func.apply(this, args);
                inThrottle = true;
                setTimeout(() => inThrottle = false, limit);
            }
        };
    },

    /**
     * Get element by ID safely
     */
    getElementById(id) {
        const element = document.getElementById(id);
        if (!element) {
            console.warn(`Element with ID '${id}' not found`);
        }
        return element;
    },

    /**
     * Get elements by selector safely
     */
    querySelectorAll(selector) {
        const elements = document.querySelectorAll(selector);
        if (elements.length === 0) {
            console.warn(`No elements found for selector '${selector}'`);
        }
        return elements;
    },

    /**
     * Add event listener with error handling
     */
    addEventListener(element, event, handler, options = {}) {
        if (!element) {
            console.warn('Cannot add event listener: element is null');
            return;
        }
        
        try {
            element.addEventListener(event, handler, options);
        } catch (error) {
            console.error('Error adding event listener:', error);
        }
    },

    /**
     * Remove event listener safely
     */
    removeEventListener(element, event, handler, options = {}) {
        if (!element) return;
        
        try {
            element.removeEventListener(event, handler, options);
        } catch (error) {
            console.error('Error removing event listener:', error);
        }
    },

    /**
     * Check if element is in viewport
     */
    isInViewport(element) {
        if (!element) return false;
        
        const rect = element.getBoundingClientRect();
        return (
            rect.top >= 0 &&
            rect.left >= 0 &&
            rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
            rect.right <= (window.innerWidth || document.documentElement.clientWidth)
        );
    },

    /**
     * Smooth scroll to element
     */
    scrollToElement(element, offset = 80) {
        if (!element) return;
        
        const elementPosition = element.offsetTop;
        const offsetPosition = elementPosition - offset;

        window.scrollTo({
            top: offsetPosition,
            behavior: 'smooth'
        });
    },

    /**
     * Format number with separators
     */
    formatNumber(num) {
        return new Intl.NumberFormat('de-DE').format(num);
    },

    /**
     * Format currency
     */
    formatCurrency(amount, currency = 'CHF') {
        return new Intl.NumberFormat('de-CH', {
            style: 'currency',
            currency: currency
        }).format(amount);
    },

    /**
     * Generate random ID
     */
    generateId(prefix = 'id') {
        return `${prefix}-${Math.random().toString(36).substr(2, 9)}`;
    },

    /**
     * Copy text to clipboard
     */
    async copyToClipboard(text) {
        try {
            if (navigator.clipboard && window.isSecureContext) {
                await navigator.clipboard.writeText(text);
                return true;
            } else {
                // Fallback for older browsers
                const textArea = document.createElement('textarea');
                textArea.value = text;
                textArea.style.position = 'fixed';
                textArea.style.left = '-999999px';
                textArea.style.top = '-999999px';
                document.body.appendChild(textArea);
                textArea.focus();
                textArea.select();
                document.execCommand('copy');
                textArea.remove();
                return true;
            }
        } catch (error) {
            console.error('Failed to copy text:', error);
            return false;
        }
    },

    /**
     * Validate email format
     */
    isValidEmail(email) {
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailRegex.test(email);
    },

    /**
     * Get browser info
     */
    getBrowserInfo() {
        const ua = navigator.userAgent;
        let browser = 'Unknown';
        
        if (ua.includes('Chrome')) browser = 'Chrome';
        else if (ua.includes('Firefox')) browser = 'Firefox';
        else if (ua.includes('Safari')) browser = 'Safari';
        else if (ua.includes('Edge')) browser = 'Edge';
        else if (ua.includes('Opera')) browser = 'Opera';
        
        return {
            browser,
            userAgent: ua,
            language: navigator.language,
            platform: navigator.platform
        };
    },

    /**
     * Local storage helpers
     */
    storage: {
        set(key, value) {
            try {
                localStorage.setItem(key, JSON.stringify(value));
                return true;
            } catch (error) {
                console.error('Error saving to localStorage:', error);
                return false;
            }
        },

        get(key, defaultValue = null) {
            try {
                const item = localStorage.getItem(key);
                return item ? JSON.parse(item) : defaultValue;
            } catch (error) {
                console.error('Error reading from localStorage:', error);
                return defaultValue;
            }
        },

        remove(key) {
            try {
                localStorage.removeItem(key);
                return true;
            } catch (error) {
                console.error('Error removing from localStorage:', error);
                return false;
            }
        }
    }
};

// Export for module use
if (typeof module !== 'undefined' && module.exports) {
    module.exports = Utils;
}