<template>
  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12" >
      <div class="x_panel">
        <div class="x_title">
          <h2>Settings <small>general settings</small></h2>
          <ul class="nav navbar-right panel_toolbox">
            <li><a class="close-link"><i class="fa fa-close"></i></a>
            </li>
          </ul>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <br />
          <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post">

            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" >Name <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" id="category_name" v-model="setting.blogname" required="required" class="form-control col-md-7 col-xs-12">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" >Site Url
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" id="category_link" v-model="setting.siteurl" required="required" class="form-control col-md-7 col-xs-12">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" >Description
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <textarea type="text" id="category_desc" required="required" class="form-control col-md-7 col-xs-12 text-left" v-model="setting.blogdescription">
                </textarea>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" >Theme
              <span class="required">*</span></label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" v-model="setting.theme" class="form-control" >
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" >Email
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" v-model="setting.admin_email" class="form-control" >
              </div>
            </div>
            <div class="ln_solid"></div>
            <div class="form-group">
              <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                <button type="submit" class="btn btn-primary">Cancel</button>
                <button type="submit" class="btn btn-success" onclick="return false" v-on:click="btnSetting(0)" v-if="submit">Submit</button>
              </div>
            </div>

          </form>
        </div>
      </div>
    </div>

  </div>

</template>

<script>

export default {
  props: ['page','url'],
  data(){
      return {
          segUrl : '',
          searchQuery: '',
          setting: {
                      siteurl: '',
                      home: '',
                      blogname: '',
                      blogdescription: '',
                      theme: '',
                      admin_email: '',
                      version: ''
                    },
          f5Setting : {
                      siteurl: '',
                      home: '',
                      blogname: '',
                      blogdescription: '',
                      theme: '',
                      admin_email: '',
                      version: ''
                    },
          perPage : 10,
          submit:true,
          edit: false,
          total: 1,
          image: ''
        }
    },
    methods: {
        fetchSettings: function() {
            this.segUrl = '/generals?per_page='+this.perPage
            this.$http.get(this.url + this.segUrl).then((response) => {
                this.setting.siteurl = response.data.data[0].option_value
                this.setting.home = response.data.data[1].option_value
                this.setting.blogname = response.data.data[2].option_value
                this.setting.blogdescription = response.data.data[3].option_value
                this.setting.theme = response.data.data[4].option_value
                this.setting.admin_email = response.data.data[5].option_value
                this.setting.version = response.data.data[6].option_value
            }, (response) => {
                // error callback
            });
        },
        btnSetting: function(id) {
            var setting = this.setting
            if(id == 0){
              this.segUrl = '/generals/add' 
              this.$http.post(this.url+ this.segUrl, setting).then((response) => {
                  this.fetchSettings()
              }, (response) => {
                  // error callback
              });
            }
        },
    },
    filters: {
      stringLimit: function(str) {
          if(str.length > 10){
            return str.substring(0,10)+'...';
          }else {
            return str;
          }
      }
    },
    mounted() {
      this.fetchSettings()
    }
}

</script>
