<template>
    <div>
        <div v-if="modalOpen" class="modal">
            <div class="container col-md-6 col-12" role="dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">{{ editingProductId ? 'Editar Produto' : 'Cadastro de Produto' }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" @click="closeModal"></button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="mb-3">
                                <label for="nome" class="form-label">Nome do Produto <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="nome" placeholder="Digite o nome do produto"
                                    v-model="productName" required>
                                <p class="text-danger">{{ erroInput ? erroInput['name'][0] : '' }}</p>
                            </div>
                            <div class="mb-3">
                                <label for="descricao" class="form-label">Descrição do Produto</label>
                                <textarea class="form-control" id="descricao" rows="2"
                                    placeholder="Digite a descrição do produto" v-model="productDescription"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="preco" class="form-label">Preço do Produto <span
                                        class="text-danger">*</span></label>
                                <input name="quantity" class="form-control" id="preco"
                                    placeholder="Digite o preço do produto" v-model="productpPrice" @input="formatReais">
                                <p class="text-danger">{{ erroInput ? erroInput['price'][0] : '' }}</p>
                            </div>
                            <div class="mb-3">
                                <label for="quantidade" class="form-label">Quantidade em Estoque <span
                                        class="text-danger">*</span></label>
                                <input type="number" class="form-control" id="quantidade"
                                    placeholder="Digite a quantidade em estoque" v-model="productQuantity">
                                <p class="text-danger">{{ erroInput ? erroInput['quantity'][0] : '' }}</p>
                            </div>
                            <button type="button" class="btn btn-primary" @click="saveProduct">{{ editingProductId ?
                                'Salvar' : 'Cadastrar' }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>

export default {
    props: {
        modalOpen: Boolean, // Defina modalOpen como uma prop
        editingProductId: Number,
        productData: {
            type: Object
        },
        erroInput: {
            type: Object
        }
    },
    data() {
        return {
            productName: '',
            productDescription: '',
            productpPrice: '',
            productQuantity: ''
        };
    },
    computed: {
        // Computed properties para associar o v-model aos valores corretos
        computedProductName: {
            get() {
                return this.productData ? this.productData.data.name : this.productName;
            },
            set(value) {
                this.productName = value;
            }
        },
        computedProductDescription: {
            get() {
                return this.productData ? this.productData.data.description : this.productDescription;
            },
            set(value) {
                this.productDescription = value;
            }
        },
        computedProductpPrice: {
            get() {
                return this.productData ? this.productData.price : this.productpPrice;
            },
            set(value) {
                this.productpPrice = value;
            }
        },
        computedProductQuantity: {
            get() {
                return this.productData ? this.productData.quantity : this.productQuantity;
            },
            set(value) {
                this.productQuantity = value;
            }
        }
    },
    watch: {
        editingProductId(newProductId) {
            if (newProductId) {
                // Atualize as computed properties com base na prop productData
                this.computedProductName = this.productData.data.name;
                this.computedProductDescription = this.productData.data.description;
                this.computedProductpPrice = this.productData.data.price;
                this.computedProductQuantity = this.productData.data.quantity;
            }
        }
    },
    methods: {
        formatReais() {
            // Remove caracteres não numéricos
            let numericValue = this.productpPrice.replace(/\D/g, '');

            // Formata o valor em reais (R$)
            if (numericValue.length > 0) {
                this.productpPrice = 'R$' + (parseFloat(numericValue) / 100).toLocaleString('pt-BR', { minimumFractionDigits: 2 });
            }
        },
        closeModal() {
            this.$emit('close-modal');
            this.clearFields();
        },

        saveProduct() {

            const numericValue = this.productpPrice.replace(/[^\d,]/g, '').replace(',', '.');
            // Crie um objeto para armazenar os dados do produto
            const productData = {
                name: this.productName,
                description: this.productDescription,
                price: numericValue,
                quantity: this.productQuantity
            };

            if (this.editingProductId) {
                productData.id = this.editingProductId;
            }
            // Emita um evento para notificar o componente pai sobre a ação de salvar
            this.$emit('save-product', productData);
        },
        clearFields() {
            this.productName = '';
            this.productDescription = '';
            this.productpPrice = '';
            this.productQuantity = '';

            this.erroInput.name = [];
            this.erroInput.price = [];
            this.erroInput.quantity = [];
        },
    },
};
</script>

<style scoped>
/* Estilos para o modal */
.modal {
    display: none;
    position: fixed;
    z-index: 1;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgba(0, 0, 0, 0.7);
    display: flex;
    justify-content: center;
    align-items: center;
}

.modal-content {
    background-color: white;
    padding: 20px;
    border: 1px solid #ccc;
    position: relative;
}

.close {
    position: absolute;
    top: 0;
    right: 0;
    padding: 10px;
    cursor: pointer;
}

.text-danger {
    font-size: 14px;
}
</style>
