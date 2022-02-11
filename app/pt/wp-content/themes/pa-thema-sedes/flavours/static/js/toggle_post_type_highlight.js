(function($){
    $(document).ready(function(){
        $('select.post_type_highlight').change(function(){
            var value = $(this).val();
            var postId = $(this).data('postid');
            var postType = $(this).data('posttype');
            $.ajax({
                url: ajaxurl,
                data: {
                    action: 'toggle_post_type_highlight',
                    post_id: postId,
                    post_type: postType,
                    new_value: value
                },
                type: 'POST'
            });
        });
    });
})(jQuery);