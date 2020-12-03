<template>
  <section class="section projects projects-small overflow-y-hidden box-border bg-white border-sk-grey-dark flex flex-col font-display text-center h-screen pt-3 pb-16">
    <transition name="post-fade">
     <Single v-if="Object.keys(this.activePost).length > 0" @close="$store.dispatch('clearActivePost')" :post="activePost" />
    </transition>
    <div class="container max-w-full flex-none py-4"><h2 class="font-bold text-4xl leading-tight mb-3">Projects</h2></div>
    <PostList :wpPosts="wpPosts" :wpData="wpData" :finished="postsloaded" :currentSize="currentSize" :isActive="isActive" :isExpanded="false" />
    <div class="container max-w-full flex-none py-3">
      <nav class="flex items-center items-stretch text-center">
          <a 
          v-for="cat in wpCategories"
          :key="cat" href="#" class="flex-1" 
          @click.prevent="activeClass(cat)" 
          :class="[{active : cat === isActive}]">
          {{cat === 'Uncategorized' ? 'All' : cat}}
          </a>
      </nav>
    </div>
  </section>
</template>

<script>
    import {mapState, mapActions, mapGetters} from 'vuex'
    import PostList from '../components/PostList'
    import Single from '../components/Single'
    export default {
        components: {
          PostList,
          Single
        },
        data(){
          return {
            isActive: 'Uncategorized',
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
          activeClass(cat){
            console.log(cat)
            this.isActive = cat;
          }
        }
    }
</script>