@extends('admin.layouts.simple.master')

@section('title', 'Default')

@section('css')

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
                    <h5>Edit Quiz</h5>
                </div>
                <form class="form theme-form bold-labels" action="{{ route('quiz.update', $quiz->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
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
                                                <input class="form-control" type="text" required name="name" value="{{$quiz->name}}" placeholder="Quiz Name" data-bs-original-title="" title="">
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
                                                    <option value="{{$batch->id}}" {{ ($quiz->batch_id == $batch->id) ? 'selected' : '' }}>{{$batch->name}}-{{$batch->batch_id}} </option>
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

                                                    <option value="easy" {{ ($quiz->difficulty == 'easy') ? 'selected' : '' }}>Easy</option>
                                                    <option value="intermediate" {{ ($quiz->difficulty == 'intermediate') ? 'selected' : '' }}>Intermediate</option>
                                                    <option value="hard" {{ ($quiz->difficulty == 'hard') ? 'selected' : '' }}>Hard</option>



                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="mb-3">
                                            <label class=" col-form-label">Duration in Minutes </label>
                                            <div class="">
                                                <input class="form-control" type="number" required name="duration" value="{{ $quiz->duration }}" placeholder="Quiz Duration Time" data-bs-original-title="" title="">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-4">
                                        <div class="mb-3">
                                            <label class=" col-form-label">Start Date </label>
                                            <div class="">
                                                <input class="form-control" type="date" required name="startdate" value="{{ $quiz->startdate }}" placeholder="Start Date" data-bs-original-title="" title="">
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-4">
                                        <div class="mb-3">
                                            <label class=" col-form-label">End Date </label>
                                            <div class="">
                                                <input class="form-control" type="date" required name="enddate" value="{{ $quiz->enddate }}" placeholder="End Date" data-bs-original-title="" title="">
                                            </div>
                                        </div>
                                    </div>



                                    <div class="col-12 my-4">

                                        <div class="quiz-questions-main">
                                            <h4>Add Questions</h4>
                                            <div class="quiz-question-items-main" id="questions-main" data-count="{{ count($quiz->questions)-1 }}">
                                                @foreach($quiz->questions as $key => $question)
                                                <div class="quiz-question-item">
                                                    <div class="question-remove-btn-container">
                                                        <button type="button" class="question-remove-btn"><i class="fa fa-trash-o"></i></button>
                                                    </div>
                                                    <input type="hidden" name="question[{{$key}}]['id']" value="{{ $question->id }}" class="exist-question">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="mb-3">
                                                                <label class=" col-form-label">Question </label>
                                                                <div class="">
                                                                    <input class="form-control" type="text" required name="question[{{$key}}]['text']" value="{{ $question->question }}" placeholder="Question" data-bs-original-title="" title="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="mb-3">
                                                                <label class=" col-form-label">Question Description </label>
                                                                <div class="">
                                                                    <textarea id="" class="form-control" rows="4" name="question[{{$key}}]['description']" value='{{ $question->description }}' placeholder="Description Here"></textarea>

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="mb-3">
                                                                <label class=" col-form-label">Marks</label>
                                                                <div class="">
                                                                    <input class="form-control" type="text" required name="question[{{$key}}]['mark']" value="{{ $question->mark }}" placeholder="Marks" data-bs-original-title="" title="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="mb-3">
                                                                <label class=" col-form-label">Question Type</label>
                                                                <div class="">
                                                                    <select name="question[{{$key}}]['type']" id="" class="form-control">
                                                                        <option value="" selected disabled>-- Select Option --</option>
                                                                        <option value="one" {{ ($question->option_type == 'one') ? 'selected' : '' }}>One</option>
                                                                        <option value="mutiple" {{ ($question->option_type == 'mutiple') ? 'selected' : '' }}>Multiple</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="quiz-question-options">
                                                                <h5>Add Options</h5>
                                                                <div id="quiz-options-container-{{ $key }}" data-count="{{ count($question->quizoptions) -1 }}">
                                                                    @foreach($question->quizoptions as $key2 => $option)
                                                                    <div class="option-item" data-option="{{ $key2 }}" data-option-main="{{ $key }}">
                                                                        <input type="hidden" name="question[{{$key}}]['option'][{{$key2}}]['id']" value="{{ $option->id }}" class="exist-option option-id-div">
                                                                        <div class="col-12">
                                                                            <div class="option-item-con">
                                                                                <div class="">
                                                                                    <div class="input-group">
                                                                                        <div class="input-group-text">
                                                                                            <input class="form-check-input mt-0 option-answer-div" type="checkbox" value="correct" name="question[{{$key}}]['option'][{{$key2}}]['answer']" {{($option->is_correct == 1) ? 'checked' : ''}}>
                                                                                        </div>
                                                                                        <input class="form-control option-div" type="text" name="question[{{$key}}]['option'][{{$key2}}]['text']" placeholder="Add Option" id="" value="{{$option->option}}">
                                                                                        <button class="option-remove-btn" type="button">
                                                                                            <i class="fa fa-trash-o"></i>
                                                                                        </button>
                                                                                    </div>
                                                                                </div>

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    @endforeach

                                                                </div>
                                                                <div class="option-btn-container">
                                                                    <button class="add-option btn btn-primary" onclick="addOption({{$key}})" type="button">
                                                                        Add Option
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                                @endforeach
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
                            <button class="btn btn-primary" type="submit" data-bs-original-title="" title="">Update Question</button>
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
                            <input class="form-control" type="text" required name="question[${count}]['text']" value="" placeholder="Question" data-bs-original-title="" title="">
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
                            <input class="form-control" type="text" required name="question[${count}]['mark']" value="{{ old('mark') }}" placeholder="Marks" data-bs-original-title="" title="">
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
        var currentquestion = $(this).parent().siblings('.exist-question');
        if (currentquestion.length > 0) {
            var questionId = currentquestion.val();
            if (confirm('Are you sure you want to delete this question?')) {
                // Make an AJAX request to delete the question
                var csrfToken = $('meta[name=csrf-token]').attr('content');
                $.ajax({
                    url: '{{route("quiz.delete-question")}}',
                    type: 'POST',
                    data: {
                        questionId: questionId,
                        _token: csrfToken
                    },
                    success: function(response) {
                        console.log(response.message);
                    },
                    error: function(error) {
                        console.error('Error deleting question:', error);
                    }
                });
            }

        }
        // simple code
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
        // end simple code

    });


    $(document).on('click', '.option-remove-btn', function() {
        var sizeData = parseInt($(this).closest('.quiz-question-item').parent().attr('data-count'));
        let materialItem = $(this).closest('[data-option]');
        var optionmainContainerId = parseInt(materialItem.attr('data-option-main'));
        let materialCount = parseInt(materialItem.attr('data-option'));
        let allNextMetarialItems = materialItem.nextAll()
        var count = parseInt($(`#quiz-options-container-${optionmainContainerId}`).attr('data-count'));
        // console.log(sizeData);

        var currentoption = $(this).closest('.option-item').children('.exist-option');
        if (currentoption.length > 0) {
            var optionId = currentoption.val();
            if (confirm('Are you sure you want to delete this question?')) {
                // Make an AJAX request to delete the question
                var csrfToken = $('meta[name=csrf-token]').attr('content');
                $.ajax({
                    url: '{{route("quiz.delete-option")}}',
                    type: 'POST',
                    data: {
                        optionId: optionId,
                        _token: csrfToken
                    },
                    success: function(response) {
                        console.log(response.message);
                    },
                    error: function(error) {
                        console.error('Error deleting option:', error);
                    }
                });
            }

        }


        if (allNextMetarialItems.length > 0) {
            allNextMetarialItems.each(function() {
                $(this).attr('data-option', materialCount);
                // console.log(materialCount);
                var oldName = $(this).find('input.option-div').attr('name');
                var oldAns = $(this).find('input.option-answer-div').attr('name');
                var oldID = $(this).find('input.option-id-div').attr('name');
                // console.log(oldName);
                var newName = oldName.replace(/\['option'\]\[(\d+)\]/g, "['option'][" + materialCount + "]");
                $(this).find('input.option-div').attr('name', newName);
                var newAns = oldAns.replace(/\['option'\]\[(\d+)\]/g, "['option'][" + materialCount + "]");
                $(this).find('input.option-answer-div').attr('name', newAns);
                if (oldID) {
                    var newID = oldID.replace(/\['option'\]\[(\d+)\]/g, "['option'][" + materialCount + "]");
                    $(this).find('input.option-id-div').attr('name', newID);
                }



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

    function thumb(input) {
        if (input.files && input.files[0]) {

            var reader = new FileReader();

            reader.onload = function(e) {
                $('.thumbnail-img')
                    .attr('src', e.target.result);

            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endsection