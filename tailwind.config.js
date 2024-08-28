// tailwind.config.js
module.exports = {
  purge: [
    './resources/**/*.blade.php',
    './resources/**/*.js',
    './resources/**/*.vue',
     "./node_modules/flowbite/**/*.js",
  ],
  darkMode: false, // or 'media' or 'class'
  theme: {
    extend: {},
  },
  content: [
    './resources/views/**/*.blade.php',
    './resources/js/**/*.vue',
  ],
  variants: {},
  plugins: [
    require('taos/plugin'), 
    require('flowbite/plugin'),
  ],
  safelist: [
    '!duration-[0ms]',
    '!delay-[0ms]',
    'html.js :where([class*="taos:"]:not(.taos-init))',
  ],
  content: {
    relative: true,
    transform: (content) => content.replace(/taos:/g, ''),
    files: ['./src/*.{html,js}'],
    
  },
  // content:[
  //    "./node_modules/flowbite/**/*.js"
  // ]
}
