<?php

namespace App\Http\Middleware;

use App\Category;
use App\Setting;
use Closure;

class WebInit
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
   public function handle($request, Closure $next)
  {
        if(!session('setting')){
       session(['setting' => Setting::find(1)]);
         }
       return $next($request);
   }


    // public function handle($request, Closure $next)
    // {
    //     session(['setting' => Setting::find(1)]);

    //     $categories = Category::where([['parent_id', 0]])->get();
    //     $this->array['parent-0'] = $categories->toArray();
    //     if (count($categories) > 0) {
    //         foreach ($categories as $category) {
    //             $this->array['parent-' . $category->id] = $this->RecursiveSubcategoryGetter($category->id);
    //         }
    //     }

    //     view()->share('nav_categories', $this->array);
    //     return $next($request);
    // }

    // protected function RecursiveSubcategoryGetter($parent_id)
    // {
    //     $categories = Category::where([['parent_id', $parent_id]])->get();
    //     if (count($categories) > 0) {
    //         foreach ($categories as $category) {
    //             $this->array['parent-' . $category->id] = $this->RecursiveSubcategoryGetter($category->id);
    //         }
    //     }
    //     return $categories->toArray();
    // }
}
