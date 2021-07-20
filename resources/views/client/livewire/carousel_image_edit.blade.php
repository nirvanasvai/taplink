<div>
    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="exampleModalCarouselEdit" tabindex="-1"
         aria-labelledby="exampleModalLabelCarouselEdit"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabelCarouselEdit">Фотографии</h5>
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
                                            <img src="/public/img/authorization/report.svg" alt=""/>
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
                            <label for="">Фотографии</label>
                            <div x-data="{ isUploading: false, progress: 0 }"
                                 x-on:livewire-upload-start="isUploading = true"
                                 x-on:livewire-upload-finish="isUploading = false"
                                 x-on:livewire-upload-error="isUploading = false"
                                 x-on:livewire-upload-progress="progress = $event.detail.progress">

                                <input type="file" wire:model="carousel" class="custom-file"/>


                                <div class="mt-2" x-show="isUploading">
                                    <progress max="100" x-bind:value="progress"></progress>
                                </div>
                            </div>
                            <div wire:loading wire:target="carousel">
                                Загружается...
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" wire:click="carouselImage({{$slider->id}})" class="btn btn-primary">Сохранить</button>
                </div>
            </div>
        </div>
    </div>

</div>
