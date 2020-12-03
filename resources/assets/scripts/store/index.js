import Vuex from 'vuex'
import Vue from 'vue'
import axios from 'axios'
import fullpage from './fullpage'
import actions from './actions'
import mutations from './mutations'
import getters from './getters'


Vue.use(Vuex);
const responsiveSizes = {
    sm: 640,
    md: 768,
    lg: 1024,
    xl: 1280
};


export default new Vuex.Store({
    state: { 
        apiResponse: ' Loading ⏳ ',
        wpPosts:[],
        wpData: wpData,
        isDataAvailable: false,
        responsiveSizes: responsiveSizes,
        currentSize: null,
        fullpage,
        fullpageLoaded: false,
        activePost: {},
        postsloaded : false,
        fullpageRef: null
    },
    getters,
    actions,
    mutations
});
 