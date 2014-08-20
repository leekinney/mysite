	//FLEXSLIDER
        $(window).load(function() {
        $('.flexslider').flexslider();
        animation: "slide"
  });
        
        //INSTAGRAM
    $(document).ready(function() {
	$(".instagram").instagram({
	hash: 'monolithskate',
	show: '5',
	clientId: 'f03649e24d67490992cc08689814a23d'
    });
	
});
   	
	$(window).load(function () {
 	$('div.instagram-placeholder').each( function(i) {
  	if( i % 4 != 3 )
    return
 	$(this).addClass('last')
	})
});
	
        //RSS FEED
          $(document).ready(function() {
  	$('#test').rssfeed('http://monolithskate.blogspot.com/feeds/posts/default', {
		limit: 5
		});
		});
	
       //TWITTER
   	 $(".tweet").tweet({
            username: "monolithskate",
            join_text: "auto",
            avatar_size: 48,
            count: 1,
            template: "{avatar} Tweet: {text}"
					  
     });
         

           
