<template>
  <main class="main bg-sk-red-dark text-primary text-sm">
  <transition name="fade">
    <AppLoading v-if="!postsloaded" :postsloaded="postsloaded" />
  </transition>
  
  <HomeIntroContent v-if="postsloaded" :responsiveSizes="responsiveSizes" :currentSize="currentSize" v-touch:swipe="swipeHome" />
  <full-page ref="fullpage" v-if="postsloaded" :options="fullpage.options" class="fullpage-wrapper" :skip-init="false">
       <section class="section intro bg-transparent text-white flex h-screen items-center font-display" data-anchor="home" ></section>
        <AboutMobile v-if="responsiveSizes[currentSize] < responsiveSizes.lg" data-anchor="about" />
        <ProjectsMobile v-if="responsiveSizes[currentSize] < responsiveSizes.lg" data-anchor="projects" />
        <ProjectsAboutDesktop v-else data-anchor="projects" />
        <DMs data-anchor="dms" />
  </full-page>
  
  </main>
</template>

<script>
    import AppLoading from '../components/AppLoading'
    import HomeIntroContent from '../components/HomeIntro'
    import AboutMobile from '../components/AboutMobile'
    import ProjectsMobile from '../components/ProjectsMobile'
    import ProjectsAboutDesktop from '../components/ProjectsAboutDesktop';
    import DMs from '../components/DMs'
    import {mapState, mapActions} from 'vuex';
    
export default {
  name: 'Home',
  components: {
    AppLoading,
    HomeIntroContent,
    AboutMobile,
    ProjectsMobile,
    ProjectsAboutDesktop,
    DMs
  },
  data() {
    return {
      winWith: window.innerWidth
    }
    
  },
  computed: {
    ...mapState({
      responsiveSizes: 'responsiveSizes',
      currentSize: 'currentSize',
      fullpage: 'fullpage',
      postsloaded: 'postsloaded'
    })
  },
  methods: {
    ...mapActions(['currentResponsiveSize']),
    swipeHome(){
      this.$refs.fullpage.api.moveSectionDown()
    },
    gettingWidth(e){
      this.currentResponsiveSize(window.innerWidth)
      if(this.winWith > 1024){
        if(this.responsiveSizes[this.currentSize] < 1024) {
          window.location.reload()
        }
      }
      if(this.winWith < 1024){
        if(this.responsiveSizes[this.currentSize] >= 1024){
          window.location.reload()
        }
      }
    }
  },
  created(){
    this.currentResponsiveSize(window.innerWidth)
      .then()
    window.addEventListener('resize', this.gettingWidth)
  },
  mounted(){
    this.$eventBus.$on('projscroll', scrolldirection => setTimeout( () => scrolldirection === 'bottom' ? this.$refs.fullpage.api.moveSectionDown() : this.$refs.fullpage.api.moveSectionUp(), 100))
  },
  beforeDestroy(){
    window.removeEventListener('resize', this.gettingWidth)
  }
}
</script>