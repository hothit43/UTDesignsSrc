<template>

  <div :class="['container', {'projects' : !isMobile}, {'relative': isMobile}, 'bg-white flex flex-grow max-w-6xl overflow-y-hidden overflow-y-scroll font-display text-center', {'expanded' : isExpanded}]"
    @scroll="onScroll"
  >
          
        <div class="proj-loading w-full h-full absolute left-0 top-0"
          :class="[{'simp-fade' : finished}]">
            <div class="spinner">
              <div class="bounce1"></div>
              <div class="bounce2"></div>
              <div class="bounce3"></div>
            </div>
        </div>
        <transition-group class="projects-scroll flex flex-wrap items-stretch h-full" :class="{'normal-scroll' : !isExpanded }" tag="div" name="projects" mode="out-in">
            <PostListItem
            v-for="post in wpPosts"
            :post="post"
            :key="post.id" 
            class="project-item overflow-hidden w-full md:w-2/6 font-display2 text-black border-solid border-2 border-white py-5 md:py-12"
            :class="[post.vue_meta.terms]"
            :style="{'background-image' : `url(${ isMobile && post.vue_meta.hasOwnProperty('acf') ? post.vue_meta.acf.mobile_url : currentSize === 'xl' ? post.vue_meta.featureddesk_url : post.vue_meta.featuredlap_url })`}"
            v-show="post.vue_meta.terms.includes(isActive) || isActive === 'Uncategorized'" 
         />
        </transition-group>
    </div>
</template>

<script>
import PostListItem from '../components/PostListItem'
export default {
    props: {
        wpPosts: {
            required: true,
            type: Array
        },
        wpData: {
            required: true,
            type: Object
        },
        finished: {
            required: true,
            type: Boolean
        },
        currentSize: {
            required: true,
            type: String
        },
        isActive: {
            type: String,
            required: false
        },
        isExpanded: {
            type:Boolean,
            required: true
        }
    },
    components: {
        PostListItem
    },
    computed:{
        isMobile(){
            return this.currentSize === 'sm' ? true : false
        }
    },
    methods:{
        onScroll ({ target: { scrollTop, clientHeight, scrollHeight, }}) {
            if (Math.ceil(scrollTop) + clientHeight >= scrollHeight) {
                this.$eventBus.$emit('projscroll', 'bottom')
            }
            if(Math.ceil(scrollTop) == 0) {
                this.$eventBus.$emit('projscroll', 'top')
            }
        }
    }
}
</script>

<style>

</style>