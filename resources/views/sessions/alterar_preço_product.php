<div class="modal" tabindex="-1" role="dialog" id="modalproduct">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Alteracão de preço de:<span class="nomealterado"></span></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form action="#">
        <div class="form-group">
          <label for="antigopreco">nao quero mais vender com esse preço</label>
          <input type="text" id="antigopreco" class="form-control" readonly>
        </div>
        <div class="form-group">
          <label for="antigopreco">Quero vender com esse Preço</label>
          <input type="number" id="novopreco" class="form-control" placeholder="digite o novo preço aqui">
        </div>
       </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        <button type="button" class="btn btn-primary alt" id="valproduto">Alterar</button>
      </div>
    </div>
  </div>
</div>