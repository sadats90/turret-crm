
var example = new Vue({
    el: '#district',

    data() {
      return {
        districts: [],
        areas: [],
        district: {
          id: '',
          title: '',
          body: '',
        }, 
        count: '',
        debug: '',
        district_id: '',
        pagination: {},
        edit: false
      }
    },

    created(){
      this.fetchDistricts();
    },

    methods: {
      fetchDistricts(){
        fetch('api/district')
        .then(res => res.json())
        .then(res => {
          console.log(res.data);
          this.count = res.count;
          this.districts = res.data;
        })        
      },
      deleteDistrict(id)
      {
        if(confirm('Are you sure?')){
          fetch(`api/district/${id}`,{
            method: 'delete'
          })
          .then(res => res.json())
          .then(data =>{
            console.log(data);
            this.fetchDistricts();
          })
        }
      },
      editDistrict(id)
      {
          this.debug = '';
          fetch(`api/district/${id}`,{
            method: 'get'
          })
          .then(res => res.json())
          .then(res =>{
            $('.basicExampleModal').modal('toggle');
            this.district = res.data;
            this.areas = res.data.areas;
            this.fetchDistricts();
          })
      },
      addDistrict()
      {
          this.debug = '';
        fetch('api/district', {
          method: 'post',
          body: JSON.stringify(this.district),
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
      updateDistrict(id)
      {
          this.debug = '';
        fetch(`api/district/${id}`, {
          method: 'put',
          body: JSON.stringify(this.district),
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
