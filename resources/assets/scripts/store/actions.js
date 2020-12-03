export default {
    currentResponsiveSize(context, currentSize) {
        return new Promise((resolve, reject) => {
            context.commit('setCurrentWidth', currentSize)
            resolve(context.state.currentSize)
        })
    },
    fetchPosts(context){
        let postType = 'posts';
        let appNameSpace = 'wp/v2' ;
        const postsPerPage = 100; // default is 10.
        const restURL = context.state.wpData.rest_url;
        const fields = 'id,title,link,categories,content,vue_meta'; // retrieve data for specific fields only

        return new Promise((resolve, reject) => {
            axios.get(`${restURL}/${appNameSpace}/${postType}?per_page=${postsPerPage}&page=1&_fields=${fields}`)
            .then(response => {
                const wpTotalPages = Math.ceil(response.headers['x-wp-total']/postsPerPage)
                const promises = [];
                for ( let page = 2; page <= wpTotalPages && 10 >= page; page++ ) {
                    promises.push(axios(`${restURL}/${appNameSpace}/${postType}?per_page=${postsPerPage}&page=${page}&_fields=${fields}`))
                }
                Promise.all( promises ).then(wpData => context.commit('setPosts', wpData))
                context.commit('getPostNum', response);
                resolve(context.state.wpPosts)
            })
        })
    },
    postsloaded(context, loaded){
        context.commit('setfinished', loaded)
    },
    fullpageLoaded(context, loaded){
        context.commit('fullpageInitiated', loaded)
    },
    getActivePost(context, post){
        return new Promise((resolve, reject) => {
            context.commit('setActivePost', post)
            resolve(context.state.activePost)
        })     
    },
    clearActivePost(context){
        context.commit('clearActivePost')
    },

    newFullPageOption(context, {name, callback}){
        return new Promise((resolve, reject) => {
            context.commit('setNewFullpageOption', {name, callback} )
            resolve(context.state.fullpage.options[name])
        })
    },

    refToState(context, payload){
        context.commit('setRef', payload)
    }

}