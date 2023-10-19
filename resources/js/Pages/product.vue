<template>
    <section class="intro">
        <div class="bg-image">
            <div class="mask d-flex align-items-center">
                <productCard :modalOpen="modalOpen" @closeModal="closeModal" :productData="product" />
                <div class="container">
                    <h1 class="text-center">Catálogo de Produtos</h1>
                    <div class="row justify-content-center mt-3">
                        <div class="col-12">
                            <div class="card shadow-2-strong" style="background-color: #f5f7fa;">
                                <div class="card-body">
                                    <button type="button" class="btn btn-primary position-absolute top-0 end-0 mt-3 me-3"
                                        @click="openModal">
                                        Novo
                                    </button>
                                    <div class="table-responsive">
                                        <table class="table table-borderless">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Nome</th>
                                                    <th scope="col">Descrição</th>
                                                    <th scope="col">Preço</th>
                                                    <th scope="col" class="d-none d-md-table-cell">Quantidade</th>
                                                    <th scope="col"></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr v-for="product in products" :key="product.id">
                                                    <td class="text-left">{{ product.name }}</td>
                                                    <td class="text-left">{{ product.description }}</td>
                                                    <td class="text-left">R$ {{ product.price }}</td>
                                                    <td class="text-left d-none d-md-table-cell">{{ product.quantity }}</td>
                                                    <td class="text-right">
                                                        <button type="button" @click="removeProduct(product.id)"
                                                            class="btn btn-danger btn-sm px-3 me-1">
                                                            <i class="ri-close-circle-line"></i>
                                                        </button>
                                                        <button type="button" @click="editProduct(product.id)"
                                                            class="btn btn-warning btn-sm px-3">
                                                            <i class="ri-edit-line"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <Footer />
</template>

<script lang="js">
import { defineComponent, onMounted, ref } from 'vue';
import axiosApi from '../plugin/axios';
import productCard from '../components/productCard.vue'

export default defineComponent({
    name: "product",
    components: {
        productCard, // Registre o componente
    },
    setup() {
        const products = ref([]);
        const product = ref([])
        const modalOpen = ref(false);

        const openModal = () => {
            modalOpen.value = true;
        };

        const closeModal = () => {
            modalOpen.value = false;
        };

        const fetchProducts = () =>
            axiosApi.get("/product").then(res => {
                products.value = res.data;
            });

        const editProduct = (productId) => {
            axiosApi.get("/product/get/" + productId).then(res => {
                product.value = res.data;
                modalOpen.value = true;
            });
            // Implemente a lógica para editar o produto com o ID `productId`
        };

        const removeProduct = (productId) => {
            console.log(productId);
            // Implemente a lógica para remover o produto com o ID `productId`
        };

        onMounted(fetchProducts);

        return {
            products,
            product,
            editProduct,
            removeProduct,
            openModal,
            modalOpen,
            closeModal
        };
    },
});
</script>


