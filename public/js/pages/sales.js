
var example = new Vue({
    el: '#sales',

    data() {
      return {
        saless: [],
        sales: {
          id: '',
          title: '',
          body: '',
        }, 
        count: '',
        debug: '',
        sales_id: '',
        pagination: {},
        edit: false
      }
    },

    created(){
      this.fetchSaless();
    },

    methods: {
      fetchSaless(){
        fetch('api/sales')
        .then(res => res.json())
        .then(res => {
          console.log(res.data);
          this.count = res.count;
          this.saless = res.data;
        })        
      },
      deleteSales(id)
      {
        if(confirm('Are you sure?')){
          fetch(`api/sales/${id}`,{
            method: 'delete'
          })
          .then(res => res.json())
          .then(data =>{
            console.log(data);
            this.fetchSaless();
          })
        }
      },
      editSales(id)
      {
          fetch(`api/sales/${id}`,{
            method: 'get'
          })
          .then(res => res.json())
          .then(res =>{
            $('.basicExampleModal').modal('toggle');
            this.sales = res.data;
            this.fetchSaless();
          })
      },
      addSales()
      {
        fetch('api/sales', {
          method: 'post',
          body: JSON.stringify(this.sales),
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
            this.fetchSales();
          }
        })
      },
      updateSales(id)
      {
        fetch(`api/sales/${id}`, {
          method: 'put',
          body: JSON.stringify(this.sales),
          headers: {
            'content-type': 'application/json'
          }
        })
        .then(res => res.json())
        .then(data => {
          $('.basicExampleModal').modal('toggle');
          this.fetchSaless();
        })
      }
    }
  })
