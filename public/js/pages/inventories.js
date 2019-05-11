var example = new Vue({
    el: '#inventories',

    data() {
      return {
        inventorys: [],
        inventory: {
          id: '',
          title: '',
          body: '',
        }, 
        count: '',
        debug: '',
        inventory_id: '',
        pagination: {},
        edit: false
      }
    },

    created(){
      this.fetchInventorys();
    },

    methods: {
      fetchInventorys(){
        fetch('api/inventory')
        .then(res => res.json())
        .then(res => {
          console.log(res.data);
          this.count = res.count;
          this.inventorys = res.data;
        })        
      },
      deleteInventory(id)
      {
        if(confirm('Are you sure?')){
          fetch(`api/inventory/${id}`,{
            method: 'delete'
          })
          .then(res => res.json())
          .then(data =>{
            console.log(data);
            this.fetchInventorys();
          })
        }
      },
      editInventory(id)
      {
          fetch(`api/inventory/${id}`,{
            method: 'get'
          })
          .then(res => res.json())
          .then(res =>{
            $('.basicExampleModal').modal('toggle');
            this.inventory = res.data;
            this.fetchInventorys();
          })
      },
      addInventory()
      {
        fetch('api/inventory', {
          method: 'post',
          body: JSON.stringify(this.inventory),
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
            this.fetchInventories();
          }
        })
      },
      updateInventory(id)
      {
        fetch(`api/inventory/${id}`, {
          method: 'put',
          body: JSON.stringify(this.inventory),
          headers: {
            'content-type': 'application/json'
          }
        })
        .then(res => res.json())
        .then(data => {
          $('.basicExampleModal').modal('toggle');
          this.fetchInventorys();
        })
      }
    }
  })
