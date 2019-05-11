

var example = new Vue({
    el: '#article',
  
    data() {
      return {
        articles: [],
        article: {
          id: '',
          title: '',
          body: '',
        }, 
        count: '',
        debug: '',
        article_id: '',
        pagination: {},
        edit: false
      }
    },

    created(){
      this.fetchArticles();
    },

    methods: {
      fetchArticles(){
        fetch('api/article')
        .then(res => res.json())
        .then(res => {
          console.log(res.data);
          this.count = res.count;
          this.articles = res.data;
        })        
      },
      deleteArticle(id)
      {
        if(confirm('Are you sure?')){
          fetch(`api/article/${id}`,{
            method: 'delete'
          })
          .then(res => res.json())
          .then(data =>{
            console.log(data);
            this.fetchArticles();
          })
        }
      },
      editArticle(id)
      {
        fetch(`api/article/${id}`,{
          method: 'get'
        })
        .then(res => res.json())
        .then(res =>{
          $('.basicExampleModal').modal('toggle');
          this.article = res.data;
          this.fetchArticles();
        })
      },
      addArticle()
      {
        fetch('api/article', {
          method: 'post',
          body: JSON.stringify(this.article),
          headers: {
            'content-type': 'application/json'
          }
        })
        .then(res => res.json())
        .then(data => {
           if(data.status == 101)
          {
            this.debug = data.message;
          }
          else
          {
            $('#basicExampleModal').modal('toggle');
            this.fetchArticles();
          }
        })
      },
      updateArticle(id)
      {
        fetch(`api/article/${id}`, {
          method: 'put',
          body: JSON.stringify(this.article),
          headers: {
            'content-type': 'application/json'
          }
        })
        .then(res => res.json())
        .then(data => {
          $('.basicExampleModal').modal('toggle');
          this.fetchArticles();
        })
      }
    }
  })
