import Register from '../views/businessmans/Register.vue';
import List from '../views/businessmans/List.vue';
import ViewRede from '../views/businessmans/ViewRede.vue';
import Edit from '../views/businessmans/Edit.vue';

const routes = [
	{
		path:'/',
		name:'register',
		component: Register
	},
	{
		path:'/listar',
		name:'list',
		component: List
	},
	{
		path:'/edit/:id',
		name:'edit',
		component: Edit
	},
	{
		path:'/rede/:id',
		name:'viewRede',
		component: ViewRede
	}
];

export default routes;