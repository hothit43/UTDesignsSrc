<template>
  <section class="bg-transparent see-work text-white flex w-full h-screen items-center font-display fixed"
    :class="{'zindex' : fpzindex}">
      <div class="container flex-auto text-center ">
        <h1 class="font-black text-5xl tracking-wider leading-tight" v-html="heading"></h1>
        <p v-if="currentSize === 'sm' || currentSize === 'md'" class="font-light text-2xl xs:text-3xl tracking-wider"><strong class="font-black">I'm</strong> a pixel pushing<br /> creative <strong class="font-black">Web Developer</strong></p>
        <a href="#projects" class="intro-btn font-light lg:text-2xl bg-white bg-opacity-15 border-solid border border-white border-opacity-50 block lg:py-3 py-3 px-4 mx-auto lg:my-6 my-10 lg:w-64 w-40 cursor-pointer"
        >
          View My Work
        </a>
        
      </div>
      <svg id="morph" width="100%" height="100%" x="0" y="0" viewBox="0 0 1366 768" preserveAspectRatio="none">
      <path width="100%" class="morph" ref="morph" d="M 1366.5 768.5 L 1380 769 C 1301.167 769 1222.333 769 1143.5 769 C 883.189 769 762.5 770 572.5 770 C 382.5 770 401.4 768 285 768 C 182 768 82 769 -9 769 L 0.5 768.5 L 1366.5 768.5 Z" fill="#ffffff" />
      </svg>
      <Circuits :activeSection = "activeSection"/>
    </section>
</template>

<script>
import Circuits from '../components/svg/Circuits';
import {mapActions} from 'vuex'
export default {
  props: ['responsiveSizes', 'currentSize'],
  components: {
    Circuits
  },
  data(){
    return {
      morphSVG: null,
      fpzindex: true,
      activeSection: 0
    }
  },
  computed:{
    heading(){
      return this.responsiveSizes[this.currentSize] >= this.responsiveSizes.lg ? 
      'Hi, I’m <span>a Pixel Pushing<br />Creative</span> Web Developer.' : 'Hello'
    },
    scrollSpeed(){
      this.activeSection
      return this.activeSection === 0 ? this.newFullPageOption({name: 'scrollingSpeed', callback: 900}) : this.newFullPageOption({name: 'scrollingSpeed', callback: 500})
    }
  },
  methods:{
    ...mapActions(['newFullPageOption'])
  },
  created(){
        const onLeave = (origin, destination, direction) => {   
        if( origin.index === 0 && destination.index === 1) {
          this.morphSVG.direction = 'normal'
          this.morphSVG.play()
          this.fpzindex = false
          this.morphSVG.finished.then(() => {
            this.morphSVG.seek(800)  
            this.morphSVG.pause()    
          })
        }
        else if(destination.index === 0) {
          this.fpzindex = false
          this.morphSVG.seek(0)
          this.morphSVG.direction = 'reverse'
          this.morphSVG.play()
          this.morphSVG.finished.then(() => {
              this.fpzindex = true
              this.morphSVG.pause()
          })
        } else {
          this.fpzindex = false
          this.morphSVG.direction = 'normal'
          this.morphSVG.seek(800)  
        }     
      }
      const afterLoad = (origin, destination, direction) => {
        this.activeSection = destination.index
      }   
      this.newFullPageOption({name: 'onLeave', callback: onLeave})
      this.newFullPageOption({name: 'afterLoad', callback: afterLoad})
    
  },
  mounted(){
      this.morphSVG = this.$animejs({
      targets: this.$refs.morph,
      d: [{
          value: 'M 1366.5 768.5 L 1366.5 384.5 C 1366.5 384.5 1274.452 202.477 1143.5 326.5 C 954.5 505.5 762.5 196.5 572.5 196.5 C 382.5 196.5 302.5 315.5 209.5 385.5 C 116.5 455.5 86.5 469.5 0.5 482.5 L 0.5 768.5 L 1366.5 768.5 Z'
        },
        {
          value: 'M 1367 768 L 1367 0 C 1273.53 0 1180.061 0 1086.591 0 C 909.632 0 732.673 0 555.714 0 C 490.518 0 425.323 0 360.127 0 C 240.418 0 120.709 0 1 0 L 1 768 L 1367 768 Z'
        }],
      easing: 'cubicBezier(0.175, 0.650, 0.975, 0.690)',
      duration: 800,
      autoplay:false
      })      
  }
}
</script>