$(document).ready(function() {
    $('#addSlider').click(function() {
        var count = parseInt($('#sliderContainer').attr('data-count'));
        var index = count; // Store the current count in a separate variable
        count++;
        console.log(count);
        $('#sliderContainer').attr('data-count', count);
        var item = `
        <div class="repeater-item border p-4 rounded-3">
            <h4>Slider Item</h4>
            <input type="text" name="slider[${index}][index]" class="form-control" value="${index}">
            <div class="form-group mb-3">
                <label>Title (en):</label>
                <input type="text" name="slider[${index}][title][en]" class="form-control">
            </div>
            <div class="form-group mb-3">
                <label>Title (en):</label>
                <input type="text" name="slider[${index}][title][ar]" class="form-control">
            </div>
            <div class="form-group mb-3">
                <label>Content (en):</label>
                <input type="text" name="slider[${index}][content][en]" class="form-control">
            </div>
            <div class="form-group mb-3">
                <label>Content (ar):</label>
                <input type="text" name="slider[${index}][content][ar]" class="form-control">
            </div>
            <div class="form-group mb-3">
                <label>Button Text (en):</label>
                <input type="text" name="slider[${index}][btn_text][en]" class="form-control">
            </div>
            <div class="form-group mb-3">
                <label>Button Text (ar):</label>
                <input type="text" name="slider[${index}][btn_text][ar]" class="form-control">
            </div>
            <div class="form-group mb-3">
                <label>Button Link:</label>
                <input type="text" name="slider[${index}][btn_link]" class="form-control">
            </div>
            <div class="form-group mb-3">
                <label>Background Image:</label><br>
                <input type="file" name="slider[${index}][bg_img]" class="form-control-file">
            </div>
            <div class="form-group mb-3">
                <label>Slider Image:</label><br>
                <input type="file" name="slider[${index}][sl_img]" class="form-control-file">
            </div>
            <button class="btn btn-danger remove-slider" type="button">Remove Slider Item</button>
        </div>`;
    
        $('#sliderContainer').append(item);
    });
    
    // Remove slider item
    $(document).on('click', '.remove-slider', function() {
        var count = parseInt($('#sliderContainer').attr('data-count'));
        count--;
        $('#sliderContainer').attr('data-count', count);
        $(this).closest('.repeater-item').remove();
    
        // Re-index the input fields
        $('#sliderContainer .repeater-item').each(function(index) {
            var newIndex = index; // Start the new index from 0
            $(this).find('input').each(function() {
                var oldName = $(this).attr('name');
                var newName = oldName.replace(/\[\d+\]/, '[' + newIndex + ']');
                $(this).attr('name', newName);
            });
        });
    });
    



    // Repeater logic for videos
    $('#addVideo').click(function() {
        var count = parseInt($('#videosContainer').attr('data-count'));
        var index = count; // Store the current count in a separate variable
        count++;
        console.log(count);
        $('#videosContainer').attr('data-count', count);

        var item = `
        <div class="repeater-item border p-4 rounded-3">
            <h4>Video</h4>
            <div class="form-group mb-3">
                <label>Video URL:</label>
                <input type="text" name="video[${index}][url]" class="form-control" required>
            </div>
            <button class="btn btn-danger remove-video" type="button">Remove Video</button>
        </div>`;

        $('#videosContainer').append(item);
    });

    // Remove video item
    $(document).on('click', '.remove-video', function() {
        var count = parseInt($('#videosContainer').attr('data-count'));
        count--;
        $('#videosContainer').attr('data-count', count);
        $(this).closest('.repeater-item').remove();
    
        // Re-index the input fields
        $('#videosContainer .repeater-item').each(function(index) {
            var newIndex = index; // Start the new index from 0
            $(this).find('input').each(function() {
                var oldName = $(this).attr('name');
                var newName = oldName.replace(/\[\d+\]/, '[' + newIndex + ']');
                $(this).attr('name', newName);
            });
        });
    });





    // Repeater logic for services
    $('#addService').click(function() {
        var count = parseInt($('#servicesContainer').attr('data-count'));
        var index = count; // Store the current count in a separate variable
        count++;
        console.log(count);
        $('#servicesContainer').attr('data-count', count);

        var item = `
        <div class="repeater-item border p-4 rounded-3">
            <h4>Service</h4>
            <div class="form-group mb-3">
                <label>Image:</label><br>
                <input type="file" name="services[${index}][image1]" class="form-control-file" required>
            </div>
            <div class="form-group mb-3">
                <label>Title (en):</label>
                <input type="text" name="services[${index}][title][en]" class="form-control" required>
            </div>
            <div class="form-group mb-3">
                <label>Title (ar):</label>
                <input type="text" name="services[${index}][title][ar]" class="form-control" required>
            </div>
            <div class="form-group mb-3">
                <label>Content (en):</label>
                <input type="text" name="services[${index}][content][en]" class="form-control" required>
            </div>
            <div class="form-group mb-3">
                <label>Content (ar):</label>
                <input type="text" name="services[${index}][content][ar]" class="form-control" required>
            </div>
            <div class="form-group mb-3">
                <label>Button Link:</label>
                <input type="text" name="services[${index}][buttonlink]" class="form-control" required>
            </div>
            <button class="btn btn-danger remove-service" type="button">Remove Service</button>
        </div>`;

        $('#servicesContainer').append(item);
    });

    // Remove service item
    $(document).on('click', '.remove-service', function() {
        var count = parseInt($('#servicesContainer').attr('data-count'));
        count--;
        $('#servicesContainer').attr('data-count', count);
        $(this).closest('.repeater-item').remove();
    
        // Re-index the input fields
        $('#servicesContainer .repeater-item').each(function(index) {
            var newIndex = index; // Start the new index from 0
            $(this).find('input').each(function() {
                var oldName = $(this).attr('name');
                var newName = oldName.replace(/\[\d+\]/, '[' + newIndex + ']');
                $(this).attr('name', newName);
            });
        });
    });








    // Repeater logic for customer feedback
    $('#addFeedback').click(function() {
        var count = parseInt($('#feedbackContainer').attr('data-count'));
        var index = count; // Store the current count in a separate variable
        count++;
        console.log(count);
        $('#feedbackContainer').attr('data-count', count);

        var item = `
        <div class="repeater-item border p-4 rounded-3">
            <h4>Customer Feedback</h4>
            <div class="form-group mb-3">
                <label>Customer Image:</label><br>
                <input type="file" name="customer[${index}][image1]" class="form-control-file" required>
            </div>
            <div class="form-group mb-3">
                <label>Customer Title:</label>
                <input type="text" name="customer[${index}][title][en]" class="form-control" required>
            </div>
            <div class="form-group mb-3">
                <label>Customer Title:</label>
                <input type="text" name="customer[${index}][title][ar]" class="form-control" required>
            </div>
            <div class="form-group mb-3">
                <label>Customer Review:</label>
                <textarea name="customer[${index}][review][en]" class="form-control" rows="3" required></textarea>
            </div>
            <div class="form-group mb-3">
                <label>Customer Review:</label>
                <textarea name="customer[${index}][review][ar]" class="form-control" rows="3" required></textarea>
            </div>
            <button class="btn btn-danger remove-feedback" type="button">Remove Customer Feedback</button>
        </div>`;

        $('#feedbackContainer').append(item);
    });

    
    // Remove feedback item
    $(document).on('click', '.remove-feedback', function() {
        var count = parseInt($('#feedbackContainer').attr('data-count'));
        count--;
        $('#feedbackContainer').attr('data-count', count);
        $(this).closest('.repeater-item').remove();
    
        // Re-index the input fields
        $('#feedbackContainer .repeater-item').each(function(index) {
            var newIndex = index; // Start the new index from 0
            $(this).find('input').each(function() {
                var oldName = $(this).attr('name');
                var newName = oldName.replace(/\[\d+\]/, '[' + newIndex + ']');
                $(this).attr('name', newName);
            });
        });
    });








    // Repeater logic for gallery
    $('#addGallery').click(function() {
        var count = parseInt($('#galleryContainer').attr('data-count'));
        var index = count; // Store the current count in a separate variable
        count++;
        console.log(count);
        $('#galleryContainer').attr('data-count', count);
        
        var item = `
        <div class="repeater-item border p-4 rounded-3">
            <h4>Gallery Item</h4>
            <div class="form-group mb-3">
                <label>Image:</label><br>
                <input type="file" name="gallery[${index}][image1]" class="form-control-file" required>
            </div>
            <div class="form-group mb-3">
                <label>Title (en):</label>
                <input type="text" name="gallery[${index}][title][en]" class="form-control" required>
            </div>
            <div class="form-group mb-3">
                <label>Title (ar):</label>
                <input type="text" name="gallery[${index}][title][ar]" class="form-control" required>
            </div>
            
            <div class="form-group mb-3">
                <label>Content (en):</label>
                <input type="text" name="gallery[${index}][content][en]" class="form-control" required>
            </div>
            <div class="form-group mb-3">
                <label>Content (ar):</label>
                <input type="text" name="gallery[${index}][content][ar]" class="form-control" required>
            </div>
            <button class="btn btn-danger remove-gallery" type="button">Remove Gallery Item</button>
        </div>`;

        $('#galleryContainer').append(item);
    });

    // Remove gallery item
    $(document).on('click', '.remove-gallery', function() {
        var count = parseInt($('#galleryContainer').attr('data-count'));
        count--;
        $('#galleryContainer').attr('data-count', count);
        $(this).closest('.repeater-item').remove();
    
        // Re-index the input fields
        $('#galleryContainer .repeater-item').each(function(index) {
            var newIndex = index; // Start the new index from 0
            $(this).find('input').each(function() {
                var oldName = $(this).attr('name');
                var newName = oldName.replace(/\[\d+\]/, '[' + newIndex + ']');
                $(this).attr('name', newName);
            });
        });
    });










    // Repeater logic for videos
    $('#addFaq').click(function() {
        var count = parseInt($('#faqContainer').attr('data-count'));
        var index = count; // Store the current count in a separate variable
        count++;
        $('#faqContainer').attr('data-count', count);
        var item = `
        <div class="repeater-item border p-4 rounded-3">
            <div class="form-group mb-3">
                <label>Question (en)</label>
                <input type="text" name=" faq[][question][en] " class="form-control">
            </div>
            <div class="form-group mb-3">
                <label>Question (ar)</label>
                <input type="text" name=" faq[][question][ar] " class="form-control">
            </div>
            <div class="form-group mb-3">
                <label>Answer (en)</label>
                <input type="text" name=" faq[][answer][en] " class="form-control">
            </div>
            <div class="form-group mb-3">
                <label>Answer (ar)</label>
                <input type="text" name=" faq[][answer][ar] " class="form-control">
            </div>
            <button class="btn btn-danger remove-faq" type="button">Remove Faq</button>
        </div>`;

        $('#faqContainer').append(item);
    });

    // Remove slider item
    $(document).on('click', '.remove-faq', function() {
        var count = parseInt($('#faqContainer').attr('data-count'));
        count--;
        $('#faqContainer').attr('data-count', count);
        $(this).closest('.repeater-item').remove();
    
        // Re-index the input fields
        $('#faqContainer .repeater-item').each(function(index) {
            var newIndex = index; // Start the new index from 0
            $(this).find('input').each(function() {
                var oldName = $(this).attr('name');
                var newName = oldName.replace(/\[\d+\]/, '[' + newIndex + ']');
                $(this).attr('name', newName);
            });
        });
    });
    
  

    // Remove video item
    $(document).on('click', '.remove-video', function() {
        $(this).closest('.repeater-item').remove();
    });

    


    

    // Submit form
    $('#myForm').submit(function(event) {
        event.preventDefault();
        var formData = new FormData(this);
        // Use formData to send the form data to the server via AJAX or process it as needed
    });
});