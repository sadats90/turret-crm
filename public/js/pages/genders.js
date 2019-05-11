

var example = new Vue({
    el: '#genders',

    data() {
      return {
        genders: [],
        gender: {
          id: '',
          title: '',
          body: '',
        }, 
        count: '',
        debug: '',
        gender_id: '',
        pagination: {},
        edit: false
      }
    },

    created(){
      this.fetchGenders();
    },

    methods: {
      fetchGenders(){
        fetch('api/gender')
        .then(res => res.json())
        .then(res => {
          console.log(res.data);
          this.count = res.count;
          this.genders = res.data;
        })        
      },
      deleteGender(id)
      {
        if(confirm('Are you sure?')){
          fetch(`api/gender/${id}`,{
            method: 'delete'
          })
          .then(res => res.json())
          .then(data =>{
            console.log(data);
            this.fetchGenders();
          })
        }
      },
      editGender(id)
      {
          fetch(`api/gender/${id}`,{
            method: 'get'
          })
          .then(res => res.json())
          .then(res =>{
            $('.basicExampleModal').modal('toggle');
            this.gender = res.data;
            this.fetchGenders();
          })
      },
      addGender()
      {
        fetch('api/gender', {
          method: 'post',
          body: JSON.stringify(this.gender),
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
            this.fetchGenders();
          }
        })
      },
      updateGender(id)
      {
        fetch(`api/gender/${id}`, {
          method: 'put',
          body: JSON.stringify(this.gender),
          headers: {
            'content-type': 'application/json'
          }
        })
        .then(res => res.json())
        .then(data => {
          $('.basicExampleModal').modal('toggle');
          this.fetchGenders();
        })
      }
    }
  })
