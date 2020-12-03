<template>
  <div class="container flex-auto max-w-6xl text-left mb-4">
      <div class="proj-heading relative">
        <nav class="flex justify-end flex-none absolute w-full xl:text-lg" style="z-index:1;">
          <a @click.prevent="breakplay" href="#" class="slideinfalse text-menu-grey mr-12" :class="{'active' : !breakdown}">About Me</a>
          <a @click.prevent="breakplay" href="#" class="slideinfalse text-menu-grey" :class="{'active' : breakdown}">Break Down</a>
        </nav>
        <h2 class="slideinfalse font-bold xl:text-4xl-2 text-4xl leading-tight mb-3">
          <span v-if="true" >Hello, I’m Alex.<br />I do web things</span>
          <span v-else>Hello, I’m Alex. I do web things</span>
      </h2>
      </div>
      <div class="overflow-hidden flex flex-no-wrap items-stretch text-sk-grey-dark relative">
        <div ref="ani-about" class="ani-about text-content origin-top-left flex-1 relative transform translate-y-0"
        :class="{'break-active' : breakdown}">
          <h3 class="slideinfalse font-display2 font-regular text-lg xl:text-2xl leading-relaxed mb-3">I am a front-end/Wordpress
          developer and designer</h3>
          <div class="slideinfalse">
            <p class="font-regular xl:text-lg xl:max-w-4xl max-w-3xl mb-4">I am a unique hybrid of pixel pusher and web developer! I've had titles like web designer, web master, web developer and front-end developer. Other titles employers have considered have been interaction designer, web animator, wordpress developer, and sorcerer. I made that last one up lol.</p>
            <p class="font-regular xl:text-lg">Want to see my design work? check it out <a class="font-bold" target="_blank" href="http://behance.net/utahdesigns">here</a>!</p>
          </div>
        </div>
        <div ref="ani-break" :class="{'break-active' : breakdown}" class="progress-container flex flex-wrap absolute w-full items-stretch justify-between flex-1 transform -translate-y-64">
          <div v-show="true" class="progress font-display2 text-left w-bars"
            v-for="bars in barsData" :key="bars.skill">
            <div class="shadow w-full bg-sk-grey">
            <div class="progress-bar bg-sk-red-bright leading-none xl:py-2 py-1 pl-2 mt-3 text-white xl:text-base"
            :style="{width: bars.width}"
            ref="progressBar">
              {{bars.skill}}
            </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</template>

<script>
import {barsData} from '../helpers'
export default {
    data(){
        return{
            barsData: barsData,
            baranimate: null,
            breakdown: false
        }
    },
    methods: {
        breakplay(){
            this.breakdown = !this.breakdown
            this.baranimate.seek(0)
            if(this.breakdown) {
              return new Promise((resolve, reject) => {
                setTimeout(() => this.baranimate.play(), 300)
                resolve(this.baranimate)
              })
              .then( bars => bars.pause())
            }
        }
    },
    mounted(){
      this.baranimate = this.$animejs.timeline({
        easing: 'easeInOutQuad',
        direction: 'alternate',
        duration: 600,
        loop: false,
        autoplay: false
      })
      for(const [i, progressbar] of this.$refs.progressBar.entries()){
        this.baranimate
        .add({
          targets: progressbar,
          width: [0, this.barsData[i].width ]
        }, i > 0 ? '-=500' : 0)
      }
    }
}
</script>