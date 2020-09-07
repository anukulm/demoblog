<?php

   namespace App;

    use Illuminate\Notifications\Notifiable;
    use Illuminate\Foundation\Auth\User as Authenticatable;

    class Category extends Authenticatable
    {
        use Notifiable;

        protected $table = 'blog_category';
        const CREATED_AT = 'prep_date';
        const UPDATED_AT = 'mod_date';
   
        protected $fillable = [
      'id', 'sr_name', 'sr_status', 'prep_emp', 'prep_date', 'mod_emp', 'mod_date', 'reject_emp', 'reject_date','cancel_date'
        ];

 
    }