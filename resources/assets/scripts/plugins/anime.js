// animejs.js
import anime from 'animejs';
const install = (Vue, options) => {
    Object.defineProperty(Vue.prototype, '$animejs', { value: anime })
}

export default install