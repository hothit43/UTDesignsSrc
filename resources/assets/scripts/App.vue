<template>
  <div id="app" :class="currentSize">
    <router-view :key="$route.path" />
    <MobileNavigation v-if="showMobile" />
  </div>
</template>
<script>
  import NProgress from 'nprogress'
  import MobileNavigation from './components/TheMobileNavbar'
  import {mapActions, mapState} from 'vuex'
  export default {
    components: {
      MobileNavigation
    },
    computed: {
      ...mapState(['currentSize']),
      showMobile(){
        return this.currentSize === 'md' || this.currentSize === 'sm' ? true : false
      }
    },
    methods: {
      ...mapActions({
        fetchPosts: 'fetchPosts',
        postsloaded : 'postsloaded',
        fullpageLoaded: 'fullpageLoaded'
      })
    },
    created(){
      this.fetchPosts()
       .then( () => {
         this.postsloaded(true)
         this.fullpageLoaded(true)
         NProgress.done()
       })

      NProgress.configure({
        speed: 200, 
        showSpinner: false
      })
      NProgress.start()
    }
  }
</script>
<style>
@import "~nprogress/nprogress.css";
#nprogress .bar {
  background: rgb(201,62,62);
  background: linear-gradient(90deg, rgba(201,62,62,1) 0%, rgba(249,32,32,1) 21%, rgba(255,118,118,1) 47%, rgba(249,32,32,1) 78%, rgba(201,62,62,1) 100%);
  height:3px;
}
</style>