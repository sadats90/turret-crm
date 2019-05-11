

var example = new Vue({
    el: '#sizes',



    data() {
      return {
        sizes: [],
        size: {
          id: '',
          title: '',
          body: '',
        }, 
        count: '',
        debug: '',
        size_id: '',
        pagination: {},
        edit: false
      }
    },

    created(){
      this.fetchSizes();
    },

    methods: {
      fetchSizes(){
        fetch('api/size')
        .then(res => res.json())
        .then(res => {
          console.log(res.data);
          this.count = res.count;
          this.sizes = res.data;
        })        
      },
      deleteSize(id)
      {
        if(confirm('Are you sure?')){
          fetch(`api/size/${id}`,{
            method: 'delete'
          })
          .then(res => res.json())
          .then(data =>{
            console.log(data);
            this.fetchSizes();
          })
        }
      },
      editSize(id)
      {
          fetch(`api/size/${id}`,{
            method: 'get'
          })
          .then(res => res.json())
          .then(res =>{
            $('.basicExampleModal').modal('toggle');
            this.size = res.data;
            this.fetchSizes();
          })
      },
      addSize()
      {
        fetch('api/size', {
          method: 'post',
          body: JSON.stringify(this.size),
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
            this.fetchSizes();
          }
        })
      },
      updateSize(id)
      {
        fetch(`api/size/${id}`, {
          method: 'put',
          body: JSON.stringify(this.size),
          headers: {
            'content-type': 'application/json'
          }
        })
        .then(res => res.json())
        .then(data => {
          $('.basicExampleModal').modal('toggle');
          this.fetchSizes();
        })
      }
    }
  })