// javascripts functions
// $.noConflict();
jQuery(document).ready(function($){
     
    $(document).on('click', '.open-search a',function(e){
        e.preventDefault();
        // console.log('asdasd');

        $('.search-form-container').slideToggle(400);

    });

});