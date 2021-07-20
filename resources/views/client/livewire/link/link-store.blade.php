<div>
    <!-- Modal -->
    <div wire:ignore.self class="modal fade text-light" id="exampleModalLink" tabindex="-1"
         aria-labelledby="exampleModalLabelLink" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabelLink">Ссылки</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="jumbotron bg-dark">
                        <div class="form-group">
                            <label for="">Текст ссылки</label>
                            <input type="text" class="form-control" wire:model="title" value="{{$linkViewEdit->title ?? ''}}" placeholder="Заголовок">
                            <label for=""></label>
                            <input type="text" class="form-control" wire:model="parent_title"
                                   {{$linkViewEdit->parent_title ?? ''}}   placeholder="подзаголовок">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" wire:model="link" placeholder="http://" value="{{$linkViewEdit->link ?? ''}}">
                        </div>
                        <div class="form-group">
                            <select wire:model="link_type" id="" class="custom-select">
                                <option selected>Выберите тип Ссылки</option>
                                <option value="whatsapp">
                                    whatsapp
                                </option>
                                <option value="youtube">
                                    youtube
                                </option>
                                <option value="telegram">
                                    telegram
                                </option>
                                <option value="default">
                                    другие ссылки
                                </option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" wire:click.prevent="storeLink()" class="btn btn-primary">Сохранить
                    </button>
                </div>
            </div>
        </div>
    </div>

</div>
