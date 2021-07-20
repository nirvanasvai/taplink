<?php

namespace App\Http\Livewire;

use App\Models\About;
use App\Models\About as About_us;
use App\Models\Carousel;
use App\Models\Description;
use App\Models\Description as Desc;
use App\Models\Hr;
use App\Models\Image;
use App\Models\Link;
use App\Models\Question_answer;
use App\Models\Review as Reviews;
use App\Models\Service;
use App\Models\Sortable;
use App\Models\User;
use App\Models\Video;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic;
use Livewire\Component;
use Livewire\WithFileUploads;

use Intervention\Image\Facades\Image as Resize;

class Taplink extends Component
{
    use WithFileUploads;


    public $metas = [];
    public $isOpen = 0;
    public $isUpdate = 0;
    public $photos = [];
    public $description, $title, $parent_title, $name, $review, $video, $link, $vkontakte, $facebook, $telegram, $whatsapp, $type_link,
        $odnoklassniki, $instagram, $user_id, $price, $avatar, $hr, $typeHr, $question, $answer, $background, $slug,
        $carousel, $carousel_type;
    //Edit public
    public $about_id, $description_id, $quest_id, $link_id, $review_id, $carousel_id, $carousel_photo;


    public $show_link = false;

    public $country;
    public $updateGroupOrder;
    public $cities = [];
    public $city;
    public $list;


    public function reorder($list)
    {
//        dd($list);
        foreach ($list as $item) {
//            $info = json_decode($item['value']);

            Sortable::query()->find($item['value'])->update(['position' => $item['order']]);

        }
    }


    public function resetInput()
    {
        $this->title = null;
        $this->description = null;
        $this->parent_title = null;
        $this->review = null;
        $this->video = null;
        $this->link = null;
        $this->metas = null;
        $this->vkontakte = null;
        $this->telegram = null;
        $this->odnoklassniki = null;
        $this->whatsapp = null;
        $this->instagram = null;
        $this->facebook = null;
        $this->hr = null;
        $this->question = null;
        $this->answer = null;
        $this->background = null;
        $this->name = null;
        $this->slug = null;
        $this->carousel = null;
        $this->carousel_type = null;

    }


//    public function arrayToList($array, $key, $val)
//    {
//        if (empty($array) OR count($array) == 0)
//            return;
//        foreach ($array as $a) {
//            $result[$a[$key]] = $a[$val];
//        }
//        return $result;
//    }

    public function render()
    {
        $items = [];
        $loops = Sortable::where('user_id', auth()->user()->id)->orderBy('position')->get();
//        dd($loops);
        foreach ($loops as $loop) {
            if ($loop->type == 'description') {
                $items[$loop->id]['description'] = Description::find([$loop->type_id]);
//                dd($loop);
            }

            if ($loop->type == 'about') {
                $items[$loop->id]['about'] = About_us::find([$loop->type_id]);
            }
            if ($loop->type == 'carousel') {
                $items[$loop->id]['carousel'] = Carousel::find([$loop->type_id]);
            }
            if ($loop->type == 'user') {
                $items[$loop->id]['user'] = User::find([$loop->type_id]);
            }
            if ($loop->type == 'link') {
                $items[$loop->id]['link'] = Link::find([$loop->type_id]);
            }
            if ($loop->type == 'review') {
                $items[$loop->id]['review'] = Reviews::find([$loop->type_id]);
            }
            if ($loop->type == 'question_answer') {
                $items[$loop->id]['question_answer'] = Question_answer::find([$loop->type_id]);
            }
        }

        return view('livewire.taplink', [
            'items' => $items,
            'user' => User::query()->where('id', auth()->user()->id)->first()
        ]);
    }

    public function linkEdit($id)
    {
        $linkEdit = Link::query()->where('user_id', auth()->user()->id)->findOrFail($id);
        $this->link_id = $id;
        $this->link_type = $linkEdit->type_link;
        $this->link = $linkEdit->link;
        $this->title = $linkEdit->title;
        $this->parent_title = $linkEdit->parent_title;
    }

    public function carouselStore()
    {
        if ($this->carousel_type) {
            $this->validate([
                'carousel_type'=>'required'
            ]);
            $carousels =Carousel::query()->updateOrCreate(['id'=>$this->carousel_id],[
                'type_carousel'=>$this->carousel_type,
                'user_id' => auth()->user()->id,
            ]);
            Sortable::query()->updateOrInsert([
                'type_id' => $carousels->id,
                'type'=>'carousel',
                'user_id' => auth()->user()->id
            ]);
        }

//        Image::query()->where('carousel', $carousel->id)->delete();
//        dd($this->photos);
        if ($this->photos) {
            foreach ($this->photos as $photo) {
                $storedImage = $photo->store('photos');
                Image::query()->updateOrCreate(['id'=>$this->carousel_photo],[
                    'url' => $storedImage,
                    'type'=> '-',
                    'carousel' => $carousels->id,
                    'user_id' => auth()->user()->id,
                ]);
            }
        }


        $this->resetInput();
    }

    public function carouselEdit($id)
    {
        $carouselEdit = Carousel::query()
            ->where('user_id', auth()->user()->id)
            ->findOrFail($id);
        $this->carousel_id = $id;
        $this->carousel_type = $carouselEdit->type_carousel;

    }

    public function delete($id)
    {
        Carousel::find($id)->delete();
        DB::table('images')->where('carousel', $id)->delete();

        session()->flash('message', 'Сообщение успешно удалено!
.');
    }

    public function carouselImage($id)
    {
        $carouselPhoto = Image::query()->where('user_id', auth()->user()->id)
            ->findOrFail($id);
//        $this->carousel_photo = $id;
        $this->carousel = $carouselPhoto->url;
//        $carouselPhoto->save();
    }

    public function carouselSave()
    {}

    public function questionAnswer($id)
    {
        $questEdit = Question_answer::query()->where('user_id', auth()->user()->id)->findOrFail($id);
        $this->quest_id = $id;
        $this->question = $questEdit->question;
        $this->answer = $questEdit->answers;
    }

    public function questAnswer()
    {
        $this->validate([
            'question' => 'required|string|max:100|min:3',
            'answer' => 'required|max:250|min:10',
        ]);
        $question_answer = Question_answer::query()->updateOrCreate(['id' => $this->quest_id], [
            'question' => $this->question,
            'answers' => $this->answer,
            'user_id' => auth()->user()->id,
        ]);
        Sortable::query()->updateOrInsert([
            'type_id' => $question_answer->id,
            'type' => 'question_answer',
            'user_id' => auth()->user()->id
        ]);
        $this->resetInput();
    }

    public function storeAbout()
    {
        $this->validate([
            'title' => 'required|string|max:100|min:3',
            'description' => 'required|max:250|min:5',
        ]);
        $about = About_us::query()->updateOrCreate(['id' => $this->about_id], [
            'title' => $this->title,
            'description' => $this->description,
            'user_id' => auth()->user()->id
        ]);
        Sortable::query()->updateOrInsert([
            'type_id' => $about->id,
            'type' => 'about',
            'user_id' => auth()->user()->id
        ]);
        $this->resetInput();
    }

    public function AboutEdit($id)
    {
        $aboutEdit = About_us::query()->where('user_id', auth()->user()->id)->findOrFail($id);
        $this->about_id = $id;
        $this->title = $aboutEdit->title;
        $this->description = $aboutEdit->description;
//        $this->resetInput();
    }

    public function storeService()
    {
        Service::query()->updateOrCreate([], [
            'title' => $this->title,
            'description' => $this->description,
            'price' => $this->price,
            'user_id' => auth()->user()->id
        ]);
        $this->resetInput();
    }

    public function updatedAvatar()
    {
        $this->validate([
            'avatar' => 'required|image',
        ]);
        if ($this->avatar) {
            $path = $this->avatar->hashName();
            $manager = new ImageManagerStatic();
            $image = $manager->make($this->avatar)->fit(400);
            $image->save(storage_path() . '/app/public/photos/' . $path);
//            dd($image);

            $data = User::find(auth()->user()->id);

            $data->avatar = $path;
            $data->save();
        }
    }

    public function storeSocial()
    {
        if ($this->name) {
            $data = User::find(auth()->user()->id);
            $data->name = $this->name;
            $data->save();
        }
        if ($this->slug) {
            $data = User::find(auth()->user()->id);
            $data->slug = $this->slug;
            $data->save();
        }
        if ($this->background) {
            $data = User::find(auth()->user()->id);
            $data->background = $this->background;
            $data->save();
        }
        if ($this->vkontakte) {
            $this->validate([
                'vkontakte' => 'required|unique:users',
            ]);
            $data = User::find(auth()->user()->id);
            $data->vkontakte = $this->vkontakte;
            $data->save();

        }

        if ($this->instagram) {
            $this->validate([
                'instagram' => 'required|unique:users',
            ]);
            $data = User::find(auth()->user()->id);
            $data->instagram = $this->instagram;
            $data->save();
        }
        if ($this->whatsapp) {
            $this->validate([
                'whatsapp' => 'required|unique:users',
            ]);
            $data = User::find(auth()->user()->id);
            $data->whatsapp = $this->whatsapp;
            $data->save();
        }
        if ($this->odnoklassniki) {
            $this->validate([
                'odnoklassniki' => 'required|unique:users',
            ]);
            $data = User::find(auth()->user()->id);
            $data->odnoklassniki = $this->odnoklassniki;
            $data->save();
        }
        if ($this->telegram) {
            $this->validate([
                'telegram' => 'required|unique:users',
            ]);
            $data = User::find(auth()->user()->id);
            $data->telegram = $this->telegram;
            $data->save();
        }
        if ($this->facebook) {
            $this->validate([
                'facebook' => 'required|unique:users',
            ]);
            $data = User::find(auth()->user()->id);
            $data->facebook = $this->facebook;
            $data->save();

        }
        $this->resetInput();
    }

    public function EditDescription($id)
    {
        $editDesc = Desc::query()->where('user_id', auth()->user()->id)->findOrFail($id);
        $this->description_id = $id;
        $this->description = $editDesc->description;
    }

    public function storeDescription()
    {
        $this->validate([
            'description' => 'required',
        ]);
        $description = Desc::query()->where('user_id', auth()->user()->id)->updateOrCreate(['id' => $this->description_id], [
            'description' => $this->description,
            'user_id' => auth()->user()->id,
        ]);
        Sortable::query()->updateOrInsert([
            'type_id' => $description->id,
            'type' => 'description',
            'user_id' => auth()->user()->id
        ]);
        $this->resetInput();
    }

    public function storeLink()
    {
//        dd($this->type_link);
        $this->validate([
            'title' => 'required|min:3|max:50',
            'link' => 'required_if:parent_title,telegram,youtube,default',
//            'parent_title' => 'required|min:3|max:50',
        ]);

        $link = Link::query()->where('user_id', auth()->user()->id)->updateOrCreate(['id' => $this->link_id], [
            'title' => $this->title,
            'link' => $this->link,
            'type_link' => $this->type_link,
            'parent_title' => $this->parent_title,
            'user_id' => auth()->user()->id,
        ]);
        Sortable::query()->updateOrInsert([
            'type_id' => $link->id,
            'type' => 'link',
            'user_id' => auth()->user()->id
        ]);
        $this->resetInput();

    }

    public function reviewEdit($id)
    {
        $review = Reviews::query()->findOrFail($id);
        $this->review_id = $id;
        $this->name = $review->name;
        $this->review = $review->review;

    }

    public function storeReview()
    {
        $this->validate([
            'name' => 'required|max:250|min:3',
            'review' => 'required|max:250|min:5',
        ]);
        $review = Reviews::query()->where('user_id', auth()->user()->id)->updateOrCreate(['id' => $this->review_id], [
            'name' => $this->name,
            'review' => $this->review,
            'user_id' => auth()->user()->id,
            'author_id' => auth()->user()->id,
        ]);

        if ($this->photos) {
            Image::query()->where('user_id', auth()->user()->id)->where('review_id', $review->id)->delete();
            foreach ($this->photos as $photo) {
                $storedImage = $photo->store('photos');
                Image::query()->create([
                    'url' => $storedImage,
                    'user_id' => auth()->user()->id,
                    'review_id' => $review->id,
                ]);
            }
        }
        if ($this->video) {
            Video::query()->where('user_id', auth()->user()->id)->where('review_id', $review->id)->delete();
            Video::query()->create([
                'url' => $this->video,
                'review_id' => $review->id,
                'user_id' => auth()->user()->id,
            ]);
        }
        Sortable::query()->updateOrInsert([
            'type_id' => $review->id,
            'type' => 'review',
            'user_id' => auth()->user()->id
        ]);
        $this->resetInput();
    }

    public function openModalLink()
    {
        $this->show_link = !$this->show_link;
    }

    public function edit($id)
    {
        $this->isOpen = true;
        $socialEdit = User::query()->where('id', $id)->first();
        $this->user_id = $id;
        $this->facebook = $socialEdit->facebook;
        $this->background = $socialEdit->background;
        $this->name = $socialEdit->name;
        $this->slug = $socialEdit->slug;
        $this->instagram = $socialEdit->instagram;
        $this->vkontakte = $socialEdit->vkontakte;
        $this->telegram = $socialEdit->telegram;
        $this->whatsapp = $socialEdit->whatsapp;
        $this->odnoklassniki = $socialEdit->odnoklassniki;


//        $this->openModalEdit();
    }


    public function openModal()
    {
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->isOpen = true;
    }

    public function openModalEdit()
    {
        $this->isUpdate = true;
    }

    public function destroy($id)
    {
        if ($id) {
            $record = User::query()->where('id', $id);
            $record->delete();
        }
    }
}
