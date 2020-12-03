module.exports = {
  theme: {
    fontFamily: {
      display: ['Roboto', 'sans-serif'],
      display2: ['Roboto Mono', 'monospace'],
      body: ['Source Sans Pro', 'sans-serif'],
    },
    colors: {
      'sk-red-dark': '#800606',
      'sk-red-bright': '#C93E3E',
      'sk-grey':'#EBEBEB',
      'sk-grey-dark': '#3E3E3E',
      'white': '#fff',
      'black': '#000',
    },
    container: {
      center: true,
      padding: '1.5625rem',
    },
    screens: {
      xs: '414px',
      sm: '640px',
      md: '768px',
      lg: '1024px',
      xl: '1280px',
    },
    extend: {
      textColor: {
        'primary': '#3E3E3E',
        'white': '#fff',
        'menu-grey': '#909090',
      },
      fontSize: {
        '4xl-2': '2.875rem',
      },
      height: {
        '1/10': '10%',
        '3/5': '60%',
        '4/5': '80%',
        '17/20': '85%',
      },
      width: {
        'bars': '49%',
      },
      backgroundOpacity: {
        '15': '0.15',
      },
    },
    variants: {},
    plugins: [],
  }
}
