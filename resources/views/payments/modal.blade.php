<div class="modal fade" id="paymentModal" tabindex="-1" role="dialog" aria-labelledby="paymentModalLabel" aria-hidden="true" data-monthURL="{{ route('payments.store', ['id' => $data->id]) }}">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="paymentModalLabel">Добави плащане</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="input-group mt-3">
                    <input class="modal-reason" type="text" value=""
                    class="form-control" name="reason" placeholder="Причина">
                </div>
                <div class="input-group mt-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text">лв.</span>
                      <span class="input-group-text">0.00</span>
                    </div>
                    <input class="modal-amount" type="text" name="amount" class="form-control" placeholder="Сума">
                  </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary save-changes">Save changes</button>
            </div>
        </div>
    </div>
</div>
