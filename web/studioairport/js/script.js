var firstshow = true,
	is_handheld = false,
	is_transitioning = false;

function loadGallery(o){
	
	var tempSlide = o.slide,
		port = o.portfolio;
	
	$.get(template_dir+'/buildgallery.php?reswidth='+$(window).width()+'&resheight='+$(window).height()+'&url='+o.path, function(data) {
		
		if($(data).length > 0){
			if($(data)[0].tagName == "A"){
				$('#superbgimage').show();
				$('#vimeo-container').empty().hide();
				$('body').removeClass('vimeo-playing');
				var wp = $('#wallpaper'),
					slide = (tempSlide) ? tempSlide : 1;
				
				wp.html(data).data('currentgallery',{path: o.path, slide: slide, portfolio: port, is_grafisch: o.is_grafisch});
				//log(wp.data('currentgallery'));
				
				var mouseNav = $('#mousenav');
				
					wp.stopSlideShow();
					wp.superbgimage({
						reload:true,
						z_index:0,
						showimage: slide,
						vertical_center: 0,
						transition: 1,
						slideshow: (o.slideshow) ? 1 : 0,
						slide_interval: 4000,
						speed: 'medium',
						onMouseenter: function(){
						},
						onMousemove: function(i,e){
						},
						onMouseleave: function(){
							//$('#mouse-cursor').attr('class','');
							//mouseDir = "";
						},
						onMouseDown: function(){
							$('#mouse-cursor').addClass('active');
						},
						onMouseUp: function(){
							$('#mouse-cursor').removeClass('active');
						},
						onClick: function(i,e){
						},
						beforeShow: function(){
							is_transitioning = true;
							
							var slide_link = wp.children('[rel="'+$.superbg_imgActual+'"]');
							
							if(slide_link.hasClass('vimeo')){
								$('.vimeo-player-inner').html($('#vimeo-id-' + slide_link.data('vimeoid')).html().replace('<!--','').replace('-->',''));
								
								var ifr = $('.vimeo-player-inner').find('iframe');
								
								if(ifr.attr('id') != 'flash-klok'){
									ifr.css({
										height: $(window).height() - 310,
										width: ($(window).height() - 310) / parseFloat(ifr.data('ratio'))
									});
									
									if(ifr.length > 0){
										$('.vimeo-player-inner').css({
											width: ($(window).height() - 310) / parseFloat(ifr.data('ratio'))
										});
									}
								}else{
									ifr.css({
										position: 'fixed',
										width: '100%',
										height: '100%',
										left:0,
										top:0
									});
								}

								
								$('#vimeo-player').fadeIn('fast');
							}else{
								$('#vimeo-player').fadeOut('fast',function(){
									$('.vimeo-player-inner').empty();
								});
							}
						},
						onShow: function(){
							is_transitioning = false;
						}
					}).hide();
					
				if(is_portfolio && $.superbg_imgIndex < 2){
					$('body').addClass('no-project-nav');
				}else{
					$('body').removeClass('no-project-nav');
				}
				
				$('.project-navigation').children(':nth-child('+slide+')').addClass('active');
				
				if(is_handheld && is_portfolio && !$('body').hasClass('vimeo-playing') && firstshow){
					$('#swipe').show().children().fadeIn('fast').delay(2000).fadeOut('fast',function(){$(this).parent().hide();});
					firstshow = false;
				} 

				
			}else if($(data)[0].tagName == "IFRAME"){
				$('#wallpaper').data('currentgallery',{path: o.path, slide: slide, portfolio: port});
				$('#vimeo-container').html(data).show();
				$('#superbgimage').hide();
				$('body').addClass('vimeo-playing');
				$('#mouse-cursor').attr('class','').show();
				hideProjectNav();
			}
		}else{
		}		
	});   
	$('.firstLoad').removeClass('firstLoad');
 	
}

function nextSlide(){

	if(is_portfolio && !is_transitioning){
		var curraddress = $.address.value().split('#'),
			currIndex = parseInt($.superbg_imgActual),
			nextIndex = (currIndex + 1 > $.superbg_imgIndex) ? 1 : currIndex + 1;
			
			$('.prev-slide').removeClass('prev-project');
			
			if(currIndex + 1 > $.superbg_imgIndex){
				nextaddress = $(this).attr('href').replace(hostname,'');
			}else{
				$('.project-navigation').find('.active').removeClass('active');
				$('.project-navigation').children(':nth-child('+nextIndex+')').addClass('active');
				nextaddress = curraddress[0]+'#'+(nextIndex);
				$('#wallpaper').nextSlide();
				if(parseInt($.superbg_imgActual) + 1 > $.superbg_imgIndex){
					$('.next-slide').addClass('next-project');
				}
			}
			
			/*
			if(nextIndex == $.superbg_imgIndex && $('.next-post-link').length){
				$('.next-slide').addClass('next-project');
			}else{
				$('.next-slide').removeClass('next-project');
			}
			$('.prev-slide').removeClass('prev-project');
			*/
			$.address.value(nextaddress);

		
	}
	
	return false;
}

function prevSlide(){

	if(is_portfolio && !is_transitioning){

		var curraddress = $.address.value().split('#'),
			currIndex = parseInt($.superbg_imgActual),
			nextIndex = (currIndex - 1 < 1) ? $.superbg_imgIndex : currIndex - 1;
			
			$('.next-slide').removeClass('next-project');

			
			if(currIndex - 1 < 1){
				nextaddress = $(this).attr('href').replace(hostname,'');
			}else{
				$('.project-navigation').find('.active').removeClass('active');
				$('.project-navigation').children(':nth-child('+nextIndex+')').addClass('active');
				nextaddress = curraddress[0]+'#'+(nextIndex);
				$('#wallpaper').prevSlide();
				if(parseInt($.superbg_imgActual) == 1){
					$('.prev-slide').addClass('prev-project');
				}
			}
			/*
			if(currIndex - 1  && $('.previous-post-link').length > 0){
				$('.prev-slide').addClass('prev-project');
			}else{
				$('.prev-slide').removeClass('prev-project');
			}
			$('.next-slide').removeClass('next-project');
			*/

			$.address.value(nextaddress);
	}
	
	return false;
}

$(function() {

	is_handheld = $('body').hasClass('handheld');
	
	$(window).resize(function(){
		
		var ifr = $('.vimeo-player-inner').find('iframe');
		
		if(!ifr.attr('id') == 'flash-klok'){

			ifr.css({
				height: $(window).height() - 310,
				width: ($(window).height() - 310) / parseFloat(ifr.data('ratio'))
			});
			
			if(ifr.length > 0){
				$('.vimeo-player-inner').css({
					width: ($(window).height() - 310) / parseFloat(ifr.data('ratio'))
				});
			}
		}else{
		}
	});

	$('.project-list').livequery(function(){
		
		if(!$.browser.msie || parseInt($.browser.version) > 8){
		$(this).children('ul').masonry({
			itemSelector: '.active-block',
			isAnimated: true,
			columnWidth: 240
		});
		}
		
		$(this).find('li').hover(
			function(){
				$(this).find('.zero-opacity').stop().animate({opacity:1},'fast');
			},
			function(){
				$(this).find('.zero-opacity').stop().animate({opacity:0},'fast');
			}
		);
	});
	
	$('.prev-slide').live('click',prevSlide);
	$('.next-slide').live('click',nextSlide);
	
	
	// Als je op projectoverzicht bent en je hebt een filter aan, kun je deze uitklikken door op Projecten in het hoofdmenu te drukken
	$('.page-item-7').click(function(){	
	
		$.cookie('filterArray','all', { expires: 7, path: '/', domain: 'www.studioairport.nl' });
		
		$('.type-filter').children('li').removeClass('active');
		$('.project-list').find('li').addClass('active-block');
		$('.show-all-link').addClass('active').siblings().removeClass('active');
		$('.project-list').children('ul').masonry('reload');
	});
		
	$('.type-filter').livequery(function(){
		$(this).find('a').click(function(){
			
			var $this = $(this),
				filterArr = [];
			
			if(!is_portfolio){
				$this.parent().toggleClass('active');
			}else{
				$this.parent().addClass('active');
			}
			
			$this.parent().siblings().removeClass('active');
			$('.type-filter').find('.active').each(function(){
				filterArr.push($(this).data('filter'));
			});
			
			$('.project-list').find('li').each(function(){
				var types = $(this).data('types').toString().split(' '),
					found = false;
					
				for(var i in types){
					if((types[i] !== '' && $.inArray(parseInt(types[i]),filterArr) >= 0) || $.inArray('all',filterArr) >= 0){
						found = true;
					}
				}
				
				if(found || filterArr.length < 1){
					$(this).addClass('active-block');
				}else{
					$(this).removeClass('active-block');
				}
				
			});
			
			$.cookie('filterArray',filterArr.join(','), { expires: 7, path: '/', domain: 'www.studioairport.nl' });			
			
			$('.branding').removeClass('active-block');
			if(!$.browser.msie || parseInt($.browser.version) > 8) $('.project-list').children('ul').masonry('reload');
			
			if(is_portfolio) $.address.value('/projecten/');			
			
			return false;
		});
	});
	
	$('.project-info').livequery(function(){
		$(this).hoverIntent({
			over: function(){
				log($(this).find('.project-info-inner').height());
				$(this).children('.project-info-content').stop().animate({ height: $(this).find('.project-info-inner').height() },'fast');
			},
			out: function(){
				$(this).children('.project-info-content').stop().animate({ height: 36 },'fast');
			},
			timeout: 0
		});
	});
	
	$('.project-navigation').livequery(function(){
		$(this).children('li').hover(
			function(){
				if($(this).hasClass('loaded')) $(this).addClass('hover');
			},
			function(){
				if($(this).hasClass('loaded')) $(this).removeClass('hover');
			}
		).click(function(){
			
			if($(this).hasClass('loaded') && !is_transitioning){
				var indexLi = $(this).index() + 1;
				var curraddress = $.address.value().split('#');				
	
				$('#wallpaper').superbgShowImage(indexLi); 
				$.address.value(curraddress[0] + '#' + indexLi);
				
				if(indexLi === 1){
					$('.prev-slide').addClass('prev-project');
				}else{
					$('.prev-slide').removeClass('prev-project');
				}
				if(indexLi + 1 > $.superbg_imgIndex){
					$('.next-slide').addClass('next-project');
				}else{
					$('.next-slide').removeClass('next-project');
				}
				
				$('.project-navigation').find('.active').removeClass('active');
				$('.project-navigation').children(':nth-child('+indexLi+')').addClass('active');
			}

		});
	});
	
	$("#tweets").livequery(function(){
		$(this).tweet({
          join_text: "auto",
          username: "studio_airport",
          avatar_size: 0,
          count: 3,
          auto_join_text_default: "",
          auto_join_text_ed: "",
          auto_join_text_ing: "",
          auto_join_text_reply: "",
          auto_join_text_url: "",
          loading_text: "loading tweets..."
       });
    });
	
});

function initialize() {

	$('body').prepend('<div id="map_frame"><div id="map_canvas"></div></div>');

    var map = document.getElementById("map_canvas");
    

    if (GBrowserIsCompatible()) {
        map = new GMap2(document.getElementById("map_canvas"));
        map.setCenter(new GLatLng(52.1012719, 5.1172571), 13);
        map.shadowSize = new GSize(0, 0);
        map.setUIToDefault();

        // Create a base icon for all of our markers that specifies the
        // shadow, icon dimensions, etc.
        var baseIcon = new GIcon(G_DEFAULT_ICON);
        baseIcon.iconSize = new GSize(59, 86);

        // Creates a marker whose info window displays the letter corresponding
        // to the given index.
        function createMarker(point) {
            // Create a lettered icon for this point using our icon class
            var letteredIcon = new GIcon(baseIcon);
            letteredIcon.shadow = "";
            letteredIcon.shadowSize = new GSize(0, 0);
            letteredIcon.iconSize = new GSize(59, 86);
            letteredIcon.image = template_dir + "/images/koffie.png";
            letteredIcon.iconAnchor = new GPoint(27, 66);


            // Set up our GMarkerOptions object
            markerOptions = { icon: letteredIcon };
            var marker = new GMarker(point, markerOptions);

            GEvent.addListener(marker, "click", function () {
                marker.openInfoWindowHtml("Studio AIRPORT");
            });
            return marker;
        }


        //Latitude: 52.091623 (52° 5' 29.84'' N)
        //Longitude: 5.090597 (5° 5' 26.15'' E)
        var latlng = new GLatLng(52.1012719, 5.1172571);
        map.setMapType(G_PHYSICAL_MAP);
        map.addOverlay(createMarker(latlng));
    }
    
}

var $html = $('html');
$html.addClass('js');

/****************************************************************************************
* Address
****************************************************************************************/

var hostname,
	init,
	pathStr,
	prevPathStr = "",
	is_portfolio,
	is_profiel,
	is_home;
		
$.address.init(function() {
	
	hostname = 'http://'+window.location.hostname + lang_suffix;
	var request_uri = $.address.baseURL().replace(hostname,''); //"http://localhost"; //$.address.baseURL();
	
	if(request_uri){
		refresh_to = hostname + '/#!' + request_uri + '/';
		window.location = refresh_to;
	}else{
		//$('#section').css({opacity: 1});
	}	

	title = document.title;
	
	$('a[href*="'+hostname+'"][href!="#"]:not(".no-address")').address(function() { //.nav a, .jqa
        if($(this).attr('href')) return $(this).attr('href').replace(hostname + '/', '');
    }).click(function(){
    });
    
    $('.menu-item-type-custom').find('a').attr('target','_blank');
	
	init = true;	
	
}).change(function(event) {

	$('#map_frame').remove();
	//GUnload();
	
	var pathArr = $.address.pathNames();
	var pathUri = $.address.value();
		pathStr = $.address.path();
	var qS = $.address.queryString();
	var hash = pathUri.split('#')[1];
	var clickedlink = $('.topnav, .sidenav').find('a[href="'+hostname+pathStr+'"]');
	if(clickedlink.length > 0){
		$('.active-link').removeClass('active-link');
		clickedlink.parent().addClass('active-link');
	}else if(pathStr == '/'){
		$('.active-link').removeClass('active-link');
	}
	
	var names = $.map(event.pathNames, function(n) {
         if(!strpos(n,'.php')) return n.substr(0, 1).toUpperCase() + n.substr(1);
     });
     
	var newTitle = (names.length > 0) ? title + " | " + names.join(' | ') : title;
	$.address.title(newTitle);
	
	if((pathStr.indexOf("/profiel/") >= 0 && pathStr != "/profiel/")){
		is_profiel = true;
		pathStr = "/profiel/";
	}else{
		is_profiel = false;
	}
	
	is_portfolio = ((pathStr.indexOf("/project/") >= 0 && pathStr != "/projecten/")) ? true : false;
	is_home = (pathStr == '/') ? true : false;
	
	var wp = $('#wallpaper'),
		slideIndex = pathUri.split('#')[1];
	
	if((pathStr || qS) && prevPathStr != pathStr ){
		
		$('html, body').animate({scrollTop : 0},'slow','easeInOutQuart');
		$('#vimeo-player').fadeOut('fast',function(){
			$('.vimeo-player-inner').empty();
		});

		var getVars =  { url: pathStr, qs: qS, firstload: init, lang: 'en' };
		
		$('#loading').show();
		$.get(hostname + pathStr, function(data){ //template_dir+'/ajaxrequest.php'
						
			$('#content').fadeOut('fast',function(){
				$(this).html($(data).filter('#content').html());
				
				if(pathStr == "/projecten/" && $.cookie('filterArray') == 'all'){

					$('.type-filter').children('li').removeClass('active');
					$('.project-list').find('li').addClass('active-block');
					$('.show-all-link').addClass('active').siblings().removeClass('active');
				}
				
				if(pathStr == "/contact/"){

						initialize();
				}

				
				$('.sidenav').find('a[href="'+hostname+pathStr+'"]').parent().addClass('active-link');

				$(this).fadeIn('fast',function(){
					
					
					ReinitializeAddThis();
					
					if(is_profiel){
						var pSlug = pathArr[pathArr.length - 1];
						if($('#'+pSlug).length > 0){
							$('html, body').animate({scrollTop : ((pSlug == 'team') ? 0 : $('#'+pSlug).offset().top - 20) },'slow','easeInOutQuart');
						}
					}
					
					if(is_portfolio || is_home){
						loadGallery({path: pathStr, slide: slideIndex, portfolio: is_portfolio, slideshow: !is_portfolio });
					}else{
						$('#wallpaper').empty().stopSlideShow();
						$('#superbgimage').fadeOut('fast',function(){ $(this).remove(); });
					}				
					
				});
				
			});
			
			$('#loading').hide();	
		});
		
		$('.lang-nl').attr('href','http://'+window.location.hostname + '/#!' + pathStr);
		$('.lang-en').attr('href','http://'+window.location.hostname + '/en/#!' + pathStr);
		
		prevPathStr = pathStr;		
		// AddThis
	}else if(is_profiel){
		var pSlug = pathArr[pathArr.length - 1];
		if($('#'+pSlug).length > 0){
			$('html, body').animate({scrollTop : ((pSlug == 'team') ? 0 : $('#'+pSlug).offset().top - 20) },'slow','easeInOutQuart');
		}
	}else if(is_portfolio){
		
	}
						
	init = false;
});