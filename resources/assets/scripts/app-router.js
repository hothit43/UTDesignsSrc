import Vue from 'vue';
import Router from 'vue-router';
import Home from './views/Home';


//const appPath = `/${wpData.app_path}`;
/*global wpData:true*/
/*eslint no-undef: "error"*/
//const appPath = `/${wpData.app_path}`;
Vue.use( Router );

/**
 * Each route should map to a component.
 * The "component" can either be an actual component or just a component options object.
 */
export default new Router({
	//base: appPath, // path of the SPA relative to the domain.
	//mode: 'hash', // or "history"
	base: '',
	mode: "history",
	routes: [
		{
			path: '/',
			name: 'Home',
			component: Home
		},
		{
			path: "*",
			redirect: '/'
		}
	]
});

