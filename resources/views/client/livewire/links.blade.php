
    <!-- Modal -->
    <div wire:ignore.self class="modal fade " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content text-dark">
                <div class="modal-header">
                    <p class="modal-title" id="exampleModalLabel">{{auth()->user()->name}}</p>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>

                </div>
                <div class="modal-body p-3">
                    <div class="row flex-wrap">
                        <div class="container">
                            <div class="window-icons-wrapper">
                                <div class="row">

{{--                                    <li class="window-icon-item">--}}
{{--                                        <button type="button"  class="btn window-icon-subtitle"--}}
{{--                                                data-toggle="modal"--}}
{{--                                                data-target="#exampleModalFacebook" data-dismiss="modal" aria-label="Close">--}}
{{--                                            <i class="fab fa-facebook-square display-4"> </i>--}}
{{--                                            <div>--}}
{{--                                                <p class="mt-4 font-weight-bold">Facebook</p>--}}
{{--                                            </div>--}}
{{--                                        </button>--}}

{{--                                    </li>--}}
{{--                                    <li class="window-icon-item">--}}
{{--                                        <button type="button"  class="btn window-icon-subtitle"--}}
{{--                                                data-toggle="modal"--}}
{{--                                                data-target="#exampleModalInstagram" data-dismiss="modal" aria-label="Close">--}}
{{--                                            <i class="fab fa-instagram-square display-4"> </i>--}}
{{--                                            <div>--}}
{{--                                                <p class="mt-4 font-weight-bold">Инстаграм</p>--}}
{{--                                            </div>--}}
{{--                                        </button>--}}
{{--                                    </li>--}}
{{--                                    <li class="window-icon-item">--}}
{{--                                        <button type="button" class="btn window-icon-subtitle"--}}
{{--                                                data-toggle="modal"--}}
{{--                                                data-target="#exampleModalVkontakte" data-dismiss="modal" aria-label="Close">--}}
{{--                                            <i class="fab fa-vk display-4"></i>--}}
{{--                                            <div>--}}
{{--                                                <p class="mt-4 font-weight-bold">Вконтакте</p>--}}
{{--                                            </div>--}}
{{--                                        </button>--}}
{{--                                    </li>--}}
{{--                                    <li class="window-icon-item">--}}
{{--                                        <button type="button"  class="btn window-icon-subtitle"--}}
{{--                                                data-toggle="modal"--}}
{{--                                                data-target="#exampleModalTelegram" data-dismiss="modal" aria-label="Close">--}}
{{--                                            <i class="fab fa-telegram display-4"></i>--}}
{{--                                            <div>--}}
{{--                                                <p class="mt-4 font-weight-bold">Телеграм</p>--}}
{{--                                            </div>--}}
{{--                                        </button>--}}
{{--                                    </li>--}}
{{--                                    <li class="window-icon-item">--}}
{{--                                        <button type="button" class="btn window-icon-subtitle"--}}
{{--                                                data-toggle="modal"--}}
{{--                                                data-target="#exampleModalOdnoklassniki" data-dismiss="modal" aria-label="Close">--}}
{{--                                            <i class="fab fa-odnoklassniki-square display-4"></i>--}}
{{--                                            <div>--}}
{{--                                                <p class="mt-4 font-weight-bold">Одноклассники</p>--}}
{{--                                            </div>--}}
{{--                                        </button>--}}
{{--                                    </li>--}}
{{--                                    <li class="window-icon-item">--}}
{{--                                        <button type="button" class="btn window-icon-subtitle"--}}
{{--                                                data-toggle="modal"--}}
{{--                                                data-target="#exampleModalWhatsapp" data-dismiss="modal" aria-label="Close">--}}
{{--                                            <i class="fab fa-whatsapp-square display-4"></i>--}}
{{--                                            <div>--}}
{{--                                                <p class="mt-4 font-weight-bold">Whatsapp</p>--}}
{{--                                            </div>--}}
{{--                                        </button>--}}
{{--                                    </li>--}}
                                    <div class="col-md-4">
                                        <button type="button" class="btn btn-block border mt-5"
                                                data-toggle="modal"
                                                data-target="#exampleModalDescription" data-dismiss="modal" aria-label="Close">
                                            <i class="fas fa-envelope-open-text display-4 color"> </i>
                                            <div>
                                                <p class="mt-4 font-weight-bold">Текст</p>
                                            </div>
                                        </button>
                                    </div>
                                    <div class="col-md-4">
                                        <button  class="btn btn-block border mt-5"
                                                 data-toggle="modal"
                                                 data-target="#exampleModalLink" data-dismiss="modal" aria-label="Close">
                                            <i class="fas fa-external-link-square-alt display-4 color"></i>
                                            <div>
                                                <p class="mt-4 font-weight-bold">Ссылки</p>
                                            </div>
                                        </button>
                                    </div>
                                    <div class="col-md-4">
                                        <button type="button" class="btn btn-block border mt-5"
                                                data-toggle="modal"
                                                data-target="#exampleModalCarousel" data-dismiss="modal" aria-label="Close">
                                            <i class="fas fa-images display-4 color"></i>
                                            <div>
                                                <p class="mt-4 font-weight-bold">Слайдер изображений</p>
                                            </div>
                                        </button>
                                    </div>
                                    <div class="col-md-4">
                                        <button type="button" class="btn btn-block border mt-5"
                                                data-toggle="modal"
                                                data-target="#exampleModalQuestion" data-dismiss="modal" aria-label="Close">
                                            <i class="fas fa-question-circle display-4 color"></i>
                                            <div>
                                                <p class="mt-4 font-weight-bold">Вопросы и ответы</p>
                                            </div>
                                        </button>
                                    </div>

                                    <div class="col-md-4">
                                        <button type="button" class="btn btn-block border mt-5"
                                                data-toggle="modal"
                                                data-target="#exampleModalReview" data-dismiss="modal" aria-label="Close">
                                            <i class="fas fa-comment-alt display-4 color"></i>
                                            <div>
                                                <p class="mt-4 font-weight-bold">Отзывы</p>
                                            </div>
                                        </button>
                                    </div>

{{--                                    <div class="col-md-4">--}}
{{--                                        <button type="button" class="btn btn-block border mt-5"--}}
{{--                                                data-toggle="modal"--}}
{{--                                                data-target="#exampleModalAbout" data-dismiss="modal" aria-label="Close">--}}
{{--                                            <i class="fas fa-address-card display-4 color"> </i>--}}
{{--                                            <div>--}}
{{--                                                <p class="mt-4 font-weight-bold">Обо мне</p>--}}
{{--                                            </div>--}}
{{--                                        </button>--}}
{{--                                    </div>--}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                </div>
            </div>
        </div>
    </div>

