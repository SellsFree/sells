module.exports = {
  purge: [
    './resources/**/*.blade.php',
    './resources/**/*.js',
    './resources/**/*.vue',
  ],
  darkMode: false, // or 'media' or 'class'
  theme: {
    extend: {
      screens: {
        '2xl': { max: '1535px' },
        // => @media (max-width: 1535px) { ... }

        xl: { max: '1280px' },
        // => @media (max-width: 1279px) { ... }

        lg: { max: '1024px' },
        // => @media (max-width: 1023px) { ... }

        md: { max: '768px' },
        // => @media (max-width: 767px) { ... }

        sm: { max: '640px' },
        // => @media (max-width: 639px) { ... }

        xs: { max: '480px' },
        // => @media (max-width: 479px) { ... }
      },
    },
  },
  variants: {
    extend: {},
  },
  plugins: [],
}
