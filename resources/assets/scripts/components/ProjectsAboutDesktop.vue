<template>
  <section class="section projects projects-large flex flex-col h-screen w-11/12 mx-auto items-center bg-transparent font-display py-16">
    <transition name="fade">
    <Single v-if="Object.keys(this.activePost).length > 0" @close="$store.dispatch('clearActivePost')" :post="activePost" />
    </transition>
    <AboutDesktop />
    <div class="expand-projs absolute z-10 max-w-6xl"
          @click="projectsExpand" :class="[{'simp-fade' : !postsloaded}, {'expanded-icon' : isExpanded}]">  
              <img :src="`${wpData.template_directory_uri}/resources/assets/images/launch_icon.svg`" alt="launch projects window" />
    </div>
    <PostList :wpPosts="wpPosts" :wpData="wpData" :finished="postsloaded" :currentSize="currentSize" :isActive="isActive" :isExpanded="isExpanded" />
  </section>
</template>

<script>
import Single from '../components/Single'
import PostList from '../components/PostList'
import AboutDesktop from '../components/AboutDesktop'

import {mapState, mapGetters} from 'vuex'
import clickOutside from '../directives/clickoutside'

    export default {
        components: {
          Single,
          PostList,
          AboutDesktop
        },
        data(){
          return {
            isActive: 'Uncategorized',
            isExpanded: false
          }
        },
        computed: {
          ...mapState(['postsloaded', 'currentSize','wpPosts', 'wpData']),
          ...mapGetters(['activePost']),
          wpCategories() {
            return this.wpData.post_categories.filter(cat => cat != 'Email');
          }
        },

        methods: {
          close(){
            this.isExpanded = false
          },
          updateActivePost(val){
            this.activePost = val
          },
          projectsExpand(){
            this.isExpanded = !this.isExpanded

          }
        }
    }
</script>