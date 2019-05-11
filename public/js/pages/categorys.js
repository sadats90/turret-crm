var category = new Vue({
  el: "#category",
  data() {
      return {
        categorys: [],
        category: {
          id: '',
          title: '',
          body: '',
        }, 
        count: '',
        debug: '',
        category_id: '',
        pagination: {},
        edit: false
      }
    },

    created(){
      this.fetchCategorys();
    },

    methods: {
      fetchCategorys(){
        fetch('api/category')
        .then(res => res.json())
        .then(res => {
          console.log(res.data);
          this.count = res.count;
          this.categorys = res.data;
        })        
      },
      deleteCategory(id)
      {
        if(confirm('Are you sure?')){
          fetch(`api/category/${id}`,{
            method: 'delete'
          })
          .then(res => res.json())
          .then(data =>{
            console.log(data);
            this.fetchCategorys();
          })
        }
      },
      editCategory(id)
      {
          fetch(`api/category/${id}`,{
            method: 'get'
          })
          .then(res => res.json())
          .then(res =>{
            $('.basicExampleModal').modal('toggle');
            this.category = res.data;
            this.fetchCategorys();
          })
      },
      addCategory()
      {
        fetch('api/category', {
          method: 'post',
          body: JSON.stringify(this.category),
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
            this.fetchCards();
      },
      updateCategory(id)
      {
        fetch(`api/category/${id}`, {
          method: 'put',
          body: JSON.stringify(this.category),
          headers: {
            'content-type': 'application/json'
          }
        })
        .then(res => res.json())
        .then(data => {
          $('.basicExampleModal').modal('toggle');
          this.fetchCategorys();
        })
      }
    }
})