
var example = new Vue({
    el: '#concepts',

    data() {
      return {
        concepts: [],
        concept: {
          id: '',
          title: '',
          body: '',
        }, 
        count: '',
        debug: '',
        concept_id: '',
        pagination: {},
        edit: false
      }
    },

    created(){
      this.fetchConcepts();
    },

    methods: {
      fetchConcepts(){
        fetch('api/concept')
        .then(res => res.json())
        .then(res => {
          console.log(res.data);
          this.count = res.count;
          this.concepts = res.data;
        })        
      },
      deleteConcept(id)
      {
        if(confirm('Are you sure?')){
          fetch(`api/concept/${id}`,{
            method: 'delete'
          })
          .then(res => res.json())
          .then(data =>{
            console.log(data);
            this.fetchConcepts();
          })
        }
      },
      editConcept(id)
      {
          fetch(`api/concept/${id}`,{
            method: 'get'
          })
          .then(res => res.json())
          .then(res =>{
            $('.basicExampleModal').modal('toggle');
            this.concept = res.data;
            this.fetchConcepts();
          })
      },
      addConcept()
      {
        fetch('api/concept', {
          method: 'post',
          body: JSON.stringify(this.concept),
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
            this.fetchConcepts();
          }
        })
      },
      updateConcept(id)
      {
        fetch(`api/concept/${id}`, {
          method: 'put',
          body: JSON.stringify(this.concept),
          headers: {
            'content-type': 'application/json'
          }
        })
        .then(res => res.json())
        .then(data => {
          $('.basicExampleModal').modal('toggle');
          this.fetchConcepts();
        })
      }
    }
 
 })