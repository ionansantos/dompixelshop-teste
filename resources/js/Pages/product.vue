<template>
    <section class="intro">
        <div class="bg-image">
            <div class="mask d-flex align-items-center">
                <productCard :modalOpen="modalOpen" @closeModal="closeModal" :productData="product"
                    :editingProductId="ProductId" @save-product="SaveProduct" />
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
import { createToaster } from "@meforma/vue-toaster";

export default defineComponent({
    name: "product",
    components: {
        productCard, // Registre o componente
    },
    setup() {
        const products = ref([]);
        const product = ref([])
        const modalOpen = ref(false);
        const ProductId = ref();

        const toaster = createToaster({ /* options */ });

        const openModal = () => {
            modalOpen.value = true;
        };

        const closeModal = () => {
            modalOpen.value = false;
            ProductId.value = null;
        };

        const fetchProducts = () =>
            axiosApi.get("/product").then(res => {
                products.value = res.data;
            });

        const editProduct = (productId) => {
            axiosApi.get("/product/get/" + productId).then(res => {
                product.value = res.data;
                ProductId.value = productId;
                modalOpen.value = true;
            });
            // Implemente a lógica para editar o produto com o ID `productId`
        };

        const SaveProduct = (productData) => {
            if (productData.id) {
                axiosApi.post("/product/update/" + productData.id)
                    .then(response => {
                        toaster.success('Produto atualizado com sucesso!');

                        setTimeout(() => {
                            toaster.clear();
                            window.location.reload();
                        }, 2000);
                    }).catch(error => {
                        toaster.error(error);
                    });
            } else {
                axiosApi.post("/product/create", productData, {})
                    .then(response => {
                        toaster.success('Produto cadastrado com sucesso!');

                        setTimeout(() => {
                            toaster.clear();
                            window.location.reload();
                        }, 2000);
                    }).catch(error => {
                        toaster.error(`não foi cadastrar o produto !`);
                    });
            }
        }

        const removeProduct = (productId) => {
            axiosApi.delete("/product/delete/" + productId)
                .then(response => {
                    toaster.success(`produto removido com sucesso !`);
                    setTimeout(() => {
                        toaster.clear();
                        window.location.reload();
                    }, 2000);
                })
                .catch(error => {
                    toaster.error(`erro ao remover o produto !`);
                    console.log(error);
                });
        };

        onMounted(fetchProducts);

        return {
            products,
            product,
            ProductId,
            editProduct,
            SaveProduct,
            removeProduct,
            openModal,
            modalOpen,
            closeModal,
        };
    },
});
</script>


