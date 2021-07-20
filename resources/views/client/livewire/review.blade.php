<div>
    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="exampleModalReview" tabindex="-1"
         aria-labelledby="exampleModalLabelReview" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabelReview">Отзывы</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="jumbotron">
                        @if ($errors->any())
                            <div class="form-authorization__error error-authorization">
                                <div class="error-authorization__row">
                                    <div class="error-authorization__col">
                                        <div class="error-authorization__alert">
                                            <img src="/public/img/authorization/report.svg" alt="" />
                                        </div>
                                    </div>
                                    <div class="error-authorization__col">
                                        <div class="error-authorization__text" id="dump">
                                            <div class="alert alert-danger">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <a href="" class="error-authorization__close"></a>
                            </div>
                        @endif
                        <div class="form-group">
                            <label for="">Кто оставил отзыв?</label>
                            <input type="text" class="form-control" wire:model="name" placeholder="имя клиента" value="{{$reviewView->name ?? ''}}">
                        </div>
                        <div class="form-group">
                            <label for="">Какой текст оставил?</label>
                            <input type="text" class="form-control" wire:model="review" placeholder="текст отзывы" value="{{$reviewView->review ?? ''}}">
                        </div>
                        <div class="form-group">
                            <label for="">Фотография человека или скриншот</label>
                            <div x-data="{ isUploading: false, progress: 0 }"
                                 x-on:livewire-upload-start="isUploading = true"
                                 x-on:livewire-upload-finish="isUploading = false"
                                 x-on:livewire-upload-error="isUploading = false"
                                 x-on:livewire-upload-progress="progress = $event.detail.progress">

                                <input type="file" id="resume" wire:model="photos" aria-label="Resume" />
                                @if(isset($reviewView->images->url))
                                <img width="250" src="/storage/{{$reviewView->images->url}}" alt="">
                                @endif

                                <div class="mt-2" x-show="isUploading">
                                    <progress max="100" x-bind:value="progress"></progress>
                                </div>
                            </div>
                            <div wire:loading wire:target="photos">
                                Загружается...
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Ссылка на ютуб,если это видео отзыв</label>
                            <input type="text" class="form-control" wire:model="video" placeholder="ссылка на ютуб">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" wire:click="closeModal()">Close</button>
                    <button type="button" wire:click.prevent="storeReview()" class="btn btn-primary">
                        Сохранить
                    </button>
                </div>
            </div>
        </div>
    </div>

</div>
