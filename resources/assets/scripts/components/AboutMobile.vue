<template>
  <section class="section about flex h-screen items-center bg-transparent font-display py-6">
    <div class="container flex-auto text-left">
      <h2 class="font-bold text-3xl xs:text-4xl leading-tight xs:mb-3 mb-2">Hello, I’m Alex.<br />
        I do web things</h2>
      <div class="text-content">
        <h3 class="font-display2 font-regular text-md xs:text-lg leading-relaxed mb-2 xs:mb-3">I am a front-end/Wordpress
        developer and designer</h3>
        <p class="font-light text-xs xs:text-sm mb-4 xs:mb-6">I am a unique hybrid of pixel pusher and web developer! I've had titles like web designer, web master, web developer and front-end developer. Other titles employers have considered have been interaction designer, web animator, wordpress developer, and sorcerer. I made that last one up lol.</p>
      </div>

      <div class="w-full progress font-display2 text-left"
        v-for="bars in barsData" :key="bars.skill">
        <div class="shadow w-full bg-sk-grey">
         <div class="progress-bar bg-sk-red-bright leading-none py-1 pl-2 mt-1 xs:mt-3 text-xs xs:text-base text-white"
         :style="{width: bars.width}"
         :ref="`progress`">
           {{bars.skill}}
         </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
import {mapState} from 'vuex';
import {barsData} from '../helpers'
export default {
  data(){
    return {
      barsData: barsData,
      baranimate: null
    }
  }
}
</script>