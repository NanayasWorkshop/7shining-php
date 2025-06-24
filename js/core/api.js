// API and AJAX Helpers
const API = {
    /**
     * Default configuration
     */
    config: {
        baseURL: '',
        timeout: 10000,
        headers: {
            'Content-Type': 'application/json',
            'X-Requested-With': 'XMLHttpRequest'
        }
    },

    /**
     * Set CSRF token
     */
    setCsrfToken(token) {
        this.config.headers['X-CSRF-TOKEN'] = token;
    },

    /**
     * Get CSRF token from meta tag
     */
    getCsrfToken() {
        const tokenMeta = document.querySelector('meta[name="csrf-token"]');
        return tokenMeta ? tokenMeta.getAttribute('content') : null;
    },

    /**
     * Make HTTP request
     */
    async request(url, options = {}) {
        const config = {
            method: 'GET',
            headers: { ...this.config.headers },
            ...options
        };

        // Add CSRF token for non-GET requests
        if (config.method !== 'GET') {
            const csrfToken = this.getCsrfToken();
            if (csrfToken) {
                config.headers['X-CSRF-TOKEN'] = csrfToken;
            }
        }

        try {
            const controller = new AbortController();
            const timeoutId = setTimeout(() => controller.abort(), this.config.timeout);

            const response = await fetch(this.config.baseURL + url, {
                ...config,
                signal: controller.signal
            });

            clearTimeout(timeoutId);

            if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`);
            }

            const contentType = response.headers.get('content-type');
            if (contentType && contentType.includes('application/json')) {
                return await response.json();
            } else {
                return await response.text();
            }
        } catch (error) {
            if (error.name === 'AbortError') {
                throw new Error('Request timeout');
            }
            throw error;
        }
    },

    /**
     * GET request
     */
    async get(url, params = {}) {
        const queryString = new URLSearchParams(params).toString();
        const fullUrl = queryString ? `${url}?${queryString}` : url;
        
        return this.request(fullUrl, { method: 'GET' });
    },

    /**
     * POST request
     */
    async post(url, data = {}) {
        return this.request(url, {
            method: 'POST',
            body: JSON.stringify(data)
        });
    },

    /**
     * PUT request
     */
    async put(url, data = {}) {
        return this.request(url, {
            method: 'PUT',
            body: JSON.stringify(data)
        });
    },

    /**
     * DELETE request
     */
    async delete(url) {
        return this.request(url, { method: 'DELETE' });
    },

    /**
     * Submit form via AJAX
     */
    async submitForm(form) {
        if (!form) throw new Error('Form element required');

        const formData = new FormData(form);
        const url = form.action || window.location.href;
        const method = form.method || 'POST';

        return this.request(url, {
            method: method.toUpperCase(),
            body: formData,
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
                // Don't set Content-Type for FormData
            }
        });
    },

    /**
     * Upload file
     */
    async uploadFile(url, file, progressCallback = null) {
        return new Promise((resolve, reject) => {
            const xhr = new XMLHttpRequest();
            const formData = new FormData();
            
            formData.append('file', file);

            // Add CSRF token
            const csrfToken = this.getCsrfToken();
            if (csrfToken) {
                formData.append('_token', csrfToken);
            }

            xhr.upload.addEventListener('progress', (e) => {
                if (progressCallback && e.lengthComputable) {
                    const percentComplete = (e.loaded / e.total) * 100;
                    progressCallback(percentComplete);
                }
            });

            xhr.addEventListener('load', () => {
                if (xhr.status >= 200 && xhr.status < 300) {
                    try {
                        const response = JSON.parse(xhr.responseText);
                        resolve(response);
                    } catch (error) {
                        resolve(xhr.responseText);
                    }
                } else {
                    reject(new Error(`Upload failed: ${xhr.status}`));
                }
            });

            xhr.addEventListener('error', () => {
                reject(new Error('Upload failed'));
            });

            xhr.open('POST', this.config.baseURL + url);
            xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
            xhr.send(formData);
        });
    },

    /**
     * Handle API errors
     */
    handleError(error) {
        console.error('API Error:', error);
        
        // Show user-friendly message
        const message = error.message || 'Ein Fehler ist aufgetreten. Bitte versuchen Sie es später erneut.';
        this.showNotification(message, 'error');
    },

    /**
     * Show notification
     */
    showNotification(message, type = 'info') {
        // Create notification element
        const notification = DOM.createElement('div', {
            className: `notification notification-${type}`,
            innerHTML: `
                <span>${message}</span>
                <button class="notification-close">&times;</button>
            `
        });

        // Style the notification
        DOM.setStyles(notification, {
            position: 'fixed',
            top: '20px',
            right: '20px',
            padding: '1rem 1.5rem',
            borderRadius: '8px',
            color: 'white',
            fontSize: '0.9rem',
            zIndex: '9999',
            maxWidth: '400px',
            display: 'flex',
            alignItems: 'center',
            justifyContent: 'space-between',
            gap: '1rem'
        });

        // Set background color based on type
        const colors = {
            success: '#16a085',
            error: '#e74c3c',
            warning: '#f39c12',
            info: '#3498db'
        };
        notification.style.backgroundColor = colors[type] || colors.info;

        // Add to page
        document.body.appendChild(notification);

        // Close button functionality
        const closeBtn = notification.querySelector('.notification-close');
        closeBtn.addEventListener('click', () => {
            DOM.fadeOut(notification, 300);
            setTimeout(() => DOM.remove(notification), 300);
        });

        // Auto remove after 5 seconds
        setTimeout(() => {
            if (document.body.contains(notification)) {
                DOM.fadeOut(notification, 300);
                setTimeout(() => DOM.remove(notification), 300);
            }
        }, 5000);

        // Fade in
        DOM.fadeIn(notification, 300);
    }
};

// Initialize CSRF token on page load
document.addEventListener('DOMContentLoaded', () => {
    const csrfToken = API.getCsrfToken();
    if (csrfToken) {
        API.setCsrfToken(csrfToken);
    }
});

// Export for module use
if (typeof module !== 'undefined' && module.exports) {
    module.exports = API;
}