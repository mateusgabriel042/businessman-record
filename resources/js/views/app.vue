<template>
	<div>
		<router-link :to="{name: 'register'}">Cadastrar</router-link>
		<router-link :to="{name: 'list'}">Listar</router-link>
		<div class="container">
			<p>Cadastro de Empresários</p>
			<router-view></router-view>
		</div>
	</div>
</template>

<script type="text/javascript">
	export default {
		
	};
</script>