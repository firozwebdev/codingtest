@extends('layouts.app')
@section('content')

  <style>

     .form-group{
        display: inline-block !important;
     }
  </style>

   <div class="container-fluid app-body settings-page">
      <h3>Recent Post sent to Buffer</h3>
      <form action="/search" method="get">
         <div class="form-group">
            
            <input class="form-control"  type="text" name="text" placeholder="search">
         </div>
         {{-- <div class="input-group date " data-provide="datepicker">
            <input type="text" class="form-control datepicker">
            <div class="input-group-addon">
                <span class="glyphicon glyphicon-th"></span>
            </div>
        </div> --}}
         
         <div class="form-group">
           
           <select class="form-control" name="_id" id="">
              <option value="All Group">All Group</option>
              @foreach($groups as $group)
               <option value="{{ $group->id }}">{{ $group->name }}</option>
              @endforeach
           </select>
         </div>
         <div class="form-group">
           
            <button class="btn btn-primary"  type="submit">Search</button>
         </div>
      </form>
      

      <table class="table table-striped">
         <thead>
            <tr>
               <th>No.</th>
               <th>Group Name</th>
               <th>Group Type</th>
               <th>Account Name</th>
               <th>Post Text</th>
               <th>Time</th>
            </tr>
         </thead>
         <tbody>
            @foreach ($buffer_postings as $item)
               <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $item->groupInfo->name}}</td>
                  <td>{{ $item->groupInfo->type}}</td>
                  <td>{{ $item->groupInfo->name}}</td>
                  <td>{{ $item->post_text }}</td>
                  <td>{{ ($item->created_at)->toDayDateTimeString() }}</td>
               </tr>
            @endforeach
           
            </tr>
         </tbody>
      </table>
      {{ $buffer_postings->links() }}
   </div>


   @endsection
