<template>
	<div>
		<h2>Rede do empresáario: {{businessman.full_name}}</h2>

		<div v-html="listRede">
		</div>
	</div>
</template>

<script type="text/javascript">
	
	export default {
		data(){
	        return {
	            businessman: [],
	            listRede: ''
	        }
	    },
	    mounted(){
	        this.showBusinessman()
	        
	    },
	    methods:{
	        async showBusinessman(){
	            await this.axios.get(`/testes/businessman-record/public/api/businessman/${this.$route.params.id}`).then(response=>{
	                this.businessman = response.data

	                this.listRede = this.printListRede(this.businessman)
	            }).catch(error=>{
	                console.log(error)
	            })
	        },

	        printListRede(list){
	        	let html = '<ul>';

				(function printRede(list, index) {
				    html += `<li>${list.full_name}`;

				    if(list.all_sub_businessmans) {
				        html += `<ul>`;
				        list.all_sub_businessmans.forEach((sublist, index) => printRede(sublist, index + 1));
				        html += '</ul>';
				    }

				    html += '</li>';
				})(list, 0);

				html += '</ul>';


	        	console.log(html);

	        	return html;
	        }
	    }
	};
</script>