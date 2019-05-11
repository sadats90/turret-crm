var example = new Vue({
    el: '#areas',
  
    data() {
      return {
        areas: [],
        companies: [],
        area: {
          id: '',
          title: '',
          body: '',
        }, 
        count: '',
        debug: [],
        area_id: '',
        pagination: {},
        edit: false
      }
    },

    created(){
      this.fetchAreas();
    },

    methods: {
      fetchAreas(){
        fetch('api/area')
        .then(res => res.json())
        .then(res => {
          console.log(res.data);
          this.count = res.count;
          this.areas = res.data;
          console.log(res.data.slice(2,4));
        })        
      },
      deleteArea(id)
      {
        if(confirm('Are you sure?')){
          fetch(`api/area/${id}`,{
            method: 'delete'
          })
          .then(res => res.json())
          .then(data =>{
            console.log(data);
            this.fetchAreas();
          })
        }
      },
      editArea(id)
      {
        fetch(`api/area/${id}`,{
          method: 'get'
        })
        .then(res => res.json())
        .then(res =>{
          $('.basicExampleModal').modal('toggle');
          this.area = res.data;
          this.companies = res.data.companies;
          this.fetchAreas();
        })
      },
      addArea()
      {
        fetch('api/area', {
          method: 'post',
          body: JSON.stringify(this.area),
          headers: {
            'content-type': 'application/json'
          }
        })
        .then(res => res.json())
        .then(data => {
          if(data.status == 400)
          {
            this.debug = data.errors;
            el.scrollIntoView();
          }
          else
          {
            $('#basicExampleModal').modal('toggle');
            this.fetchAreas();
          }
        })
      },
      updateArea(id)
      {
        fetch(`api/area/${id}`, {
          method: 'put',
          body: JSON.stringify(this.area),
          headers: {
            'content-type': 'application/json'
          }
        })
        .then(res => res.json())
        .then(data => {
          if(data.status == 400)
          {
              this.debug = data.errors;
              el.scrollIntoView();
          }
          else
          {
              $('.basicExampleModal').modal('toggle');
              this.fetchAreas();
          }
        })
      }
    }
  })
