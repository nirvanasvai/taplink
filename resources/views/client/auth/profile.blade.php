@extends('client.layouts.app')

@section('title',$socialView->name ?? 'Профиль')

@section('content')
    <div>
        <div class="container col-md-4">
            <div class="col-md-6 offset-md-3">

                <div wire:sortable="reorder" class="py-3 px-3 pb-5 bg-light" @if (isset($user))
                style="background-image: url('/backgrounds/{{$user->background}}.png');background-repeat: repeat;" @endif>
                    <div class="d-flex bd-highlight">
                        <div class="p-2 w-100 bd-highlight">
                            @if(!$user->slug)
                                <button class="btn btn-secondary btn-eye disabled">
                                    <i class="fa fa-eye"></i>
                                </button>
                            @else
                                <button class="btn btn-secondary btn-eye">
                                    <a href="{{route('profile.auth.page',$user->slug)}}"><i class="fa fa-eye"></i></a>
                                </button>
                            @endif
                        </div>
                        <div class="p-2 flex-shrink-1 bd-highlight">
                            <button class="btn btn-secondary btn-sliders" data-toggle="modal"
                                    data-target="#exampleModalProfile">
                                <i class="fas fa-sliders-h "></i>
                            </button>
                        </div>
                    </div>

                    <div class="d-flex justify-content-center">
                        <label style="cursor: pointer" for="avatar">
                            @if($user->avatar)
                                <img id="123" width="200" class="rounded-circle" enctype="multipart/form-data"
                                     src="/storage/photos/{{$user->avatar}}">
                            @endif
                            <input type="file" wire:model="avatar" id="avatar" style="display: none">
                        </label>
                    </div>

                    <h2 class="text-center mb-3">{{$user->name}}</h2>

                    @foreach ($items as $position => $value)

                        {{--                   @foreach($value as $element)--}}

                        <div wire:key="item-{{$position}}" wire:sortable.item="{{$position}}"
                             class="d-flex justify-content-center text-light text-dark  py-0"
                             tabindex="{{$position}}">
                            <div wire:sortable.handle class="w-100">
                                @isset($value['question_answer'])
                                    <div class="accordion" id="accordionExample">
                                        <div class="card">
                                            <div class="card-header" id="heading{{$value['question_answer'][0]['id']}}">
                                                <h2 class="mb-0">

                                                </h2>
                                            </div>
                                            <div id="collapse{{$value['question_answer'][0]['id']}}"
                                                 class="collapse @if ($loop->first) show @endif"
                                                 aria-labelledby="heading{{$value['question_answer'][0]['id']}}"
                                                 data-parent="#accordionExample">
                                                <div class="card-body text-dark">
                                                    {{$value['question_answer'][0]['answers']}}
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                @endisset
                                @isset($value['about'])
                                        <p>{{$value['about'][0]['title'] ?? ''}}</p>
                                        <p>{{$value['about'][0]['description'] ?? ''}}</p>

                                    </div>
                                    <hr>
                                @endisset
                                @isset($value['description'])
                                        <p>{{$value['description'][0]['description'] ?? ''}}</p>
                                    </div>
                                    <hr>
                                @endisset
                                @isset($value['link'])

                                    @if ($value['link'][0]['type_link'] == 'whatsapp')

                                        <a class="btn btn-success btn-lg btn-block"
                                           href="https://api.whatsapp.com/send?phone={{$user->phone}}&text={{$value['link'][0]['parent_title'] ?? ''}}" role="button">
                                            <i class="fab fa-whatsapp-square"></i> {{$value['link'][0]['title'] ?? ''}}
                                        </a>

                                    @elseif ($value['link'][0]['type_link'] == 'telegram')
                                        <a class="btn btn-info btn-lg btn-block"
                                           href="{{$value['link'][0]['link'] ?? ''}}" role="button"><i
                                                class="fab fa-telegram"></i> {{$value['link'][0]['title'] ?? ''}}
                                        </a>
                                    @elseif ($value['link'][0]['type_link'] == 'youtube')
                                        <a class="btn btn-danger btn-lg btn-block"
                                           href="{{$value['link'][0]['link'] ?? ''}}"><i
                                                class="fab fa-youtube-square"></i> {{$value['link'][0]['title'] ?? ''}}
                                        </a>
                                    @elseif ($value['link'][0]['type_link'] == 'default')
                                        <a class="btn btn-primary btn-lg btn-block"
                                           href="{{$value['link'][0]['link'] ?? ''}}" role="button"><i
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
                                    </div>
                                @endisset
                                @isset($value['carousel'])
                                    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                                        <div class="carousel-inner">
                                            @foreach($value['carousel'] as $item)
                                                <p>{{$value['carousel'][0]['type_carousel']}}</p>
                                                @foreach($item->carousel as $slider)

                                                    {{--                                        {{dd($slider)}}--}}
                                                    @if($loop->index)
                                                        <div class="carousel-item">
                                                            @else
                                                                <div class="carousel-item active">
                                                                    @endif
                                                                    <img width="350" height="250"
                                                                         src="/storage/{{$slider->url}}"
                                                                         class="d-block w-100" alt="...">
                                                                </div>
                                                                @endforeach
                                                                @endforeach
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
                                                        </div>
                                        </div>

                                        @endisset
                            @endforeach
                </div>
            </div>
        </div>


    </div>



@endsection
