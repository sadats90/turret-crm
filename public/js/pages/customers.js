

var example = new Vue({
    el: '#customer',

    data() {
      return {
        customers: [],
        customer: {
          id: '',
          title: '',
          body: '',
        }, 
        count: '',
        debug: '',
        customer_id: '',
        pagination: {},
        edit: false
      }
    },

    created(){
      this.fetchCustomers();
    },

    methods: {
      fetchCustomers(){
        fetch('api/customer')
        .then(res => res.json())
        .then(res => {
          console.log(res.data);
          this.count = res.count;
          this.customers = res.data;
        })        
      },
      deleteCustomer(id)
      {
        if(confirm('Are you sure?')){
          fetch(`api/customer/${id}`,{
            method: 'delete'
          })
          .then(res => res.json())
          .then(data =>{
            console.log(data);
            this.fetchCustomers();
          })
        }
      },
      editCustomer(id)
      {
          fetch(`api/customer/${id}`,{
            method: 'get'
          })
          .then(res => res.json())
          .then(res =>{
            $('.basicExampleModal').modal('toggle');
            this.customer = res.data;
            this.fetchCustomers();
          })
      },
      addCustomer()
      {
        fetch('api/customer', {
          method: 'post',
          body: JSON.stringify(this.customer),
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
            this.fetchCustomers();
          }
        })
      },
      updateCustomer(id)
      {
        fetch(`api/customer/${id}`, {
          method: 'put',
          body: JSON.stringify(this.customer),
          headers: {
            'content-type': 'application/json'
          }
        })
        .then(res => res.json())
        .then(data => {
          $('.basicExampleModal').modal('toggle');
          this.fetchCustomers();
        })
      }
    }
})