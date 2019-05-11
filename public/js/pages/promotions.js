var example = new Vue({
    el: '#promotions',

    data() {
      return {
        promotions: [],
        promotion: {
          id: '',
          title: '',
          body: '',
        }, 
        count: '',
        debug: '',
        promotion_id: '',
        pagination: {},
        edit: false
      }
    },

    created(){
      this.fetchPromotions();
    },

    methods: {
      fetchPromotions(){
        fetch('api/promotion')
        .then(res => res.json())
        .then(res => {
          console.log(res.data);
          this.count = res.count;
          this.promotions = res.data;
        })        
      },
      deletePromotion(id)
      {
        if(confirm('Are you sure?')){
          fetch(`api/promotion/${id}`,{
            method: 'delete'
          })
          .then(res => res.json())
          .then(data =>{
            console.log(data);
            this.fetchPromotions();
          })
        }
      },
      editPromotion(id)
      {
          fetch(`api/promotion/${id}`,{
            method: 'get'
          })
          .then(res => res.json())
          .then(res =>{
            $('.basicExampleModal').modal('toggle');
            this.promotion = res.data;
            this.fetchPromotions();
          })
      },
      addPromotion()
      {
        fetch('api/promotion', {
          method: 'post',
          body: JSON.stringify(this.promotion),
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
            this.fetchPromotions();
          }
        })
      },
      updatePromotion(id)
      {
        fetch(`api/promotion/${id}`, {
          method: 'put',
          body: JSON.stringify(this.promotion),
          headers: {
            'content-type': 'application/json'
          }
        })
        .then(res => res.json())
        .then(data => {
          $('.basicExampleModal').modal('toggle');
          this.fetchPromotions();
        })
      }
    }
  
  })
