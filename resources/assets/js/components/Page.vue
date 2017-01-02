<template>
  <div class="row">
    <div class="col-md-8 col-sm-8 col-xs-12" v-if="postDetail">
      <div class="x_panel">
        <div class="x_title">
          <h2>Page <small>form tool</small></h2>
          <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link" href="javascript:void(0)" v-on:click="newPost"><i class="fa fa-plus"></i></a>
            </li>
            <li><a  class="close-link" v-on:click="fetchPost"><i class="fa fa-close"></i></a>
            </li>
          </ul>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <br />
          <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post">

            <div class="form-group">
              <label class="col-md-12 col-sm-12 col-xs-12" >Title
              </label>
              <div class="col-md-12 col-sm-12 col-xs-12">
                <input type="text" id="title" v-model="post.title" required="required" class="form-control col-md-7 col-xs-12" v-on:keyup="postPara">
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-12 col-sm-12 col-xs-12" >
              {{ url }}/{{ post.post_link}}
              </label>
            </div>
            <div class="form-group">
              <label class="col-md-12 col-sm-12 col-xs-12" >Description <span class="required">*</span>
              <slot v-if="preview == true">
                  <a href="javascript:void(0)" v-on:click="preview = false" >Preview</a>
                </slot>
                <slot v-if="preview == false">
                  <a href="javascript:void(0)" v-on:click="preview = true" >Preview</a>
                </slot>
              </label>
              <div class="col-md-12 col-sm-12 col-xs-12" >
                <textarea type="text" id="post_desc" required="required" class="form-control col-md-12 col-sm-12 col-xs-12 text-left" v-model="post.body" style="min-height:300px">
                </textarea>
                <div type="text" id="post_desc" required="required" class="form-control col-md-12 col-sm-12 col-xs-12 text-left x_content warp_box"  v-html="compiledMarkdown" style="min-height:300px"  v-if="preview">
                </div>
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-12 col-sm-12 col-xs-12" >Active<span class="required">*</span>
              </label>
              <div class="col-md-12 col-sm-12 col-xs-12" >
                <select class="form-control" v-model="post.post_active">
                          <option value="">Choose option</option>
                          <option value="yes">Yes</option>
                          <option value="no">No</option>
                </select>
              </div>
            </div>
            <div class="ln_solid"></div>
            <div class="form-group">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <button type="submit" class="btn btn-primary">Cancel</button>
                <button type="submit" class="btn btn-success" onclick="return false" v-on:click="btnPost(0)" v-if="submit">Submit</button>
                <button type="submit" class="btn btn-success" onclick="return false" v-on:click="btnPost(post.id)" v-if="edit">Edit</button>
              </div>
            </div>

          </form>
        </div>
      </div>
    </div>
    <div class="col-md-4 col-sm-4 col-xs-12" v-if="postDetail">
      <div class="x_panel">
        <div class="x_title">
          <h2>Template</h2>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <input type="text" name="post_template" class="form-control" v-model="post.post_template">
        </div>
      </div>
    </div>
     
    <div class="col-md-12 col-sm-12 col-xs-12" v-if="!postDetail">
      <div class="x_panel">
        <div class="x_title">
          <h2>Page Tables <small>total page  <span>{{ total }}</span></small></h2>
          <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link" href="javascript:void(0)" v-on:click="newPost"><i class="fa fa-plus"></i></a>
            </li>
          </ul>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for..." v-model="searchQuery" v-on:keyup="search" autocomplete="off">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                  </div>
          <table class="table">
            <thead>
              <tr>
                <th>#</th>
                <th>Title</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="(p,key) in posts">
                <th scope="row"><a href="javascript:void(0)" name="Edit" v-on:click="btnEditPost(key)" >{{ key+1 }}</a></th>
                <td><a href="javascript:void(0)" name="Edit" v-on:click="btnEditPost(key)" >{{ p.title}}</a></td>
                <td><a href="javascript:void(0)" name="Delete" v-on:click="btnDeletePost(p.post_id)" ><i class="fa fa-close"></i></a></td>
              </tr>
            </tbody>
          </table>
          <div class="col-md-12 text-center">
            <a href="" onclick="return false" name="loadMore" v-on:click="loadMore('page')">Load More</a>
          </div>

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
          posts: [{ id: 0,
                  title: "",
                  body: "",
                  post_featured: 0,
                  post_link: "",
                  post_template: "",
                  post_weight: 0,
                  post_view: 0,
                  post_active: "yes",
                  post_created: 0,
                  created_at: "2016-06-03 00:36:29"
                  }],
          post: { id: 0,
                  title: "",
                  body: "",
                  post_featured: 0,
                  post_link: "",
                  post_template: "default",
                  post_type: "page",
                  post_weight: 0,
                  post_view: 0,
                  post_active: "yes",
                  post_created: 0,
                  created_at: "2016-06-03 00:36:29"
                  },
          f5Post: { id: 0,
                  title: "",
                  body: "",
                  post_featured: 0,
                  post_link: "",
                  post_template: "default",
                  post_type: "page",
                  post_weight: 0,
                  post_view: 0,
                  post_active: "yes",
                  post_created: 0,
                  created_at: "2016-06-03 00:36:29"
                  },
          postDetail : false,
          perPage : 10,
          submit:true,
          edit: false,
          total: 0,
          image: '',
          preview: false
        }
    },
    methods: {
        newPost : function() {
          this.postDetail = true
          this.submit = true
          this.post = { id: 0,title: "",body: "",
                  post_featured: 0,post_link: "",post_template: "default",post_type: "page",
                  post_weight: 0,post_view: 0,post_active: "yes",
                  post_created: 0,created_at: "2016-06-03 00:36:29"}
        },
        search: function() {
            if (this.searchQuery == "") {
                this.submit = true
                this.edit = false
                this.post = this.f5Post
                this.fetchPost()
            } else {
                this.searchPost()
            }
        },
        searchPost: function() {
            this.postDetail = false
            this.segUrl = '/page/search?bptitle=' + this.searchQuery+'&per_page='+this.perPage
            this.$http.get(this.url + this.segUrl).then((response) => {
                if (response.data.data.length == 1) {
                    this.perPage = 10
                    this.post = response.data.data[0]
                } else {
                    this.posts = response.data.data
                }
            }, (response) => {
                // error callback
            });
        },
        fetchPost: function() {
            this.postDetail = false
            this.segUrl = '/page?per_page='+this.perPage
            this.$http.get(this.url + this.segUrl).then((response) => {
                this.total = response.data.total
                this.posts = response.data.data.data
            }, (response) => {
                // error callback
            });
        },
        btnPost: function(id) {
          var post = this.post
          this.post = this.f5Post  
            if(id == 0){
              this.segUrl = '/page' 
              this.$http.post(this.url+ this.segUrl, post).then((response) => {
                  this.fetchPost()
              }, (response) => {
                  // error callback
              });
            } else {
              this.segUrl = '/page/'+id 
              this.$http.patch(this.url+ this.segUrl, post).then((response) => {
                  this.fetchPost()
              }, (response) => {
                  // error callback
              }); 
            }    
            $("#title").focus();
            this.total = this.total + 1;
        },
        btnEditPost: function(id){  
            this.postDetail = true,  
            this.submit = false
            this.edit = true      
            this.post = this.posts[id];
        },
        btnDeletePost: function(id){
            this.postDetail = false,
            this.segUrl = '/page/'+id
            this.$http.delete(this.url+this.segUrl).then((response) => {
                this.fetchPost()
            }, (response) => {

            });
        },
        loadMore: function(filter){
            if(filter == 'page'){
                if(this.segUrl.search('page')> 0){
                  this.getPerPage()
                  this.fetchPost()
                } else {
                  this.perPage = 20
                  this.fetchPost()
                }
            }
        },
        getPerPage: function(){
          var array = this.segUrl.split('per_page=');
          this.perPage = parseInt(array[1]) + 10;
        },
        postPara: function() {
          var temp = this.post.title.replace(/[\. ,:-=]+/g, "-").toLowerCase()
          this.post.post_link = temp
        },
        update: _.debounce(function (e) {
          this.post.body = e.target.value
        }, 300)
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
    computed: {
      compiledMarkdown: function () {
        return marked(this.post.body, { sanitize: true })
      }
    },
    mounted() {
       this.fetchPost()
    }
}

</script>
