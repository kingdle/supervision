<?php

namespace App\Admin\Extensions\Form;
use Encore\Admin\Form\Field;
class CKEditor extends Field
{
    public static $js = [
        'vendor/ckeditor2/ckeditor.js',
        'vendor/ckeditor2/adapters/jquery.js',
    ];
    protected $view = 'admin.ckeditor';
    public function render()
    {
        $this->script = "$('textarea.{$this->id}').ckeditor();";
        return parent::render();
    }
}
