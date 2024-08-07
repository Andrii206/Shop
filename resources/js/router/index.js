import { createRouter, createWebHistory } from 'vue-router';

const routes = [
  {
    path: '/',
    name: 'products.index',
    component: () => import('../views/product/Index.vue')
  },
  {
    path: '/products/:id',
    name: 'products.show',
    component: () => import('../views/product/Show.vue')
  },
  {
    path: '/products/cart',
    name: 'products.cart',
    component: () => import('../views/product/Cart.vue')
  },
  {
    path: '/products/wishlist',
    name: 'products.wishlist',
    component: () => import('../views/product/Wishlist.vue')
  },
  {
    path: '/products/compare',
    name: 'products.compare',
    component: () => import('../views/product/Compare.vue')
  },
];

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes,
});

export default router;
