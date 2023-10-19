// store.js
import axiosApi from '../plugin/axios';
import { createStore } from 'vuex';

export default createStore({
  state: {
    products: [], // Estado para armazenar os produtos
  },
  getters: {
    getProducts: (state) => state.products,
  },
  mutations: {
    // Mutação para atualizar a lista de produtos
    setProducts(state, products) {
      state.products = products;
    },
    // Mutação para adicionar um novo produto
    addProduct(state, product) {
      state.products.push(product);
    },
    // Mutação para atualizar um produto existente
    updateProduct(state, updatedProduct) {
      const index = state.products.findIndex((p) => p.id === updatedProduct.id);
      if (index !== -1) {
        state.products[index] = updatedProduct;
      }
    },

    // Mutação para remover um produto
    removeProduct(state, productId) {
      state.products = state.products.filter((p) => p.id !== productId);
    },
  },
  actions: {
    // Ações para buscar a lista de produtos do servidor
    async fetchProducts({ commit }) {
      const response = await axiosApi.get('/product');
      console.log(response);
      commit('setProducts', response.data);
    },
    // Ação para criar um novo produto
    async createProduct({ commit }, productData) {
      const response = await axiosApi.post('/product/create', productData);
      commit('addProduct', response.data);
    },
    // Ação para atualizar um produto existente
    async updateExistingProduct({ commit }, updatedProductData) {
      const response = await axiosApi.put(`/product/update/${updatedProductData.id}`, updatedProductData);
      commit('updateProduct', response.data);
    },
    // Ação para remover um produto
    async deleteProduct({ commit }, productId) {
      await axiosApi.delete(`/product/delete/${productId}`);
      commit('removeProduct', productId);
    },
  },
});
