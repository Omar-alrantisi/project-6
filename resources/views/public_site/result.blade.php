@extends('public_site.layouts.master')
@section('content')


    <div class="card w-50 m-auto mt-5 bg-white" style=" background-color:#f6efef ">
        <div class="card-header"> <h4>{{auth()->user()->name}}</h4> </div>
        <div class="card-body">

            <h4 >Exam name: <span style="font-size: 16px ; font-weight: 300">  {{$select_exam->name}}</span></h4> 
            
            <h5 class="card-title">Your Result is: {{$user_score}} / {{$total_score}} </h5>
            @if ($is_pass === 1 )
            
            <h3 style="color:green"> Pass </h3>
             @else 
            <h5 style="color: red"> Failed </h5>
            @endif 

            {{-- <a href="{{ route('questions_page',$exam->id )}}" id="ux" class="start_quiz_btn">Start</a> --}}


            
          
        </div>
      </div>
</div>
<table class="table w-50 m-auto mt-5 bg-white">
  <thead>
    <tr>
      <th scope="col">Exam Name</th>
      <th scope="col">Your Result</th>
      <th scope="col">Date</th>
    </tr>
  </thead>
  <tbody>

      @foreach ($results as $result)
      @foreach ($exams as $exam)
      @if ($exam->id ===  $result->exam_id)
      <tr>
          <th scope="row">
              {{$exam->name }}

          </th>
          <td>
              {{$result->result }}

          </td>
          <td>
              {{$result->created_at }}
          </td>


        </tr>

       @endif
      @endforeach
      @endforeach

  </tbody>
</table>
@endsection
