<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Hootlex\Moderation\Moderatable;
class Post extends Model
{
    use Moderatable;
}
