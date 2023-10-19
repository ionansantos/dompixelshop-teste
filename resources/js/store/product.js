// store.js
import { createStore } from 'vuex';
import axiosApi from '../plugin/axios';
import axios from 'axios';
import { createToaster } from "@meforma/vue-toaster";

const toaster = createToaster({ /* options */ });

export default createStore({
  state: {
    products: [] // Defina o estado inicial de produtos como uma matriz vazia
  },
  mutations: {
    setProducts(state, products) {
      state.products = products;
    },
  },
  actions: {
    getProducts({ commit }) {
      return axiosApi.get('/product') // Use 'get' para buscar produtos
        .then(response => {
            console.log(response, 'product');
            commit('setProducts', response);
        })
        .catch(error => {
          console.log(error);
          return false;
        });
    },
  },
});
