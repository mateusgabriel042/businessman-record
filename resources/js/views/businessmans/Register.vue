<template>
	<div>
		<label>Formulário de cadastro dos empresários</label>
		<form @submit.prevent="createBusinessman">
			<div>
				<label>Nome completo: <span v-if="allerrors.full_name" >{{allerrors.full_name[0]}}</span></label>
				<input type="text" name="full_name" v-model="businessman.full_name" />
			</div>
		
			<div>
				<label>Celular: <span v-if="allerrors.cell_phone" >{{allerrors.cell_phone[0]}}</span></label>
				<input type="text" name="cell_phone" v-mask="'(##) #####-####'" v-model="businessman.cell_phone"/>
			</div>
		
			<div>
				<label>Estado: <span v-if="allerrors.uf_state">{{allerrors.uf_state[0]}}</span></label>
				<select name="state" @change="changeState($event)">
					<option v-for="item in states" :key="item.id" :value="item.id">{{item.nome}}</option>
				</select>
			</div>
		
			<div>
				<label>Cidade: <span v-if="allerrors.city">{{allerrors.city[0]}}</span></label>
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

			<div class="row">
				<input type="submit" value="Cadastrar empresário"></input>
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
				business_dad: [],

				allerrors: []
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
		        	this.allerrors = error.response.data.errors;
		        })
		    },

		    async getStates(){
	            await this.axios.get('https://servicodados.ibge.gov.br/api/v1/localidades/estados').then(response=>{
	                this.states = response.data.sort(function (a, b) {
						return (a.nome > b.nome) ? 1 : ((b.nome > a.nome) ? -1 : 0);
					});
					console.log();
	            }).catch(error=>{
	                console.log(error)
	                this.states = []
	            })
	        },

	        async changeState(event){
	        	this.businessman.id_state = event.target.value;
	        	this.businessman.state = this.states.find(element => element.id == event.target.value).nome;
	        	this.businessman.uf_state = this.states.find(element => element.id == event.target.value).sigla;

	            await this.axios.get(`https://servicodados.ibge.gov.br/api/v1/localidades/estados/${event.target.value}/municipios`).then(response=>{
	                this.cities = response.data.sort(function (a, b) {
						return (a.nome > b.nome) ? 1 : ((b.nome > a.nome) ? -1 : 0);
					});
	            }).catch(error=>{
	                console.log(error)
	                this.cities = []
	            })
	        },

	        async changeCity(event){	            
	                this.businessman.id_city = event.target.value;
	        		this.businessman.city = this.cities.find(element => element.id == event.target.value).nome;
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