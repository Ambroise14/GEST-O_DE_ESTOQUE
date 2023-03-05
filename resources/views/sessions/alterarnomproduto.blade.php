<div class="modal" tabindex="-1" role="dialog" id="modal_alterar_nome_product">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Alteracão de nome de:<span class="nomealterado"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form action="#">
        <div class="form-group">
          <label for="antigopreco">Nome atual de produto</label>
          <input type="text" id="antigonome" class="form-control" readonly>
        </div>
        <div class="form-group">
          <label for="novonome">Quero alterar</label>
          <input type="text" id="novonome" class="form-control" placeholder="digite o novo nome aqui">
        </div>
       </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        <button type="button" class="btn btn-primary novonome" id="product_id_novo">Alterar</button>
      </div>
    </div>
  </div>
</div>