
    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="exampleModalWhatsapp" tabindex="-1" aria-labelledby="exampleModalLabelWhatsapp" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabelWhatsapp">Whatsapp</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="jumbotron">
                        <div class="form-group">
                            <label for="">Whatsapp</label>
                            <input type="text" class="form-control" wire:model="whatsapp" placeholder="Whatsapp">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" wire:click.prevent="storeSocial({{$socialView->id ?? ''}})" class="btn btn-primary">Сохранить</button>
                </div>
            </div>
        </div>
    </div>

