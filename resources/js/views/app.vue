<template>
	<div>
		{{message}}
	</div>
</template>

<script type="text/babel">
	const default_layout = "default";

	export default {
		computed: {},

		data() {
			return {
				message: 'Hello World',
			}
		}
	};
</script>