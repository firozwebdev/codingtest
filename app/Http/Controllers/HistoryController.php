<?php

namespace Bulkly\Http\Controllers;

use Bulkly\User;
use Bulkly\BufferPosting;
use Bulkly\SocialPostGroups;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HistoryController extends Controller
{
    public function index()
 	{ 
        if(!Auth::guard('web')->check()){
            return redirect('/login');
        }
        $user = User::find(Auth::id());
        $groups = SocialPostGroups::all();
        $buffer_postings = BufferPosting::orderBy('id','desc')->paginate(10);
        //return $buffer_postings;
        return view('pages.history',compact('user','buffer_postings','groups'));
        
      }    
      
      
      public function search(Request $request)
 	{ 

        
        if(!Auth::guard('web')->check()){
            return redirect('/login');
        }
        $groups = SocialPostGroups::all();
        $search_term = $request->get('search');
        $group = $request->get('_id');

        
        if($search_term &&  $group == '0'){
            // $buffer_postings = BufferPosting::with(['groupInfo' => function($q) use($search_term){
            //     $q->where('groupInfo.name', 'like', '%'.$search_term.'%'); 
            // }])->orderBy('id','desc')->paginate(10);
            
            $buffer_postings = BufferPosting::with('groupInfo')->orderBy('id','desc')->paginate(10);
            return $buffer_postings;
            return view('pages.search',compact('buffer_postings','groups'));
        }
        
        if($search_term &&  $group ){
            //$buffer_postings = BufferPosting::where('')->orderBy('id','desc')->paginate(10);
            return 'both';
        } 
        
        if($group ){
            //$buffer_postings = BufferPosting::where('')->orderBy('id','desc')->paginate(10);
            return 'group';
        }
        
        //return view('pages.search',compact('buffer_postings','groups'));
        
      }
      

}
