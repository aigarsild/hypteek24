/**
 * Hypoteek Theme Main JavaScript
 */

document.addEventListener('DOMContentLoaded', function() {
    // Initialize theme functionality here
    console.log('Hypoteek Theme Loaded');
    
    // Mobile Menu Toggle
    const menuToggle = document.getElementById('menu-toggle');
    const mobileMenu = document.getElementById('mobile-menu');
    
    if (menuToggle && mobileMenu) {
        // Toggle menu visibility
        menuToggle.addEventListener('click', function() {
            const isHidden = mobileMenu.classList.contains('hidden');
            
            if (isHidden) {
                mobileMenu.classList.remove('hidden');
                mobileMenu.classList.add('flex');
                menuToggle.setAttribute('aria-expanded', 'true');
            } else {
                mobileMenu.classList.add('hidden');
                mobileMenu.classList.remove('flex');
                menuToggle.setAttribute('aria-expanded', 'false');
            }
        });
        
        // Close menu when a link is clicked
        const menuLinks = mobileMenu.querySelectorAll('a');
        menuLinks.forEach(link => {
            link.addEventListener('click', function() {
                mobileMenu.classList.add('hidden');
                mobileMenu.classList.remove('flex');
                menuToggle.setAttribute('aria-expanded', 'false');
            });
        });
        
        // Close menu when clicking outside
        document.addEventListener('click', function(event) {
            if (!event.target.closest('#site-navigation')) {
                mobileMenu.classList.add('hidden');
                mobileMenu.classList.remove('flex');
                menuToggle.setAttribute('aria-expanded', 'false');
            }
        });
    }
});
