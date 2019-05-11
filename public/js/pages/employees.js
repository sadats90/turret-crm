var example = new Vue({
    el: '#employee',


    data() {
      return {
        employees: [],
        employee: {
          id: '',
          title: '',
          body: '',
        }, 
        count: '',
        debug: '',
        employee_id: '',
        pagination: {},
        edit: false
      }
    },

    created(){
      this.fetchEmployees();
    },

    methods: {
      fetchEmployees(){
        fetch('api/employee')
        .then(res => res.json())
        .then(res => {
          console.log(res.data);
          this.count = res.count;
          this.employees = res.data;
        })        
      },
      deleteEmployee(id)
      {
        if(confirm('Are you sure?')){
          fetch(`api/employee/${id}`,{
            method: 'delete'
          })
          .then(res => res.json())
          .then(data =>{
            console.log(data);
            this.fetchEmployees();
          })
        }
      },
      editEmployee(id)
      {
          fetch(`api/employee/${id}`,{
            method: 'get'
          })
          .then(res => res.json())
          .then(res =>{
            $('.basicExampleModal').modal('toggle');
            this.employee = res.data;
            this.fetchEmployees();
          })
      },
      addEmployee()
      {
        fetch('api/employee', {
          method: 'post',
          body: JSON.stringify(this.employee),
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
            this.fetchEmployees();
          }
        })
      },
      updateEmployee(id)
      {
        fetch(`api/employee/${id}`, {
          method: 'put',
          body: JSON.stringify(this.employee),
          headers: {
            'content-type': 'application/json'
          }
        })
        .then(res => res.json())
        .then(data => {
          $('.basicExampleModal').modal('toggle');
          this.fetchEmployees();
        })
      }
    }
  })
