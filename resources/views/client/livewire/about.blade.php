<div>
    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="exampleModalAbout" tabindex="-1" aria-labelledby="exampleModalLabelAbout" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabelAbout">Обо мне</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="jumbotron">
                        <div class="form-group">
                            <label for="">Обо мне</label>
{{--                            {{dd($about->title)}}--}}
                            <input type="text" class="form-control" wire:model="title" value="{{$about->title ?? ''}}">
                            <label for="">Описание</label>
                            <textarea class="form-control" wire:model="description">{{$about->description ?? ''}}</textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" wire:click="storeAbout({{$about->id ?? ''}})" class="btn btn-primary">Сохранить</button>
                </div>
            </div>
        </div>
    </div>

</div>
