<?php
/**
 * Created by PhpStorm.
 * User: Ahmed-pc
 * Date: 8/28/2019
 * Time: 9:43 PM
 */

namespace App\Http\Controllers;


use App\classes\Upload;
use App\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function getNews(){
        return News::all();
    }

    public function addNews(Request $request){

        $result['path'] = $request->photo ;
        if(isset($request->newsImage)){
            $result = Upload::newsImage('newsImage',date(time()) );
        }

        if(isset($request->id)){
            // update
            return News::where('id',$request->id)->update([
                'title' => $request->title,
                'description' => $request->description,
                'link' => $request->link,
                'date' => $request->date,
                'photo' => $result['path']
            ]);
        }
        else{
            // create
            return News::create([
                'title' => $request->title,
                'description' => $request->description,
                'link' => $request->link,
                'date' => $request->date,
                'photo' => $result['path']
            ]);
        }
    }

    public function deleteNews(Request $request){
        // delete job post
        $Post = News::where('id',$request->newsID);
        $Post->delete();
        return 'news post has been deleted';

    }

}