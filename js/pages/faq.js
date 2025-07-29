// FAQ Page JavaScript
const FAQ = {
    init() {
        this.setupAccordion();
        this.setupSearch();
        this.setupCategoryFilter();
        this.setupKeyboardNavigation();
    },

    /**
     * FAQ Accordion functionality
     */
    setupAccordion() {
        const faqItems = Utils.querySelectorAll('.faq-item');
        
        faqItems.forEach(item => {
            const question = item.querySelector('.faq-question');
            const answer = item.querySelector('.faq-answer');
            
            if (!question || !answer) return;

            // Make question clickable
            Utils.addEventListener(question, 'click', () => {
                this.toggleFAQ(item);
            });

            // Set initial ARIA attributes
            const questionId = Utils.generateId('faq-question');
            const answerId = Utils.generateId('faq-answer');
            
            question.setAttribute('id', questionId);
            question.setAttribute('aria-expanded', 'false');
            question.setAttribute('aria-controls', answerId);
            question.setAttribute('tabindex', '0');
            question.setAttribute('role', 'button');
            
            answer.setAttribute('id', answerId);
            answer.setAttribute('aria-labelledby', questionId);
        });
    },

    /**
     * Toggle FAQ item
     */
    toggleFAQ(item) {
        const question = item.querySelector('.faq-question');
        const answer = item.querySelector('.faq-answer');
        const toggleIcon = item.querySelector('.toggle-icon');
        const isActive = DOM.hasClass(item, 'active');
        
        // Close all other FAQ items
        const allItems = Utils.querySelectorAll('.faq-item');
        allItems.forEach(otherItem => {
            if (otherItem !== item) {
                this.closeFAQ(otherItem);
            }
        });
        
        // Toggle current item
        if (isActive) {
            this.closeFAQ(item);
        } else {
            this.openFAQ(item);
        }
    },

    /**
     * Open FAQ item
     */
    openFAQ(item) {
        const question = item.querySelector('.faq-question');
        const answer = item.querySelector('.faq-answer');
        const toggleIcon = item.querySelector('.toggle-icon');
        
        DOM.addClass(item, 'active');
        
        if (question) {
            question.setAttribute('aria-expanded', 'true');
        }
        
        if (toggleIcon) {
            toggleIcon.textContent = '−';
        }
        
        // Animate opening
        if (answer) {
            answer.style.maxHeight = answer.scrollHeight + 'px';
        }
    },

    /**
     * Close FAQ item
     */
    closeFAQ(item) {
        const question = item.querySelector('.faq-question');
        const answer = item.querySelector('.faq-answer');
        const toggleIcon = item.querySelector('.toggle-icon');
        
        DOM.removeClass(item, 'active');
        
        if (question) {
            question.setAttribute('aria-expanded', 'false');
        }
        
        if (toggleIcon) {
            toggleIcon.textContent = '+';
        }
        
        // Animate closing
        if (answer) {
            answer.style.maxHeight = '0';
        }
    },

    /**
     * Search functionality
     */
    setupSearch() {
        const searchInput = Utils.getElementById('faq-search');
        const noResults = Utils.getElementById('no-results');
        
        if (!searchInput) return;

        // Debounced search
        const debouncedSearch = Utils.debounce((searchTerm) => {
            this.performSearch(searchTerm, noResults);
        }, 300);

        Utils.addEventListener(searchInput, 'input', (e) => {
            const searchTerm = e.target.value.toLowerCase().trim();
            debouncedSearch(searchTerm);
        });

        // Clear search with Escape key
        Utils.addEventListener(searchInput, 'keydown', (e) => {
            if (e.key === 'Escape') {
                e.target.value = '';
                this.performSearch('', noResults);
                e.target.blur();
            }
        });
    },

    /**
     * Perform search
     */
    performSearch(searchTerm, noResults) {
        const faqItems = Utils.querySelectorAll('.faq-item');
        let visibleCount = 0;

        faqItems.forEach(item => {
            const question = item.querySelector('.faq-question h3');
            const answer = item.querySelector('.faq-answer');
            
            if (!question || !answer) return;

            const questionText = question.textContent.toLowerCase();
            const answerText = answer.textContent.toLowerCase();
            
            // Check if search term matches
            const matches = searchTerm === '' || 
                           questionText.includes(searchTerm) || 
                           answerText.includes(searchTerm);

            if (matches) {
                DOM.removeClass(item, 'hidden');
                DOM.show(item);
                visibleCount++;
                
                // Highlight search term
                if (searchTerm !== '') {
                    this.highlightSearchTerm(item, searchTerm);
                } else {
                    this.removeHighlight(item);
                }
            } else {
                DOM.addClass(item, 'hidden');
                DOM.hide(item);
                this.closeFAQ(item); // Close if hidden
            }
        });

        // Show/hide no results message
        if (noResults) {
            if (visibleCount === 0 && searchTerm !== '') {
                DOM.show(noResults);
            } else {
                DOM.hide(noResults);
            }
        }

        // Reset category filter when searching
        if (searchTerm !== '') {
            const categoryButtons = Utils.querySelectorAll('.tab-button');
            categoryButtons.forEach(btn => DOM.removeClass(btn, 'active'));
            const allButton = document.querySelector('.tab-button[data-category="all"]');
            if (allButton) DOM.addClass(allButton, 'active');
        }
    },

    /**
     * Highlight search terms
     */
    highlightSearchTerm(item, searchTerm) {
        const question = item.querySelector('.faq-question h3');
        const answer = item.querySelector('.faq-answer');
        
        if (!question || !answer) return;

        // Store original text if not already stored
        if (!question.dataset.originalText) {
            question.dataset.originalText = question.textContent;
        }
        if (!answer.dataset.originalText) {
            answer.dataset.originalText = answer.innerHTML;
        }
        
        // Apply highlighting
        const regex = new RegExp(`(${this.escapeRegex(searchTerm)})`, 'gi');
        const highlightClass = 'search-highlight';
        
        question.innerHTML = question.dataset.originalText.replace(regex, `<mark class="${highlightClass}">$1</mark>`);
        answer.innerHTML = answer.dataset.originalText.replace(regex, `<mark class="${highlightClass}">$1</mark>`);
    },

    /**
     * Remove search highlighting
     */
    removeHighlight(item) {
        const question = item.querySelector('.faq-question h3');
        const answer = item.querySelector('.faq-answer');
        
        if (question && question.dataset.originalText) {
            question.innerHTML = question.dataset.originalText;
        }
        if (answer && answer.dataset.originalText) {
            answer.innerHTML = answer.dataset.originalText;
        }
    },

    /**
     * Escape regex special characters
     */
    escapeRegex(string) {
        return string.replace(/[.*+?^${}()|[\]\\]/g, '\\$&');
    },

    /**
     * Category filtering
     */
    setupCategoryFilter() {
        const filterButtons = Utils.querySelectorAll('.tab-button');
        
        filterButtons.forEach(button => {
            Utils.addEventListener(button, 'click', () => {
                const category = button.getAttribute('data-category');
                
                // Update active button
                filterButtons.forEach(btn => DOM.removeClass(btn, 'active'));
                DOM.addClass(button, 'active');
                
                // Filter FAQ items
                this.filterByCategory(category);
            });
        });
    },

    /**
     * Filter FAQs by category
     */
    filterByCategory(category) {
        const faqItems = Utils.querySelectorAll('.faq-item');
        let visibleCount = 0;
        
        faqItems.forEach(item => {
            const itemCategory = item.getAttribute('data-category');
            
            if (category === 'all' || itemCategory === category) {
                DOM.removeClass(item, 'hidden');
                DOM.show(item);
                visibleCount++;
            } else {
                DOM.addClass(item, 'hidden');
                DOM.hide(item);
                this.closeFAQ(item); // Close if hidden
            }
        });

        // Clear search when filtering
        const searchInput = Utils.getElementById('faq-search');
        if (searchInput) {
            searchInput.value = '';
            // Remove any search highlighting
            faqItems.forEach(item => this.removeHighlight(item));
        }
    },

    /**
     * Keyboard navigation
     */
    setupKeyboardNavigation() {
        const faqQuestions = Utils.querySelectorAll('.faq-question');
        
        faqQuestions.forEach(question => {
            Utils.addEventListener(question, 'keydown', (e) => {
                if (e.key === 'Enter' || e.key === ' ') {
                    e.preventDefault();
                    question.click();
                } else if (e.key === 'ArrowDown') {
                    e.preventDefault();
                    this.focusNextQuestion(question);
                } else if (e.key === 'ArrowUp') {
                    e.preventDefault();
                    this.focusPrevQuestion(question);
                }
            });
        });

        // Global keyboard shortcuts
        Utils.addEventListener(document, 'keydown', (e) => {
            if (e.key === 'Escape') {
                // Close all open FAQs
                const faqItems = Utils.querySelectorAll('.faq-item');
                faqItems.forEach(item => this.closeFAQ(item));
                
                // Clear search
                const searchInput = Utils.getElementById('faq-search');
                if (searchInput && searchInput.value) {
                    searchInput.value = '';
                    this.performSearch('');
                }
            }
        });
    },

    /**
     * Focus next FAQ question
     */
    focusNextQuestion(currentQuestion) {
        const allQuestions = Utils.querySelectorAll('.faq-question:not(.hidden)');
        const currentIndex = Array.from(allQuestions).indexOf(currentQuestion);
        const nextIndex = (currentIndex + 1) % allQuestions.length;
        allQuestions[nextIndex].focus();
    },

    /**
     * Focus previous FAQ question
     */
    focusPrevQuestion(currentQuestion) {
        const allQuestions = Utils.querySelectorAll('.faq-question:not(.hidden)');
        const currentIndex = Array.from(allQuestions).indexOf(currentQuestion);
        const prevIndex = currentIndex === 0 ? allQuestions.length - 1 : currentIndex - 1;
        allQuestions[prevIndex].focus();
    }
};

// Add CSS for search highlighting
const faqCSS = `
.search-highlight {
    background: #007aff;
    color: white;
    padding: 2px 4px;
    border-radius: 3px;
    font-weight: 600;
}

.faq-answer {
    overflow: hidden;
    transition: max-height 0.3s ease;
}
`;

// Inject CSS
const faqStyle = document.createElement('style');
faqStyle.textContent = faqCSS;
document.head.appendChild(faqStyle);

// Initialize on DOM ready (only on FAQ page)
document.addEventListener('DOMContentLoaded', () => {
    if (document.querySelector('.faq-content')) {
        FAQ.init();
    }
});