var example = new Vue({
    el: '#receives',


    data() {
      return {
        receives: [],
        receive: {
          id: '',
          title: '',
          body: '',
        }, 
        count: '',
        debug: '',
        receive_id: '',
        pagination: {},
        edit: false
      }
    },

    created(){
      this.fetchReceives();
    },

    methods: {
      fetchReceives(){
        fetch('api/receive')
        .then(res => res.json())
        .then(res => {
          console.log(res.data);
          this.count = res.count;
          this.receives = res.data;
        })        
      },
      deleteReceive(id)
      {
        if(confirm('Are you sure?')){
          fetch(`api/receive/${id}`,{
            method: 'delete'
          })
          .then(res => res.json())
          .then(data =>{
            console.log(data);
            this.fetchReceives();
          })
        }
      },
      editReceive(id)
      {
          fetch(`api/receive/${id}`,{
            method: 'get'
          })
          .then(res => res.json())
          .then(res =>{
            $('.basicExampleModal').modal('toggle');
            this.receive = res.data;
            this.fetchReceives();
          })
      },
      addReceive()
      {
        fetch('api/receive', {
          method: 'post',
          body: JSON.stringify(this.receive),
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
            this.fetchReceives();
          }
        })
      },
      updateReceive(id)
      {
        fetch(`api/receive/${id}`, {
          method: 'put',
          body: JSON.stringify(this.receive),
          headers: {
            'content-type': 'application/json'
          }
        })
        .then(res => res.json())
        .then(data => {
          $('.basicExampleModal').modal('toggle');
          this.fetchReceives();
        })
      }
    }
  })
