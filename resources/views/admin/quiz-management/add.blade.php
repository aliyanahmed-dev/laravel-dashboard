@extends('admin.layouts.simple.master')

@section('title', 'Quiz')

@section('css')
<style>

</style>
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
<h3>Quiz</h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">Dashboard</li>
<li class="breadcrumb-item active">Quiz</li>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row second-chart-list third-news-update">
        <div class="col-xl-12 xl-100 dashboard-sec box-col-12">
            <div class="card">
                <div class="card-header">
                    <h5>Add Quiz</h5>
                </div>
                <form class="form theme-form bold-labels" action="" method="POST" enctype="multipart/form-data" id="add-quiz-form">
                     <div class="loader-main" style="display: none;">
                         <div class="loader"></div>
                     </div>

                    @csrf
                    <div class="card-body">
                        @if($errors->any())

                        <div class="alert alert-danger dark alert-dismissible fade show" role="alert">
                            {!! implode('', $errors->all('<div>:message</div>')) !!}
                            <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close" data-bs-original-title="" title=""></button>
                        </div>
                        @endif
                        @if(Session::has('message'))
                        <div class="alert alert-success dark alert-dismissible fade show" role="alert">
                            <strong>Updates ! </strong> {{ Session::get('message') }}.
                            <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close" data-bs-original-title="" title=""></button>
                        </div>
                        @endif


                        <div class="row">
                            <div class="col">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="mb-3">
                                            <label class=" col-form-label">Name </label>
                                            <div class="">
                                                <input class="form-control" type="text" required name="name" value="{{ old('name') }}" placeholder="Quiz Name" data-bs-original-title="" title="">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-4">
                                        <div class="mb-3">
                                            <label class=" col-form-label">Batch </label>
                                            <div class="">

                                                <select name="batch" id="" class="form-control">
                                                    <option value="" selected disabled>-- Select a Batch --</option>
                                                    @foreach($batches as $batch)
                                                    <option value="{{$batch->id}}" {{ (old('batch') == $batch->id) ? 'selected' : '' }}>{{$batch->name}}-{{$batch->batch_id}} </option>
                                                    @endforeach


                                                </select>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-4">
                                        <div class="mb-3">
                                            <label class=" col-form-label">Difficulty </label>
                                            <div class="">

                                                <select name="difficulty" id="" class="form-control">
                                                    <option value="" selected disabled>-- Select a Difficulty --</option>

                                                    <option value="easy" {{ (old('batch') == 'easy') ? 'selected' : '' }}>Easy</option>
                                                    <option value="intermediate" {{ (old('batch') == 'intermediate') ? 'selected' : '' }}>Intermediate</option>
                                                    <option value="hard" {{ (old('batch') == 'hard') ? 'selected' : '' }}>Hard</option>



                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-4">
                                        <div class="mb-3">
                                            <label class=" col-form-label">Duration in Minutes </label>
                                            <div class="">
                                                <input class="form-control" type="number" required name="duration" value="{{ old('duration') }}" placeholder="Quiz Duration Time" data-bs-original-title="" title="">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-4">
                                        <div class="mb-3">
                                            <label class=" col-form-label">Start Date </label>
                                            <div class="">
                                                <input class="form-control" type="date" required name="startdate" value="{{ old('startdate') }}" placeholder="Start Date" data-bs-original-title="" title="">
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-4">
                                        <div class="mb-3">
                                            <label class=" col-form-label">End Date </label>
                                            <div class="">
                                                <input class="form-control" type="date" required name="enddate" value="{{ old('enddate') }}" placeholder="End Date" data-bs-original-title="" title="">
                                            </div>
                                        </div>
                                    </div>



                                    <div class="col-12 my-4">

                                        <div class="quiz-questions-main">
                                            <h4>Add Questions</h4>
                                            <div class="quiz-question-items-main" id="questions-main" data-count="{{ count(ARRAY()) }}" data-option-main>
                                                <div class="quiz-question-item">

                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="mb-3">
                                                                <label class=" col-form-label">Question </label>
                                                                <div class="">
                                                                    <input class="form-control" type="text" required name="question[0]['text']" value='{{ old("question[0]['text']") }}' placeholder="Question" data-bs-original-title="" title="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="mb-3">
                                                                <label class=" col-form-label">Question Description </label>
                                                                <div class="">
                                                                    <textarea id="" class="form-control" rows="4" name="question[0]['description']" value='{{ old("question[0]['description']") }}' placeholder="Description Here"></textarea>

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="mb-3">
                                                                <label class=" col-form-label">Marks</label>
                                                                <div class="">
                                                                    <input class="form-control" type="text" required name="question[0]['mark']" value='{{old("question[0]['mark']")}}' placeholder="Marks" data-bs-original-title="" title="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="mb-3">
                                                                <label class=" col-form-label">Question Type</label>
                                                                <div class="">
                                                                    <select name="question[0]['type']" id="" class="form-control">
                                                                        <option value="" selected disabled>-- Select Option --</option>
                                                                        <option value="one" {{ (old("question[0]['type']" == 'one') ? 'selected' : '' ) }}>One</option>
                                                                        <option value="mutiple" {{ (old("question[0]['type']" == 'mutiple') ? 'selected' : '' ) }}>Multiple</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="quiz-question-options">
                                                                <h5>Add Options</h5>
                                                                <div id="quiz-options-container-0" data-count="0">
                                                                    <div class="option-item" data-option="0" data-option-main="0">
                                                                        <div class="col-12">
                                                                            <div class="option-item-con">
                                                                                <div class="">
                                                                                    <div class="input-group">
                                                                                        <div class="input-group-text">
                                                                                            <input class="form-check-input mt-0  option-answer-div" type="checkbox" value="correct" name="question[0]['option'][0]['answer']">
                                                                                        </div>
                                                                                        <input class="form-control  option-div" type="text" name="question[0]['option'][0]['text']" value='{{old("question[0]['option'][0]['text']")}}' placeholder="Add Option" id="">
                                                                                        <!-- <button class="option-remove-btn" type="button">
                                                                                            <i class="fa fa-trash-o"></i>
                                                                                        </button> -->
                                                                                    </div>
                                                                                </div>

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="option-btn-container">
                                                                    <button class="add-option btn btn-primary" onclick="addOption(0)" type="button">
                                                                        Add Option
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="addquestion-btns mt-3">
                                                <button id="addquestion-btn" class="btn btn-primary" type="button">Add Question</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-end">
                        <div class="col-sm-9 offset-sm-3">
                            <button class="btn btn-primary" type="button" id="add-quiz-btn" data-bs-original-title="" title="">Add Quiz</button>
                            <a href="{{ route('batches.index') }}" class="btn btn-light">Cancel</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>
<script type="text/javascript">
    var session_layout = "{{ session()->get('layout ') }}";
</script>
@endsection

@section('script')
<script>
    $('#addquestion-btn').click(function() {
        var count = parseInt($(`#questions-main`).attr('data-count'));
        count++;
        $(`#questions-main`).attr('data-count', count);
        var item = `
        <div class="quiz-question-item">
            <div class="question-remove-btn-container">
                <button type="button" class="question-remove-btn" ><i class="fa fa-trash-o"></i></button>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="mb-3">
                        <label class=" col-form-label">Question </label>
                        <div class="">
                            <input class="form-control" type="text" required name="question[${count}]['text']" value='' placeholder="Question" data-bs-original-title="" title="">
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="mb-3">
                        <label class=" col-form-label">Question Description </label>
                        <div class="">
                            <textarea id="" class="form-control" rows="4" name="question[${count}]['description']" value='' placeholder="Description Here"></textarea>

                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-3">
                        <label class=" col-form-label">Marks</label>
                        <div class="">
                            <input class="form-control" type="text" required name="question[${count}]['mark']" value="" placeholder="Marks" data-bs-original-title="" title="">
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-3">
                        <label class=" col-form-label">Question Type</label>
                        <div class="">
                            <select name="question[${count}]['type']" id="" class="form-control">
                                <option value="" selected disabled>-- Select Option --</option>
                                <option value="one">One</option>
                                <option value="mutiple">Multiple</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="quiz-question-options">
                        <h5>Add Options</h5>
                        <div id="quiz-options-container-${count}" data-count="{{ count(ARRAY()) }}" data-question-count="${count}">
                            <div class="option-item" data-option="0"  data-option-main="${count}">
                                <div class="col-12">
                                    <div class="option-item-con">
                                        <div class="">
                                            <div class="input-group">
                                                <div class="input-group-text">
                                                    <input class="form-check-input mt-0 option-answer-div" type="checkbox" value="correct" name="question[${count}]['option'][0]['answer']" >
                                                </div>
                                                <input class="form-control option-div" type="text" name="question[${count}]['option'][0]['text']" placeholder="Add Option" id="">
                                               
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="option-btn-container">
                            <button class="add-option btn btn-primary" onclick="addOption(${count})" type="button">
                                Add Option
                            </button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
     `;
        $(`#questions-main`).append(item);

    });


    function addOption(countData) {
        var count = parseInt($(`#quiz-options-container-${countData}`).attr('data-count'));
        console.log(count);
        var index = count;
        count++;
        $(`#quiz-options-container-${countData}`).attr('data-count', count);
        var item = `
        <div class="option-item" data-option="${count}"  data-option-main="${countData}">
            <div class="col-12">
                <div class="option-item-con">
                    <div class="">
                        <div class="input-group">
                            <div class="input-group-text">
                                <input class="form-check-input mt-0 option-answer-div" type="checkbox" value="correct" name="question[${countData}]['option'][${count}]['answer']">
                            </div>
                            <input class="form-control option-div" type="text" name="question[${countData}]['option'][${count}]['text']" placeholder="Add Option" id="">
                            <button class="option-remove-btn" type="button">
                                <i class="fa fa-trash-o"></i>
                            </button> 
                        </div>
                    </div>

                </div>
            </div>
        </div>
        `;
        $(`#quiz-options-container-${countData}`).append(item);
    }


    $(document).on('click', '.question-remove-btn', function() {
        var count = parseInt($('#questions-main').attr('data-count'));
        count--;
        $('#questions-main').attr('data-count', count);
        $(this).closest('.quiz-question-item').remove();


        $('#questions-main .quiz-question-item').each(function(index) {
            var newIndex = index;
            $(this).find('input').each(function() {
                var oldName = $(this).attr('name');
                var newName = oldName.replace(/\[\d+\]/, '[' + newIndex + ']');
                $(this).attr('name', newName);
            });
            $(this).find('select').each(function() {
                var oldName = $(this).attr('name');
                var newName = oldName.replace(/\[\d+\]/, '[' + newIndex + ']');
                $(this).attr('name', newName);
            });
        });
    });

    $(document).on('click', '.option-remove-btn', function() {
        var sizeData = parseInt($(this).closest('.quiz-question-item').parent().attr('data-count'));
        let materialItem = $(this).closest('[data-option]');
        var optionmainContainerId = parseInt(materialItem.attr('data-option-main'));
        let materialCount = parseInt(materialItem.attr('data-option'));
        let allNextMetarialItems = materialItem.nextAll()
        var count = parseInt($(`#quiz-options-container-${optionmainContainerId}`).attr('data-count'));
        // console.log(sizeData);


        if (allNextMetarialItems.length > 0) {
            allNextMetarialItems.each(function() {
                $(this).attr('data-option', materialCount);
                // console.log(materialCount);
                var oldName = $(this).find('input.option-div').attr('name');
                var oldAns = $(this).find('input.option-answer-div').attr('name');
                // console.log(oldName);
                var newName = oldName.replace(/\['option'\]\[(\d+)\]/g, "['option'][" + materialCount + "]");
                $(this).find('input.option-div').attr('name', newName);
                var newAns = oldAns.replace(/\['option'\]\[(\d+)\]/g, "['option'][" + materialCount + "]");
                $(this).find('input.option-answer-div').attr('name', newAns);




                // console.log(newName);
                materialCount++;
            });
        }

        if (count > 0) {
            count--;
            $(`#quiz-options-container-${optionmainContainerId}`).attr('data-count', count);
            materialItem.remove();
        }
    });
    
    $('#add-quiz-btn').click(function(e){
    $('.loader-main').show();
    e.preventDefault();

    var data = new FormData(document.getElementById("add-quiz-form"));
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
        $.ajax({
    			type:'POST',
    			url:'{{route('quiz.store')}}',
    			data:data,
			    enctype: 'multipart/form-data',
                processData: false,  // tell jQuery not to process the data
                contentType: false,   // tell jQuery not to set contentType
               
    			success:function(data) {
    
                  $('.loader-main').hide();
                   
                if(data.status == 1){
                    Swal.fire({
                      icon: 'success',
                      title: 'Success!',
                      text: 'Quiz Added',
                      showConfirmButton: false,
                      timer: 2000
                    });
    
                    $('#add-quiz-form')[0].reset();
                    setInterval(() => {
                        
                         window.location.href = "{{route('quiz.index')}}";
                    }, 2500);
                     
                }else if(data.status == 2){
                    
                    Swal.fire({
                      icon: 'success',
                      title: 'Error!',
                      text: data.error,
                      icon: 'error',
                      confirmButtonText: 'OK'
                    });
 
            }
            // $('#updatepwd')[0].reset();
    	    }
    
    			});
    })



    // var editor = new Quill('.text-editor');
    var options = {
        debug: 'info',
        modules: {
            toolbar: '#in_toolbar'
        },
        placeholder: 'Compose an epic...',
        readOnly: true,
        theme: 'snow'
    };
    var editor = new Quill('#in_editor', options);
</script>
@endsection