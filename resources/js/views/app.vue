<template>
	<div class="area-app">
		<div class="container">
			<h1>Cadastro de Empresários</h1>
			<nav>
				<router-link :to="{name: 'register'}">Cadastrar</router-link>
				<router-link :to="{name: 'list'}">Listar</router-link>
			</nav>
			<router-view class="main-area"></router-view>
		</div>
	</div>
</template>

<script type="text/javascript">
	export default {
		
	};
</script>