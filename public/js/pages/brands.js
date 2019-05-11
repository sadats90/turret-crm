var example1 = new Vue({
		el: '#brand',
		data() {
			return {
				brands: [],
				brand: {}, 
				count: '',
				brand_id: '',
				debug: '',
				pagination: {},
				edit: false,
				first_page_url: '',
				last_page_url: ''
			}
		},

		created(){
			this.fetchBrands();
		},

		methods: {
			fetchBrands(){
				fetch('api/brand')
				.then(res => res.json())
				.then(res => {
					this.count = res.count;
					this.brands = res.data;
				})				
			},
			deleteBrand(id)
			{
				if(confirm('Are you sure?')){
					fetch(`api/brand/${id}`,{
						method: 'delete'
					})
					.then(res => res.json())
					.then(data =>{
						console.log(data);
						this.fetchBrands();
					})
				}
			},
			editBrand(id)
			{
				fetch(`api/brand/${id}`,{
					method: 'get'
				})
				.then(res => res.json())
				.then(res =>{
					$('.basicExampleModal').modal('toggle');
					this.brand = res.data;
					this.fetchBrands();
				})
			},
			addBrand()
			{
				fetch('api/brand', {
					method: 'post',
					body: JSON.stringify(this.brand),
					headers: {
						'content-type': 'application/json'
					}
				})
				.then(res => res.json())
				.then(res => {
					if(res.status == 101)
					{
						this.debug = res.message;
					}
					else
					{
						$('#basicExampleModal').modal('toggle');
						this.fetchBrands();
					}
				})
			},
			updateBrand(id)
			{
				fetch(`api/brand/${id}`, {
					method: 'put',
					body: JSON.stringify(this.brand),
					headers: {
						'content-type': 'application/json'
					}
				})
				.then(res => res.json())
				.then(data => {
					$('.basicExampleModal').modal('toggle');
					this.fetchBrands();
				})
			}
		}
	})