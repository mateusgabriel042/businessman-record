import Register from '../views/businessmans/Register.vue';
import List from '../views/businessmans/List.vue';
import ViewRede from '../views/businessmans/ViewRede.vue';

const routes = [
	{
		path:'/registrar',
		name:'register',
		component: Register
	},
	{
		path:'/listar',
		name:'list',
		component: List
	},
	{
		path:'/rede/:id',
		name:'viewRede',
		component: ViewRede
	}
];

export default routes;