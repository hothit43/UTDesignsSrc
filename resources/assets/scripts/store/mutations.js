
export default {
    getPostNum(state, response) {
        state.wpPosts = response.data;
        state.isDataAvailable = true;
    },
    setPosts(state, wpData ){ 
        wpData.map( post => {
            state.wpPosts.push(...post.data);            
        });   
    },
    setfinished(state, loaded){
        state.postsloaded = loaded;
    },
    fullpageInitiated(state, loaded) {
        state.fullpageLoaded = loaded
    },
    setActivePost(state, post){
        Vue.set(state, 'activePost', post)
    },
    clearActivePost(state){
        Vue.set(state, 'activePost', {})
    },
    setNewFullpageOption(state, {name, callback}){
        Vue.set(state.fullpage.options, name, callback)
    },
    setRef(state, payload){
        state.fullpageRef = payload
    },
    setCurrentWidth(state, currentSize) {
            if( currentSize >= state.responsiveSizes.xl) {
                state.currentSize = 'xl';
       
            }    
            else if(currentSize >= state.responsiveSizes.lg && currentSize < state.responsiveSizes.xl){
                state.currentSize = 'lg'
            
            }
            
            else if(currentSize >= state.responsiveSizes.md && currentSize < state.responsiveSizes.lg) {
                state.currentSize = 'md'
         
            }

            else if(currentSize < state.responsiveSizes.md){
                state.currentSize ='sm'
            } else {
                state.currentSize = ''
            
            }
      
    }   
}