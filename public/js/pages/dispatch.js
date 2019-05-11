var example = new Vue({
    el: '#dispatch',

    data() {
      return {
        dispatchs: [],
        dispatch: {
          id: '',
          title: '',
          body: '',
        }, 
        count: '',
        debug: '',
        dispatch_id: '',
        pagination: {},
        edit: false
      }
    },

    created(){
      this.fetchDispatchs();
    },

    methods: {
      fetchDispatchs(){
        fetch('api/dispatch')
        .then(res => res.json())
        .then(res => {
          console.log(res.data);
          this.count = res.count;
          this.dispatchs = res.data;
        })        
      },
      deleteDispatch(id)
      {
        if(confirm('Are you sure?')){
          fetch(`api/dispatch/${id}`,{
            method: 'delete'
          })
          .then(res => res.json())
          .then(data =>{
            console.log(data);
            this.fetchDispatchs();
          })
        }
      },
      editDispatch(id)
      {
          fetch(`api/dispatch/${id}`,{
            method: 'get'
          })
          .then(res => res.json())
          .then(res =>{
            $('.basicExampleModal').modal('toggle');
            this.dispatch = res.data;
            this.fetchDispatchs();
          })
      },
      addDispatch()
      {
        fetch('api/dispatch', {
          method: 'post',
          body: JSON.stringify(this.dispatch),
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
            this.fetchDispatchs();
          }
        })
      },
      updateDispatch(id)
      {
        fetch(`api/dispatch/${id}`, {
          method: 'put',
          body: JSON.stringify(this.dispatch),
          headers: {
            'content-type': 'application/json'
          }
        })
        .then(res => res.json())
        .then(data => {
          $('.basicExampleModal').modal('toggle');
          this.fetchDispatchs();
        })
      }
    }
  })
