// DOM Manipulation Helpers
const DOM = {
    /**
     * Create element with attributes and content
     */
    createElement(tag, attributes = {}, content = '') {
        const element = document.createElement(tag);
        
        Object.entries(attributes).forEach(([key, value]) => {
            if (key === 'className') {
                element.className = value;
            } else if (key === 'innerHTML') {
                element.innerHTML = value;
            } else if (key === 'textContent') {
                element.textContent = value;
            } else {
                element.setAttribute(key, value);
            }
        });
        
        if (content) {
            if (typeof content === 'string') {
                element.innerHTML = content;
            } else if (content instanceof Node) {
                element.appendChild(content);
            }
        }
        
        return element;
    },

    /**
     * Show element
     */
    show(element, display = 'block') {
        if (!element) return;
        element.style.display = display;
        element.style.opacity = '1';
    },

    /**
     * Hide element
     */
    hide(element) {
        if (!element) return;
        element.style.display = 'none';
        element.style.opacity = '0';
    },

    /**
     * Toggle element visibility
     */
    toggle(element, display = 'block') {
        if (!element) return;
        
        if (element.style.display === 'none' || !element.style.display) {
            this.show(element, display);
        } else {
            this.hide(element);
        }
    },

    /**
     * Add class to element
     */
    addClass(element, className) {
        if (!element || !className) return;
        element.classList.add(className);
    },

    /**
     * Remove class from element
     */
    removeClass(element, className) {
        if (!element || !className) return;
        element.classList.remove(className);
    },

    /**
     * Toggle class on element
     */
    toggleClass(element, className) {
        if (!element || !className) return;
        element.classList.toggle(className);
    },

    /**
     * Check if element has class
     */
    hasClass(element, className) {
        if (!element || !className) return false;
        return element.classList.contains(className);
    },

    /**
     * Get element position
     */
    getPosition(element) {
        if (!element) return { top: 0, left: 0 };
        
        const rect = element.getBoundingClientRect();
        return {
            top: rect.top + window.pageYOffset,
            left: rect.left + window.pageXOffset,
            width: rect.width,
            height: rect.height
        };
    },

    /**
     * Set CSS styles on element
     */
    setStyles(element, styles) {
        if (!element || !styles) return;
        
        Object.entries(styles).forEach(([property, value]) => {
            element.style[property] = value;
        });
    },

    /**
     * Get computed style
     */
    getStyle(element, property) {
        if (!element) return null;
        return window.getComputedStyle(element)[property];
    },

    /**
     * Insert element after another element
     */
    insertAfter(newElement, targetElement) {
        if (!newElement || !targetElement) return;
        targetElement.parentNode.insertBefore(newElement, targetElement.nextSibling);
    },

    /**
     * Insert element before another element
     */
    insertBefore(newElement, targetElement) {
        if (!newElement || !targetElement) return;
        targetElement.parentNode.insertBefore(newElement, targetElement);
    },

    /**
     * Remove element from DOM
     */
    remove(element) {
        if (!element || !element.parentNode) return;
        element.parentNode.removeChild(element);
    },

    /**
     * Clear element content
     */
    empty(element) {
        if (!element) return;
        while (element.firstChild) {
            element.removeChild(element.firstChild);
        }
    },

    /**
     * Get siblings of element
     */
    getSiblings(element) {
        if (!element || !element.parentNode) return [];
        
        return Array.from(element.parentNode.children).filter(child => child !== element);
    },

    /**
     * Get next sibling element
     */
    getNextSibling(element) {
        if (!element) return null;
        
        let sibling = element.nextElementSibling;
        while (sibling && sibling.nodeType !== 1) {
            sibling = sibling.nextElementSibling;
        }
        return sibling;
    },

    /**
     * Get previous sibling element
     */
    getPrevSibling(element) {
        if (!element) return null;
        
        let sibling = element.previousElementSibling;
        while (sibling && sibling.nodeType !== 1) {
            sibling = sibling.previousElementSibling;
        }
        return sibling;
    },

    /**
     * Check if element is visible
     */
    isVisible(element) {
        if (!element) return false;
        
        return !!(element.offsetWidth || element.offsetHeight || element.getClientRects().length);
    },

    /**
     * Fade in element
     */
    fadeIn(element, duration = 300) {
        if (!element) return;
        
        element.style.opacity = '0';
        element.style.display = 'block';
        
        const start = performance.now();
        
        const fade = (timestamp) => {
            const elapsed = timestamp - start;
            const progress = elapsed / duration;
            
            if (progress < 1) {
                element.style.opacity = progress;
                requestAnimationFrame(fade);
            } else {
                element.style.opacity = '1';
            }
        };
        
        requestAnimationFrame(fade);
    },

    /**
     * Fade out element
     */
    fadeOut(element, duration = 300) {
        if (!element) return;
        
        const start = performance.now();
        const startOpacity = parseFloat(element.style.opacity) || 1;
        
        const fade = (timestamp) => {
            const elapsed = timestamp - start;
            const progress = elapsed / duration;
            
            if (progress < 1) {
                element.style.opacity = startOpacity * (1 - progress);
                requestAnimationFrame(fade);
            } else {
                element.style.opacity = '0';
                element.style.display = 'none';
            }
        };
        
        requestAnimationFrame(fade);
    }
};

// Export for module use
if (typeof module !== 'undefined' && module.exports) {
    module.exports = DOM;
}