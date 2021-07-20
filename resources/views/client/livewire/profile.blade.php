<div>
    <!-- Modal -->
    <div wire:ignore.self class="modal fade " id="exampleModalProfile" tabindex="-1"
         aria-labelledby="exampleModalLabelProfile" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content text-dark">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabelProfile">Профиль</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="">
                        <div class="form-group">
                            <label for="">Имя</label>
                            <input type="text" class="form-control" wire:model="name" value="{{auth()->user()->name}}">
                        </div>

                        <div class="form-group">
                            <label>Название Вашей страницы</label>
                            <input class="form-control" wire:model="slug" value="{{auth()->user()->slug}}"/>
                        </div>

                        <p>Стиль страницы</p>
                        <div class="row mb-3">

                            <div class="col-md-4">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="background1" wire:model="background" @if ($user->background == 1)
                                        checked
                                    @endif value="1"
                                           class="custom-control-input">
                                    <label class="custom-control-label border" for="background1"><img class="img-fluid"
                                                                                               src="/backgrounds/1.png"></label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="background2" @if ($user->background == 2)
                                    checked
                                           @endif  wire:model="background" value="2"
                                           class="custom-control-input">
                                    <label class="custom-control-label border" for="background2"><img class="img-fluid"
                                                                                               src="/backgrounds/2.png"></label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="background3" @if ($user->background == 3)
                                    checked
                                           @endif  wire:model="background" value="3"
                                           class="custom-control-input">
                                    <label class="custom-control-label border" for="background3"><img class="img-fluid"
                                                                                               src="/backgrounds/3.png"></label>
                                </div>
                            </div>
                        </div>

                        <div class="row">

                            <div class="col-md-4">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="background4" @if ($user->background == 4)
                                    checked
                                           @endif  wire:model="background" value="4"
                                           class="custom-control-input">
                                    <label class="custom-control-label border" for="background4"><img class="img-fluid"
                                                                                                      src="/backgrounds/4.png"></label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="background5" @if ($user->background == 5)
                                    checked
                                           @endif  wire:model="background" value="5"
                                           class="custom-control-input">
                                    <label class="custom-control-label border" for="background5"><img class="img-fluid"
                                                                                                      src="/backgrounds/5.png"></label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="background6" @if ($user->background == 6)
                                    checked
                                           @endif  wire:model="background" value="6"
                                           class="custom-control-input">
                                    <label class="custom-control-label border" for="background6"><img class="img-fluid"
                                                                                                      src="/backgrounds/6.png"></label>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                    <button type="button" wire:click="storeSocial()" class="btn btn-primary"
                            data-dismiss="modal">Сохранить
                    </button>
                </div>
            </div>
        </div>
    </div>

</div>
