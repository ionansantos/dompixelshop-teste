<template>
    <div>
        <div v-if="modalOpen" class="modal">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">{{ editingProductId ? 'Editar Produto' : 'Cadastro de Produto' }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" @click="closeModal"></button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="mb-3">
                                <label for="nome" class="form-label">Nome do Produto</label>
                                <input type="text" class="form-control" id="nome" placeholder="Digite o nome do produto"
                                    v-model="productData.data.name">
                            </div>
                            <div class="mb-3">
                                <label for="descricao" class="form-label">Descrição do Produto</label>
                                <textarea class="form-control" id="descricao" rows="2"
                                    placeholder="Digite a descrição do produto"
                                    v-model="productData.data.description"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="preco" class="form-label">Preço do Produto</label>
                                <input type="text" class="form-control" id="preco" placeholder="Digite o preço do produto"
                                    v-model="productData.data.price">
                            </div>
                            <div class="mb-3">
                                <label for="quantidade" class="form-label">Quantidade em Estoque</label>
                                <input type="text" class="form-control" id="quantidade"
                                    placeholder="Digite a quantidade em estoque" v-model="productData.data.quantity">
                            </div>
                            <button type="button" class="btn btn-primary">{{ editingProductId ? 'Salvar' : 'Cadastrar'
                            }}</button>
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
        }
    },

    methods: {
        closeModal() {
            this.$emit('close-modal'); // Emita o evento personalizado
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
</style>