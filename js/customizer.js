jQuery(document).ready(function($){
  
         $('a[href*="project-app-preview"]').each( function(){ 
         $(this).addClass('preview-now'); 
         });

    $('.preview-now').click(function(){
        $('.phone-frame').fadeIn();
        $('td.second.tf-custom').fadeIn();
        return false;
    });
    $('.app-key-req').click(function(){
       return false; 
    });
    $('.phone-container').click(function(){
        $('.phone-frame').fadeOut();
        $('.hidden-td').fadeOut();
    });
    
    $('.phone-frame').parent().addClass('hidden-td');
});