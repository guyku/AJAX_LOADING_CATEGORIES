(function($){

	$(document).ready(function(){
		$(document).on('click', '.js-filter-item > a', function(e){
			e.preventDefault();

			var category = $(this).data('category'),
				uri = this.href;

			$.ajax({
				url:wp_ajax.ajax_url,
				data: { action: 'filter', category: category },
				type: 'post',
				success: function(result) {
					var title = $(result).find('title').text()
					$('.js-filter').html(result);
					history.pushState('', title, uri);

					/* Ajax functions */
	$(document).on('click','.load-more', function(){
		
		var that = $(this);
		var page = $(this).data('page');
		var newPage = page+1;
		var ajaxurl = that.data('url');
		
		$.ajax({
			
			url : ajaxurl,
			type : 'post',
			data : {
				
				page : page,
				action: 'sunset_load_more'
				
			},
			error : function( response ){
				console.log(response);
			},
			success : function( response ){
				
				that.data('page', newPage);
				$('.load-posts-container').append( response );
				
			}
			
		});
		
	});
	
				},
				error: function(result) {
					console.warn(result);
				}
			});
		});
	});

	

})(jQuery);
