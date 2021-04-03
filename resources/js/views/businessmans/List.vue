<template>
	<div>
		<h2>Listagem dos empresários</h2>

		<table border="1">
			<thead>
				<th>Nome completo</th>
				<th>Celular</th>
				<th>Cidade/UF</th>
				<th>Cadastro em</th>
				<th>Pai empresarial</th>
				<th>Rede</th>
				<th>-</th>
			</thead>
			<tbody>
				<tr v-for="item in businessmans" :key="item.id">
					<td>{{item.full_name}}</td>
					<td>{{item.cell_phone}}</td>
					<td>{{item.city}}/{{item.uf_state}}</td>
					<td>{{item.registered_in}}</td>
					<td v-if="hasBusinessDad(item)">{{item.business_dad.full_name}}</td>
					<td v-else="hasBusinessDad(item)">-</td>
					<td><router-link :to="{name:'viewRede', params:{id:item.id}}">Rede</router-link></td>
					<td><button type="button" @click="deleteBusinessmans(item.id)">Delete</button></td>
				</tr>
			</tbody>
		</table>
	</div>
</template>

<script type="text/javascript">
	import moment from 'moment';
	export default {
		data(){
	        return {
	            businessmans:[]
	        }
	    },
	    mounted(){
	        this.getBusinessmans()
	    },
	    methods:{
	        async getBusinessmans(){
	            await this.axios.get('/testes/businessman-record/public/api/businessman').then(response=>{
	                this.businessmans = response.data
	                this.businessmans.forEach(function(item) {
						item.registered_in = moment(item.registered_in).format('DD/MM/YYYY hh:mm:ss');
						
					});

	            }).catch(error=>{
	                console.log(error)
	                this.businessmans = []
	            })
	        },

	        deleteBusinessmans(id){
	            if(confirm("Tem certeza que deseja excluir o registro?")){
	                this.axios.delete(`/testes/businessman-record/public/api/businessman/${id}`).then(response=>{
	                    this.getBusinessmans()
	                }).catch(error=>{
	                    console.log(error)
	                })
	            }
	        },

	        hasBusinessDad(item){
	        	if(item.business_dad != null && item.business_dad !== undefined)
	        		return true;
	        }
	    }
	};
</script>