<div>
    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="exampleModalQuestion" tabindex="-1"
         aria-labelledby="exampleModalLabelQuestion" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabelQuestion">Вопрос и ответы</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="jumbotron">
                        <div class="form-group">
                            <label for="">Вопрос</label>
                            <input type="text" class="form-control" wire:model="question" placeholder="Вопрос">
                        </div>
                        <div class="form-group">
                            <label for="">Ответ</label>
                            <textarea type="text" class="form-control" wire:model="answer" placeholder="Ответ"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" wire:click="closeModal()">Закрыть</button>
                    <button type="button" wire:click.prevent="questAnswer()" class="btn btn-primary">
                        Сохранить
                    </button>
                </div>
            </div>
        </div>
    </div>

</div>
