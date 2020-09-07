<?php

   namespace App;

    use Illuminate\Notifications\Notifiable;
    use Illuminate\Foundation\Auth\User as Authenticatable;

    class Blog extends Authenticatable
    {
        use Notifiable;

        protected $table = 'blogs';
        const CREATED_AT = 'prep_date';
        const UPDATED_AT = 'mod_date';
   
        protected $fillable = [
       'id', 'sr_name', 'sr_desc', 'category','sr_status', 'reject_reason', 'prep_date', 'mod_emp', 'mod_date', 'reject_emp', 'reject_date'
        ];

 
    }