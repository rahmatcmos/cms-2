
/**
 * First we will load all of this project's JavaScript dependencies which
 * include Vue and Vue Resource. This gives a great starting point for
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the body of the page. From here, you may begin adding components to
 * the application, or feel free to tweak this setup for your needs.
 */

Vue.component('dashboard', require('./components/Dashboard.vue'));
Vue.component('post', require('./components/Post.vue'));
Vue.component('page', require('./components/Page.vue'));
Vue.component('user', require('./components/User.vue'));
Vue.component('menu', require('./components/Menu.vue'));
Vue.component('media', require('./components/Media.vue'));
Vue.component('slider', require('./components/Slider.vue'));
Vue.component('category', require('./components/Category.vue'));
Vue.component('taxonomy', require('./components/Taxonomy.vue'));
Vue.component('settings', require('./components/Settings.vue'));

const app = new Vue({
    el: 'body',
    data: {
      currentView: 'menu',
      mainUrl : $('meta[name="url"]').attr('content')+'/bp-admin',
      shutter : {post : true, page :false, media : false, menu : false, 
                user : false , slider : false , settings : false, 
                custom : false , addCustom: false 
              },
      nav : true
    },
    methods: {
      menu: function(view){
          this.currentView = view
      //    this.fetchShutterAction()
      },
      shutterAction: function(input){
          $.each( this.shutter, function( key, val ) {
              if(key == input ){
                  if(val == true) {
                    app.shutter[key] = false;
                    $("#"+key).addClass('active');
                    $("#"+key+"> ul").addClass('display');
                  } else {
                    app.shutter[key] = true;
                    $("#"+key).removeClass('active');
                    $("#"+key+"> ul").removeClass('display');
                  } 
                
              }
              
          });
      },
      fetchShutterAction: function(){
          $.each( this.shutter, function( key, val ) {
                  if(val == true) {
                    $("#"+key).addClass('active');
                    $("#"+key+"> ul").addClass('display');
                  } else {
                    $("#"+key).removeClass('active');
                    $("#"+key+"> ul").removeClass('display');
                  } 
                
          });
      },
      navClick: function(){
        if(this.nav == true) {
          this.nav = false 
          $('body').addClass('nav-sm')
          $('body').removeClass('nav-md')
          $('.active').addClass('active-sm')
        } else {
          this.nav = true
          $('body').addClass('nav-md')
          $('body').removeClass('nav-sm')
          $('.active').addClass('active-sm')
        }
          
      }
    },
    filters: {
        reg: function(val) {
            return val.replace('-',' ');
          }
    },
    ready(){

    }
});
