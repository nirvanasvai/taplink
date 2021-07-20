<div>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">

                <div wire:sortable="reorder"
                     class="py-3 px-3 pb-1 @if($user->background == 1) text-dark @elseif($user->background == 2) text-light @elseif($user->background == 3) text-light @elseif($user->background == 4) text-light @elseif($user->background == 5) text-dark @elseif($user->background == 6) text-dark @endif"
                     @if (isset($user))
                     style="background-image: url('/backgrounds/{{$user->background}}.png');background-repeat: repeat;" @endif>
                    <div class="d-flex bd-highlight justify-content-between">
                        <div class="p-2">
                            @if($user->slug)
                                <button class="btn btn-light btn-eye border">
                                    <a href="{{route('profile.auth.page',$user->slug)}}" target="_blank"><i
                                            class="fa fa-eye"></i> Просмотр страницы</a>
                                </button>
                            @endif
                        </div>
                        <div class="p-2">
                            <button class="btn btn-light btn-sliders border" data-toggle="modal"
                                    data-target="#exampleModalProfile" wire:click.prevent="edit({{$user->id ?? ''}})">
                                <a href="#"><i class="fas fa-sliders-h "></i> Настройки</a>
                            </button>
                        </div>
                    </div>

                    <div class="d-flex justify-content-center">
                        <label style="cursor: pointer" for="avatar">
                            @if($user->avatar)
                                <img id="123" width="200" class="rounded-circle" enctype="multipart/form-data"
                                     src="/storage/photos/{{$user->avatar}}">
                            @else
                                <input type="file" wire:model="avatar" id="avatar" style="display: none">
                                <p class="btn-link">Нажмите сюда что бы добавить Аватар</p>
                            @endif
                            <input type="file" wire:model="avatar" id="avatar" style="display: none">
                        </label>
                    </div>

                    <h2 class="text-center mb-3">{{$user->name}}</h2>

                    @foreach ($items as $position => $value)

                        {{--                   @foreach($value as $element)--}}

                        <div wire:key="item-{{$position}}" wire:sortable.item="{{$position}}"
                             class="d-flex justify-content-center py-0"
                             tabindex="{{$position}}">
                            <div wire:sortable.handle class="w-100">
                                @isset($value['question_answer'])
                                    <div class="accordion" id="accordionExample">
                                        <div class="card">
                                            <div class="card-header" id="heading{{$value['question_answer'][0]['id']}}">
                                                <h2 class="mb-0">
                                                    <button class="btn btn-block text-left"
                                                            type="button" data-toggle="collapse"
                                                            data-target="#collapse{{$value['question_answer'][0]['id']}}"
                                                            aria-expanded="true"
                                                            aria-controls="collapse{{$value['question_answer'][0]['id']}}">
                                                        <h5 class="d-flex justify-content-between">{{$value['question_answer'][0]['question']}}
                                                            <i class="fas fa-sort-down"></i>
                                                        </h5>
                                                    </button>
                                                </h2>
                                            </div>
                                            <div id="collapse{{$value['question_answer'][0]['id']}}"
                                                 class="collapse @if ($loop->first) show @endif"
                                                 aria-labelledby="heading{{$value['question_answer'][0]['id']}}"
                                                 data-parent="#accordionExample">
                                                <div
                                                    class="card-body text-dark">
                                                    {{$value['question_answer'][0]['answers']}}


                                                </div>
                                                <button type="button" class="btn btn-primary mx-3 my-2"
                                                        data-toggle="modal"
                                                        data-target="#exampleModalQuestion" data-dismiss="modal"
                                                        aria-label="Close"
                                                        wire:click.prevent="questionAnswer({{$value['question_answer'][0]['id']}})">
                                                    Редактировать
                                                </button>

                                            </div>
                                        </div>

                                    </div>
                                @endisset
                                @isset($value['about'])
                                    <div data-toggle="modal"
                                         data-target="#exampleModalAbout" data-dismiss="modal"
                                         aria-label="Close"
                                         wire:click.prevent="AboutEdit({{$value['about'][0]->id ?? ''}})">
                                        <p>{{$value['about'][0]['title'] ?? ''}}</p>
                                        <p>{{$value['about'][0]['description'] ?? ''}}</p>

                                    </div>
                                    <hr>
                                @endisset
                                @isset($value['description'])
                                    <div data-toggle="modal"
                                         data-target="#exampleModalDescription" data-dismiss="modal"
                                         aria-label="Close"
                                         wire:click.prevent="EditDescription({{$value['description'][0]->id ?? ''}})">
                                        <p>{{$value['description'][0]['description'] ?? ''}}</p>
                                    </div>
                                    <hr>
                                @endisset
                                @isset($value['link'])

                                    @if ($value['link'][0]['type_link'] == 'whatsapp')

                                        <a class="btn btn-success btn-lg btn-block"
                                           href="https://api.whatsapp.com/send?phone={{$user->phone}}&text={{$value['link'][0]['parent_title'] ?? ''}}"
                                           role="button" data-toggle="modal"
                                           data-target="#exampleModalLink" data-dismiss="modal"
                                           aria-label="Close"
                                           wire:click.prevent="linkEdit({{$value['link'][0]['id'] ?? ''}})"><i
                                                class="fab fa-whatsapp-square"></i> {{$value['link'][0]['title'] ?? ''}}
                                        </a>

                                    @elseif ($value['link'][0]['type_link'] == 'telegram')
                                        <a class="btn btn-info btn-lg btn-block"
                                           href="{{$value['link'][0]['link'] ?? ''}}" role="button" data-toggle="modal"
                                           data-target="#exampleModalLink" data-dismiss="modal"
                                           aria-label="Close"
                                           wire:click.prevent="linkEdit({{$value['link'][0]['id'] ?? ''}})"><i
                                                class="fab fa-telegram"></i> {{$value['link'][0]['title'] ?? ''}}
                                        </a>
                                    @elseif ($value['link'][0]['type_link'] == 'youtube')
                                        <a class="btn btn-danger btn-lg btn-block"
                                           href="{{$value['link'][0]['link'] ?? ''}}" role="button" data-toggle="modal"
                                           data-target="#exampleModalLink" data-dismiss="modal"
                                           aria-label="Close"
                                           wire:click.prevent="linkEdit({{$value['link'][0]['id'] ?? ''}})"><i
                                                class="fab fa-youtube-square"></i> {{$value['link'][0]['title'] ?? ''}}
                                        </a>
                                    @elseif ($value['link'][0]['type_link'] == 'default')
                                        <a class="btn btn-primary btn-lg btn-block"
                                           href="{{$value['link'][0]['link'] ?? ''}}" role="button" data-toggle="modal"
                                           data-target="#exampleModalLink" data-dismiss="modal"
                                           aria-label="Close"
                                           wire:click.prevent="linkEdit({{$value['link'][0]['id'] ?? ''}})"><i
                                                class="fab fa-link"></i> {{$value['link'][0]['title'] ?? ''}}
                                        </a>
                                    @endif
                                    <hr>
                                @endisset
                                @isset($value['review'])
                                    <div class="container-fluid">
                                        <h4 class="">Отзывы</h4>
                                        <h5>{{$value['review'][0]['name'] ?? ''}}</h5>

                                        <p>{{$value['review'][0]['review'] ?? ''}}</p>
                                        <img class="mt-4" src="/storage/{{$value['review'][0]->images->url ?? ''}}"
                                             alt=""
                                             width="250">
                                        @if(isset($value['review'][0]->videos->url))
                                            <iframe class="rounded mt-4" width="350" height="215"
                                                    src="http://www.youtube.com/embed/{{mb_substr($value['review'][0]->videos->url,32)}}"
                                                    title="YouTube video player" frameborder="0"
                                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                                    allowfullscreen></iframe>
                                        @endif
                                        <button type="button" class="btn btn-primary"
                                                data-toggle="modal"
                                                data-target="#exampleModalReview" data-dismiss="modal"
                                                aria-label="Close"
                                                wire:click.prevent="reviewEdit({{$value['reviews'][0]['id'] ?? ''}})">
                                            ред
                                        </button>
                                    </div>
                                @endisset
                                @isset($value['carousel'])
                                    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                                        <div class="carousel-inner">
                                            <p>{{$value['carousel'][0]['type_carousel']}}</p>
                                            {{--                                            {{dd($value['carousel'][0]->carousel)}}--}}
                                            @foreach($value['carousel'][0]->carousel as $slider)

                                                {{--                                        {{dd($slider)}}--}}
                                                @if($loop->index)
                                                    <div class="carousel-item">
                                                        @else
                                                            <div class="carousel-item active">
                                                                @endif
                                                                <img width="350" height="250"
                                                                     src="/storage/{{$slider->url}}"
                                                                     class="d-block w-100" alt="...">
                                                                <button type="button" class="btn btn-success"
                                                                        data-toggle="modal"
                                                                        data-target="#exampleModalCarouselEdit"
                                                                        data-dismiss="modal"
                                                                        aria-label="Close"
                                                                        wire:click.prevent="carouselImage({{$slider->id}})">
                                                                    изменить фото
                                                                </button>
                                                                @include('client.livewire.carousel_image_edit',['slider'=>$slider])
                                                            </div>

                                                            <a class="carousel-control-prev"
                                                               href="#carouselExampleControls"
                                                               role="button" data-slide="prev">
                                                                                    <span
                                                                                        class="carousel-control-prev-icon"
                                                                                        aria-hidden="true"></span>
                                                                <span class="sr-only">Previous</span>
                                                            </a>
                                                            <a class="carousel-control-next"
                                                               href="#carouselExampleControls"
                                                               role="button" data-slide="next">
                                                                                    <span
                                                                                        class="carousel-control-next-icon"
                                                                                        aria-hidden="true"></span>
                                                                <span class="sr-only">Next</span>
                                                            </a>
                                                            @endforeach

                                                    </div>
                                                    <button type="button" class="btn btn-primary"
                                                            data-toggle="modal"
                                                            data-target="#exampleModalCarousel" data-dismiss="modal"
                                                            aria-label="Close"
                                                            wire:click.prevent="carouselEdit({{$value['carousel'][0]['id'] ?? ''}})">
                                                        ред
                                                    </button>
                                        </div>

                                        @endisset
                                    </div>
                            </div>
                            @endforeach

                            <button class="btn btn-primary btn-block btn-lg mt-5" type="button" data-toggle="modal"
                                    data-target="#exampleModal">
                                Добавить блок
                            </button>
                        </div>

                </div>
            </div>
        </div>


        @include('client.livewire.social.facebook')
        @include('client.livewire.social.vkontakte')
        @include('client.livewire.social.whats_up')
        @include('client.livewire.social.instagram')
        @include('client.livewire.social.telegram')
        @include('client.livewire.social.odnoclassniki')
        @include('client.livewire.link.link-store')
        @include('client.livewire.social.facebook')
        @include('client.livewire.about')
        @include('client.livewire.carousel')
        @include('client.livewire.profile')
        @include('client.livewire.question_answer')
        @include('client.livewire.social.instagram')
        @include('client.livewire.social.vkontakte')
        @include('client.livewire.social.telegram')
        @include('client.livewire.review')
        @include('client.livewire.social.odnoclassniki')
        @include('client.livewire.description')

        @include('client.livewire.links')

    </div>
</div>


</div>
</div>
