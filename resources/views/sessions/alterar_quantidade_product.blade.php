<div class="modal" tabindex="-1" role="dialog" id="alterar_quantidade_product_modal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Alteracão de preço de:<span class="nomealterado"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form action="#">
        <div class="form-group">
          <label for="antigopreco">voce só tem essa quantide</label>
          <input type="text" id="restoqunatidade" class="form-control" readonly>
        </div>
        <div class="form-group">
          <label for="antigopreco">Quero adicionar mais quantidade</label>
          <input type="text" id="novaquantidade" class="form-control">
        </div>
       </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        <button type="button" class="btn btn-primary novaquantidade" id="product_id_alterar">Alterar</button>
      </div>
    </div>
  </div>
</div>