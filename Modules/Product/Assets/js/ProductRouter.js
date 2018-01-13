import ProductManager from './pages/ProductManager.vue'

export default [
    // Product Routes
    {
        path: '/product/products',
        name: 'admin.product.product.index',
        component: ProductManager,
    }
];
