
var example = new Vue({
    el: '#companies',

 
    data() {
      return {
        companys: [],
        company: {
          id: '',
          title: '',
          body: '',
        }, 
        count: '',
        debug: '',
        company_id: '',
        pagination: {},
        edit: false 
      }
    },

    created(){
      this.fetchCompanys();
    },

    methods: {
      fetchCompanys(){
        fetch('api/company')
        .then(res => res.json())
        .then(res => {
          console.log(res.data);
          this.count = res.count;
          this.companys = res.data;
        })        
      },
      deleteCompany(id)
      {
        if(confirm('Are you sure?')){
          fetch(`api/company/${id}`,{
            method: 'delete'
          })
          .then(res => res.json())
          .then(data =>{
            console.log(data);
            this.fetchCompanys();
          })
        }
      },
      editCompany(id)
      {
          fetch(`api/company/${id}`,{
            method: 'get'
          })
          .then(res => res.json())
          .then(res =>{
            $('.basicExampleModal').modal('toggle');
            this.company = res.data;
            this.fetchCompanys();
          })
      },
      addCompany()
      {
        fetch('api/company', {
          method: 'post',
          body: JSON.stringify(this.company),
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
      updateCompany(id)
      {
        fetch(`api/company/${id}`, {
          method: 'put',
          body: JSON.stringify(this.company),
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
