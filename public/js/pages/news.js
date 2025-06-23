// News Page JavaScript
const News = {
    currentCategory: 'all',
    currentlyShown: 6,
    articlesPerPage: 6,

    init() {
        this.setupCategoryFilter();
        this.setupLoadMore();
        this.setupNewsletterForm();
        this.setupShareFunctionality();
        this.setupReadingProgress();
    },

    /**
     * Category filtering
     */
    setupCategoryFilter() {
        const filterButtons = Utils.querySelectorAll('.filter-btn');
        const articles = Utils.querySelectorAll('.article-card');
        const featuredArticle = document.querySelector('.featured-card');
        
        filterButtons.forEach(button => {
            Utils.addEventListener(button, 'click', () => {
                const category = button.getAttribute('data-category');
                
                // Update active button
                filterButtons.forEach(btn => DOM.removeClass(btn, 'active'));
                DOM.addClass(button, 'active');
                
                // Filter articles
                this.filterArticles(category, articles, featuredArticle);
                this.currentCategory = category;
                
                // Reset pagination
                this.currentlyShown = this.articlesPerPage;
                this.updateLoadMoreButton();
            });
        });
    },

    /**
     * Filter articles by category
     */
    filterArticles(category, articles, featuredArticle) {
        let visibleCount = 0;
        
        // Handle featured article
        if (featuredArticle) {
            const featuredCategory = featuredArticle.getAttribute('data-category');
            if (category === 'all' || featuredCategory === category) {
                DOM.show(featuredArticle, 'block');
            } else {
                DOM.hide(featuredArticle);
            }
        }
        
        // Handle regular articles
        articles.forEach((article, index) => {
            const articleCategory = article.getAttribute('data-category');
            
            if (category === 'all' || articleCategory === category) {
                if (visibleCount < this.currentlyShown) {
                    DOM.removeClass(article, 'hidden');
                    DOM.show(article, 'block');
                } else {
                    DOM.hide(article);
                }
                visibleCount++;
            } else {
                DOM.addClass(article, 'hidden');
                DOM.hide(article);
            }
        });

        this.updateLoadMoreButton();
    },

    /**
     * Load more functionality
     */
    setupLoadMore() {
        const loadMoreBtn = document.querySelector('.load-more-btn');
        
        if (!loadMoreBtn) return;

        Utils.addEventListener(loadMoreBtn, 'click', () => {
            this.currentlyShown += this.articlesPerPage;
            this.filterArticles(this.currentCategory, Utils.querySelectorAll('.article-card'), document.querySelector('.featured-card'));
            
            // Add loading state
            const originalText = loadMoreBtn.textContent;
            loadMoreBtn.textContent = 'Wird geladen...';
            loadMoreBtn.disabled = true;
            
            setTimeout(() => {
                loadMoreBtn.textContent = originalText;
                loadMoreBtn.disabled = false;
            }, 500);
        });
    },

    /**
     * Update load more button visibility
     */
    updateLoadMoreButton() {
        const loadMoreBtn = document.querySelector('.load-more-btn');
        if (!loadMoreBtn) return;
        
        const articles = Utils.querySelectorAll('.article-card');
        const totalFilteredArticles = Array.from(articles).filter(article => {
            const articleCategory = article.getAttribute('data-category');
            return this.currentCategory === 'all' || articleCategory === this.currentCategory;
        }).length;
        
        if (this.currentlyShown >= totalFilteredArticles) {
            DOM.hide(loadMoreBtn);
        } else {
            DOM.show(loadMoreBtn, 'block');
        }
    },

    /**
     * Newsletter form handling
     */
    setupNewsletterForm() {
        const newsletterForm = Utils.getElementById('newsletter-form');
        
        if (!newsletterForm) return;

        Utils.addEventListener(newsletterForm, 'submit', async (e) => {
            e.preventDefault();
            
            const emailInput = Utils.getElementById('newsletter-email');
            const email = emailInput.value.trim();
            const submitButton = newsletterForm.querySelector('.cta-button');
            
            // Basic email validation
            if (!Utils.isValidEmail(email)) {
                this.showNotification('Bitte geben Sie eine gültige E-Mail-Adresse ein.', 'error');
                return;
            }
            
            // Show loading state
            const originalText = submitButton.textContent;
            submitButton.textContent = 'Wird verarbeitet...';
            submitButton.disabled = true;
            
            try {
                // Simulate API call (replace with actual endpoint)
                await new Promise(resolve => setTimeout(resolve, 2000));
                
                this.showNotification('Vielen Dank! Sie haben sich erfolgreich für unseren Newsletter angemeldet.', 'success');
                emailInput.value = '';
                
            } catch (error) {
                this.showNotification('Ein Fehler ist aufgetreten. Bitte versuchen Sie es später erneut.', 'error');
            } finally {
                submitButton.textContent = originalText;
                submitButton.disabled = false;
            }
        });
    },

    /**
     * Share functionality
     */
    setupShareFunctionality() {
        const articles = Utils.querySelectorAll('.article-card, .featured-card');
        
        articles.forEach(article => {
            const title = article.querySelector('h2, h3')?.textContent || 'Interessanter Artikel von 7Shining';
            
            // Add share button on double click
            Utils.addEventListener(article, 'dblclick', async () => {
                if (navigator.share) {
                    try {
                        await navigator.share({
                            title: '7Shining News: ' + title,
                            text: 'Interessanter Artikel von 7Shining',
                            url: window.location.href
                        });
                    } catch (error) {
                        // User cancelled or error occurred
                        console.log('Share cancelled');
                    }
                } else {
                    // Fallback - copy to clipboard
                    const success = await Utils.copyToClipboard(window.location.href);
                    if (success) {
                        this.showTemporaryNotification('Link kopiert!');
                    }
                }
            });

            // Add visual feedback for shareable articles
            Utils.addEventListener(article, 'mouseenter', () => {
                if (!article.querySelector('.share-hint')) {
                    const hint = DOM.createElement('div', {
                        className: 'share-hint',
                        textContent: 'Doppelklick zum Teilen'
                    });
                    
                    DOM.setStyles(hint, {
                        position: 'absolute',
                        top: '10px',
                        right: '10px',
                        background: 'rgba(0, 0, 0, 0.8)',
                        color: 'white',
                        padding: '0.25rem 0.5rem',
                        borderRadius: '4px',
                        fontSize: '0.75rem',
                        opacity: '0',
                        transition: 'opacity 0.3s ease',
                        pointerEvents: 'none',
                        zIndex: '10'
                    });
                    
                    article.style.position = 'relative';
                    article.appendChild(hint);
                    
                    setTimeout(() => {
                        hint.style.opacity = '1';
                    }, 200);
                }
            });

            Utils.addEventListener(article, 'mouseleave', () => {
                const hint = article.querySelector('.share-hint');
                if (hint) {
                    DOM.fadeOut(hint, 200);
                    setTimeout(() => DOM.remove(hint), 200);
                }
            });
        });
    },

    /**
     * Reading progress for articles
     */
    setupReadingProgress() {
        const articles = Utils.querySelectorAll('.article-card, .featured-card');
        
        articles.forEach(article => {
            Utils.addEventListener(article, 'mouseenter', () => {
                // Simulate reading time calculation
                const text = article.textContent || '';
                const wordsPerMinute = 200;
                const wordCount = text.split(/\s+/).length;
                const readingTime = Math.max(1, Math.ceil(wordCount / wordsPerMinute));
                
                const readingIndicator = DOM.createElement('div', {
                    className: 'reading-time',
                    innerHTML: `📖 ${readingTime} Min. Lesezeit`
                });
                
                DOM.setStyles(readingIndicator, {
                    position: 'absolute',
                    top: '1rem',
                    right: '1rem',
                    background: 'rgba(0, 122, 255, 0.9)',
                    color: 'white',
                    padding: '0.3rem 0.8rem',
                    borderRadius: '15px',
                    fontSize: '0.8rem',
                    fontWeight: '500',
                    zIndex: '10',
                    opacity: '0',
                    transition: 'opacity 0.3s ease'
                });
                
                // Make sure the article is positioned relatively
                article.style.position = 'relative';
                
                // Remove existing reading time if present
                const existing = article.querySelector('.reading-time');
                if (existing) DOM.remove(existing);
                
                article.appendChild(readingIndicator);
                
                // Fade in
                setTimeout(() => {
                    readingIndicator.style.opacity = '1';
                }, 100);
            });
            
            Utils.addEventListener(article, 'mouseleave', () => {
                const readingTime = article.querySelector('.reading-time');
                if (readingTime) {
                    DOM.fadeOut(readingTime, 200);
                    setTimeout(() => DOM.remove(readingTime), 200);
                }
            });
        });
    },

    /**
     * Show notification
     */
    showNotification(message, type = 'info') {
        API.showNotification(message, type);
    },

    /**
     * Show temporary notification
     */
    showTemporaryNotification(message) {
        const notification = DOM.createElement('div', {
            textContent: message,
            className: 'temp-notification'
        });
        
        DOM.setStyles(notification, {
            position: 'fixed',
            top: '50%',
            left: '50%',
            transform: 'translate(-50%, -50%)',
            background: '#007aff',
            color: 'white',
            padding: '1rem 2rem',
            borderRadius: '8px',
            zIndex: '9999',
            fontWeight: '600',
            fontSize: '1rem',
            boxShadow: '0 4px 12px rgba(0, 0, 0, 0.3)'
        });
        
        document.body.appendChild(notification);
        
        // Fade in
        DOM.fadeIn(notification, 300);
        
        // Remove after 2 seconds
        setTimeout(() => {
            DOM.fadeOut(notification, 300);
            setTimeout(() => DOM.remove(notification), 300);
        }, 2000);
    },

    /**
     * Smooth entrance animations
     */
    setupEntranceAnimations() {
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    DOM.addClass(entry.target, 'fade-in');
                }
            });
        }, { threshold: 0.1 });

        // Observe articles for animation
        const articles = Utils.querySelectorAll('.article-card');
        articles.forEach((article, index) => {
            DOM.setStyles(article, {
                opacity: '0',
                transform: 'translateY(30px)',
                transition: `opacity 0.6s ease ${index * 0.1}s, transform 0.6s ease ${index * 0.1}s`
            });
            observer.observe(article);
        });
    }
};

// Initialize on DOM ready (only on news page)
document.addEventListener('DOMContentLoaded', () => {
    if (document.querySelector('.news-grid')) {
        News.init();
        News.setupEntranceAnimations();
    }
});