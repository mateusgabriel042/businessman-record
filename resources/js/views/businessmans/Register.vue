<template>
	<div>
		<h2>Registro dos empresários</h2>
		<form @submit.prevent="createBusinessman">
			<div>
				<label>Nome completo:</label>
				<input type="text" name="full_name" v-model="businessman.full_name" />
			</div>
			<div>
				<label>Celular:</label>
				<input type="text" name="cell_phone" v-model="businessman.cell_phone"/>
			</div>
			<div>
				<label>Estado:</label>
				<select name="state" @change="changeState($event)">
					<option v-for="item in states" :key="item.id" :value="item.id">{{item.nome}}</option>
				</select>
			</div>
			<div>
				<label>Cidade:</label>
				<select name="city" @change="changeCity($event)" v-model="businessman.id_city">
					<option v-for="item in cities" :key="item.id" :value="item.id">{{item.nome}}</option>
				</select>
			</div>
			<div>
				<label>Pai empresarial:</label>
				<select name="id_business_dad" v-model="businessman.id_business_dad">
					<option selected="selected">Selecionar</option>
					<option v-for="item in business_dad" :key="item.id" :value="item.id">{{item.full_name}}</option>
				</select>
			</div>
			<div>
				<input type="submit" value="Cadastrar empresário" />
			</div>
		</form>
	</div>
</template>

<script type="text/babel">
	export default {
		data(){
			return {
				businessman: {
					full_name: '',
					cell_phone: '',
					id_state: '',
					state: '',
					uf_state: '',
					id_city: '',
					city: '',
					id_business_dad: null
				},

				states: [],
				cities: [],
				business_dad: []
			}
		},

		mounted(){
			this.getStates()
			this.getBusinessDad()
		},

		methods: {

			async createBusinessman(){
		        await this.axios.post('/testes/businessman-record/public/api/businessman',this.businessman).then(response=>{
		            this.$router.push({name:"list"})
		        }).catch(error=>{
		            console.log(error)
		        })
		    },

		    async getStates(){
	            await this.axios.get('https://servicodados.ibge.gov.br/api/v1/localidades/estados').then(response=>{
	                this.states = response.data
	            }).catch(error=>{
	                console.log(error)
	                this.states = []
	            })
	        },

	        async changeState(event){
	        	this.businessman.id_state = event.target.value;
	        	this.businessman.state = this.states.find(element => element.id == event.target.value).nome;
	        	this.businessman.uf_state = this.states.find(element => element.id == event.target.value).sigla;
	        	console.log(this.businessman.id_state)
	        	console.log(this.businessman.state)
	        	console.log(this.businessman.uf_state)

	            await this.axios.get(`https://servicodados.ibge.gov.br/api/v1/localidades/estados/${event.target.value}/municipios`).then(response=>{
	                this.cities = response.data
	            }).catch(error=>{
	                console.log(error)
	                this.cities = []
	            })
	        },

	        async changeCity(event){	            
	                this.businessman.id_city = event.target.value;
	        		this.businessman.city = this.cities.find(element => element.id == event.target.value).nome;

	                console.log(this.businessman.id_city);
	                console.log(this.businessman.city);
	        },

		    async getBusinessDad(){
	            await this.axios.get('/testes/businessman-record/public/api/businessman').then(response=>{
	                this.business_dad = response.data
	            }).catch(error=>{
	                console.log(error)
	                this.business_dad = []
	            })
	        }
		}

	};
</script>