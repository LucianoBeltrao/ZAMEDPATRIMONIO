<?php

namespace App\Livewire\Forms;

use App\Models\Asset;
use Livewire\Attributes\Validate;
use Livewire\Form;
use Illuminate\Support\Str;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class AssetForm extends Form
{
    use WithFileUploads;

    public ?Asset $asset;

    #[Validate('min:1')]
    public $record = '';

    #[Validate('min:1')]
    public $category_id = '';

    #[Validate('required|min:5')]
    public $name = '';

    #[Validate('min:5')]
    public $description = '';

    #[Validate('required|min:5')]
    public $price = '';

    #[Validate('required|image|max:1024')] // 1MB Max
    public $photo;

    public function setAsset(Asset $asset)
    {
        $this->asset = $asset;

        $this->record = $asset->record;

        $this->category_id = $asset->category_id;

        $this->name = $asset->name;

        $this->description = $asset->description;

        $this->price = $asset->price;
    }

    public function update()

    {

        if ($this->photo) {
            

            $filename =  Str::slug($this->asset->name) . '.' . $this->photo->getClientOriginalName();

            $path = $this->photo->storeAs('assets', $filename, 'public');

            $this->asset->profile_photo_path = $path;

            
        }

        $this->asset->update(
            $this->all()
        );
    }
}
