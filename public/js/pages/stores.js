var example = new Vue({
    el: '#stores',


    data() {
      return {
        stores: [],
        store: {
          id: '',
          title: '',
          body: '',
        }, 
        count: '',
        debug: '',
        store_id: '',
        pagination: {},
        edit: false
      }
    },

    created(){
      this.fetchStores();
    },

    methods: {
      fetchStores(){
        fetch('api/store')
        .then(res => res.json())
        .then(res => {
          console.log(res.data);
          this.count = res.count;
          this.stores = res.data;
        })        
      },
      deleteStore(id)
      {
        if(confirm('Are you sure?')){
          fetch(`api/store/${id}`,{
            method: 'delete'
          })
          .then(res => res.json())
          .then(data =>{
            console.log(data);
            this.fetchStores();
          })
        }
      },
      editStore(id)
      {
          fetch(`api/store/${id}`,{
            method: 'get'
          })
          .then(res => res.json())
          .then(res =>{
            $('.basicExampleModal').modal('toggle');
            this.store = res.data;
            this.fetchStores();
          })
      },
      addStore()
      {
        fetch('api/store', {
          method: 'post',
          body: JSON.stringify(this.store),
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
            this.fetchStores();
          }
        })
      },
      updateStore(id)
      {
        fetch(`api/store/${id}`, {
          method: 'put',
          body: JSON.stringify(this.store),
          headers: {
            'content-type': 'application/json'
          }
        })
        .then(res => res.json())
        .then(data => {
          $('.basicExampleModal').modal('toggle');
          this.fetchStores();
        })
      }
    }
  })