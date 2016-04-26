/**
 * 
 */


    jQuery(function() {

    	var cache = {},
    	lastXhr;
        
    	if(jQuery( ".autocomplete_search" ))
    	jQuery( ".autocomplete_search" ).autocomplete({
    		source: function( request, response ) {
    			
    			var term = request.term;

    			lastXhr = jQuery.getJSON( "/search/Searchautocomplete?q="+term, request,function( data, status, xhr ) {

    				if ( xhr === lastXhr ) {
    					response( jQuery.map( data, function( item ) {
    						

    						var label,value,link;
    						
    		
    						value=item.title;
    						label=item.title;
    						link = '/articles/single/id/'+item.id+'.html';
    						
    						
    						return {
    							label: label,
    							value: value,
    							link: link
    						}
    					}) );
    				}
    			});
    		},
    		minLength: 1,
    		select: function( event, ui ) {

    			jQuery(location).attr('href',ui.item.link);
    
    		},
    		open: function() {
    			jQuery( this ).removeClass( "ui-corner-all" ).addClass( "ui-corner-top" );
    		},
    		close: function() {
    			jQuery( this ).removeClass( "ui-corner-top" ).addClass( "ui-corner-all" );
    		}
    	}).data( "autocomplete" )

    	._renderItem = function( ul, item ) {
    		return jQuery( "<li></li>" )
    		.data( "item", item )
    		.append(  "<a class='chosen' style='font-size:13px;' >"+ item.label + "</a>" )
    		.appendTo( ul );
           };
           
           
            
    });