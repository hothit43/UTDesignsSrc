<template>
    <section
    class="project-view bg-white rounded-t-lg text-sk-grey-dark flex lg:items-center items-start lg:h-auto bottom-0 left-0 z-10 h-full fixed">
        <div class="proj-close absolute right-0 top-0 bg-opacity-50 py-6 bg-white" style="width:50px;">
        <div class="close-outer"
        v-click-outside="exitPost"
        @click="exitPost">
            <div class="close-inner">
                <label>Back</label>
            </div>
        </div>
        </div>
        <div class="container flex flex-row flex-wrap justify-start content-end max-w-full p-0">
            <div class="mx-auto bg-contain bg-top bg-no-repeat w-full mb-5" 
            :style="[
            {'background-image' : `url(${ post.vue_meta.hasOwnProperty('acf') ? post.vue_meta.acf.featured_main_url : ''})`}, {height:`${responsiveSizes[currentSize] < responsiveSizes.lg ? '200px' : '250px'}`}
            ]"></div>
            <div class="text-content text-left mt-auto pb-12 pl-8 w-full">
                <h2 class="font-bold xl:text-4xl-2 text-4xl leading-tight mb-3">{{post.title.rendered}}</h2>
                <hr class="mb-4 border-sk-grey mr-8" />
                <div class="font-regular xl:text-sm text-sm xl:max-w-4xl max-w-3xl mb-8 pr-20 \"
                v-html="post.content.rendered">
                </div>
                <div class="flex flex-no-wrap">
                <a
                  v-if="post.vue_meta.hasOwnProperty('acf') && post.vue_meta.acf.project_link == true"
                  :href="post.vue_meta.acf.project_url"
                  target="_blank"
                  class="overflow-hidden relative flex-grow-0 flex-shrink font-display2 text-black font-light bg-transparent border-solid border border-sk-red-bright py-3 px-12 text-black expand cursor-pointer text-center">
                  View More
                </a>
                
                <a
                  href="#"
                  @click.prevent="exitPost"
                  class="overflow-hidden relative flex-grow-0 flex-shrink font-display2 text-black font-light bg-transparent border-solid border border-sk-red-bright py-3 px-12 text-black ml-2 expand cursor-pointer text-center">
                  Close
                </a>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
import {mapState, mapGetters, mapActions} from 'vuex'
import closeMixin from '../helpers/mixin/close.js'
import clickOutside from '../directives/clickoutside'

    export default {
        name: 'Project',
        mixins: [closeMixin],
        directives: {
          clickOutside
        },
        props:['post'],
        computed:{
            ...mapState(['currentSize','responsiveSizes']),
        },
        methods:{
            exitPost(){
                this.$emit('close')
            }
        }
    }
</script>
