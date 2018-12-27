
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

window.Vue = require('vue');

import Axios from 'axios';
import Datepicker from 'vuejs-datepicker';
import VuejsDialog from "vuejs-dialog";
import VueCookie from "vue-cookie";

Vue.prototype.$http = Axios;
Vue.use(VuejsDialog);
Vue.use(VueCookie);



/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('resetform', require('./components/ResetForm.vue').default);

export const eventBus = new Vue();


const app = new Vue({
    el: '#app',
    mixins: Laravel.vueMixins,
    data: {
        msg: false,
    },
    components: {
        Datepicker
    },
    created() {
    },
    methods: {
        jserror: function(msg) {
            switch (msg) {
                case "defaultMsg500":
                    this.msg = "Ein Fehler ist aufgetreten. Bitte versuchen Sie es in wenigen Minuten erneut.";
                    this.msg += "Falls diese Fehlermeldung erneut auftritt, kontaktieren Sie bitte den Support."
                    break;
                default:
                    this.msg = " Ein Fehler ist aufgetreten. ";
            }
        }
    }
});
