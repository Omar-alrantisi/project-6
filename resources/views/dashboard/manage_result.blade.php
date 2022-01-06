@extends('dashboard.layouts.master')
@section('content')

<div class="col-lg-12">
    <div class="col-md-12">
        <!-- DATA TABLE-->
        <div class="table-responsive m-b-40">
            <table class="table table-borderless table-data3">
                <thead>
                    <tr>
                        <th>User Name</th>
                        <th>Exam Name</th>
                        <th>Result</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>

    @foreach ($results as $result)
      @foreach ($exams as $exam)
       @foreach ($users as $user)
      @if ($exam->id ===  $result->exam_id && $result->user_id == $user->id)
      <tr>
          <td scope="row"> {{$exam->name }} </td>
          <td            >{{$result->result }} </td>
          <td>{{$user->name}}</td>
          <td><a href="{{route('result.destroy',['id'=>$result->id])}}"><i class="cursor-pointer fas fa-trash text-secondary"></i></a></td>


        </tr>

       @endif
      @endforeach
      @endforeach
      @endforeach
                </tbody>
            </table>
        </div>
        <!-- END DATA TABLE-->
    </div>
@endsection
