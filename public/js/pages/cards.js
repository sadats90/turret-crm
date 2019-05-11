

         var cards = new Vue({

    el:"#cards",

    data() {
      return {
        cards: [],
        card: {
          id: '',
          title: '',
          body: '',
        }, 
        count: '',
        debug: '',
        card_id: '',
        pagination: {},
        edit: false
      }
    },

    created(){
      this.fetchCards();
    },

    methods: {
      fetchCards(){
        fetch('api/card')
        .then(res => res.json())
        .then(res => {
          console.log(res.data);
          this.count = res.count;
          this.cards = res.data;
        })        
      },
      deleteCard(id)
      {
        if(confirm('Are you sure?')){
          fetch(`api/card/${id}`,{
            method: 'delete'
          })
          .then(res => res.json())
          .then(data =>{
            console.log(data);
            this.fetchCards();
          })
        }
      },
      editCard(id)
      {
          fetch(`api/card/${id}`,{
            method: 'get'
          })
          .then(res => res.json())
          .then(res =>{
            $('.basicExampleModal').modal('toggle');
            this.card = res.data;
            this.fetchCards();
          })
      },
      addCard()
      {
        fetch('api/card', {
          method: 'post',
          body: JSON.stringify(this.card),
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
            this.fetchCards();
          }
        })
      },
      updateCard(id)
      {
        fetch(`api/card/${id}`, {
          method: 'put',
          body: JSON.stringify(this.card),
          headers: {
            'content-type': 'application/json'
          }
        })
        .then(res => res.json())
        .then(data => {
          $('.basicExampleModal').modal('toggle');
          this.fetchCards();
        })
      }
    }
  })
