/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    './**/*.php',
    './assets/**/*.js',
  ],
  theme: {
    colors: {
      // Brand Colors - ENFORCE ONLY THESE COLORS
      white: '#FFFFFF',
      brand: {
        primary: '#442A76',    // Deep Purple
        secondary: '#44AF57',  // Fresh Green
        light: '#FFFFFF',      // White
      },
      // Grayscale alternatives (if needed)
      transparent: 'transparent',
      current: 'currentColor',
    },
    extend: {
      fontFamily: {
        sans: ['Poppins', 'system-ui', 'sans-serif'],
      },
      spacing: {
        'safe': '1rem',
      },
    },
  },
  plugins: [],
}
