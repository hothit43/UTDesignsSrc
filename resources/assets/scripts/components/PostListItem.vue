<template>
    <div>
        <div class="content text-center w-full px-4">
            <span class="block mb-10">{{post.title.rendered}}</span>
            <a
            @click.stop="getActivePost()"
            class="overflow-hidden relative block mt-10 font-light bg-transparent border-solid border-2 border-sk-red-bright block py-3 px-4 mx-auto w-4/5 text-black expand cursor-pointer">
            View More</a>
        </div>
    </div>
</template>

<script>
export default {
    props:{
        post: {
            type: Object,
            required: true
        }
    },
    methods: {
        getActivePost(){
            this.$store.dispatch('getActivePost', this.post)
        }
    }

}
</script>