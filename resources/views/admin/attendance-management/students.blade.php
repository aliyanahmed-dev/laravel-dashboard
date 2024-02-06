@if($students)
@foreach($students as $key => $student)
<input type="hidden" name="students[{{$key}}][id]" value="{{$student->id}}">
<div class="student-checkboxes-item">
    <div class="form-check">
        <input class="form-check-input" id="student-check-{{$key}}" type="checkbox" name="students[{{$key}}][status]" value="1">
        <label class="form-check-label" for="student-check-{{$key}}">{{($student->full_name) ?? $student->name}}</label>
    </div>
</div>
@endforeach
@endif