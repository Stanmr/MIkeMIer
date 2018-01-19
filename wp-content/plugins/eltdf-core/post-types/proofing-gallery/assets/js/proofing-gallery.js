(function($) {
    'use strict';

    var gallery = {};
    eltdf.modules.gallery = gallery;

    gallery.eltdfOnDocumentReady = eltdfOnDocumentReady;
    gallery.eltdfOnWindowLoad = eltdfOnWindowLoad;
    gallery.eltdfOnWindowResize = eltdfOnWindowResize;
    gallery.eltdfOnWindowScroll = eltdfOnWindowScroll;

    $(document).ready(eltdfOnDocumentReady);
    $(window).load(eltdfOnWindowLoad);
    $(window).resize(eltdfOnWindowResize);
    $(window).scroll(eltdfOnWindowScroll);
    
    /* 
     All functions to be called on $(document).ready() should be in this function
     */
    function eltdfOnDocumentReady() {
	    eltdfInitProofingGallerySingleFilter();
	    eltdfProofingGallerySingleMasonry();
	    eltdfProofingGalleryApproving().init();
	    eltdfProofingGalleryPasswordProtectedHeight();
    }

    /*
     All functions to be called on $(window).load() should be in this function
     */
    function eltdfOnWindowLoad() {
        eltdfInitProofingGalleryListAnimation();
	    eltdfInitProofingGalleryPagination().init();
    }

    /*
     All functions to be called on $(window).resize() should be in this function
     */
    function eltdfOnWindowResize() {

    }

    /*
     All functions to be called on $(window).scroll() should be in this function
     */
    function eltdfOnWindowScroll() {
	    eltdfInitProofingGalleryPagination().scroll();
    }

    /**
     * Initializes gallery list article animation
     */
    function eltdfInitProofingGalleryListAnimation(){
        var portList = $('.eltdf-gallery-list-holder.eltdf-pgl-has-animation');

        if(portList.length){
            portList.each(function(){
                var thisProofingGalleryList = $(this).children('.eltdf-pgl-inner');

                thisProofingGalleryList.children('article').each(function(l) {
                    var thisArticle = $(this);

                    thisArticle.appear(function() {
                        thisArticle.addClass('eltdf-item-show');

                        setTimeout(function(){
                            thisArticle.addClass('eltdf-item-shown');
                        }, 1000);
                    },{accX: 0, accY: 0});
                });
            });
        }
    }



    /**
     * Initializes load more items if gallery masonry filter item is empty
     */
    function eltdfInitLoadMoreItemsProofingGalleryFilter($galleryList, $filterValue, $filterClassName) {

        var thisProofingGalleryList = $galleryList,
            thisProofingGalleryListInner = thisProofingGalleryList.find('.eltdf-pgl-inner'),
            filterValue = $filterValue,
            filterClassName = $filterClassName,
            maxNumPages = 0;

        if (typeof thisProofingGalleryList.data('max-num-pages') !== 'undefined' && thisProofingGalleryList.data('max-num-pages') !== false) {
            maxNumPages = thisProofingGalleryList.data('max-num-pages');
        }

        var	loadMoreDatta = eltdf.modules.common.getLoadMoreData(thisProofingGalleryList),
            nextPage = loadMoreDatta.nextPage,
	        ajaxData = eltdf.modules.common.setLoadMoreAjaxData(loadMoreDatta, 'eltdf_core_proofing_gallery_ajax_load_more'),
            loadingItem = thisProofingGalleryList.find('.eltdf-pgl-loading');

        if(nextPage <= maxNumPages) {
            loadingItem.addClass('eltdf-showing eltdf-filter-trigger');
            thisProofingGalleryListInner.css('opacity', '0');

            $.ajax({
                type: 'POST',
                data: ajaxData,
                url: eltdfGlobalVars.vars.eltdfAjaxUrl,
                success: function (data) {
                    nextPage++;
                    thisProofingGalleryList.data('next-page', nextPage);
                    var response = $.parseJSON(data),
                        responseHtml = response.html;

                    thisProofingGalleryList.waitForImages(function () {
                        thisProofingGalleryListInner.append(responseHtml).isotope('reloadItems').isotope({sortBy: 'original-order'});
                        var portListHasArtciles = !!thisProofingGalleryListInner.children().hasClass(filterClassName);

                        if(portListHasArtciles) {
                            setTimeout(function() {
                                thisProofingGalleryListInner.isotope('layout').isotope({filter: filterValue});
                                loadingItem.removeClass('eltdf-showing eltdf-filter-trigger');

                                setTimeout(function() {
                                    thisProofingGalleryListInner.css('opacity', '1');
                                }, 150);
                            }, 400);
                        } else {
                            loadingItem.removeClass('eltdf-showing eltdf-filter-trigger');
                            eltdfInitLoadMoreItemsProofingGalleryFilter(thisProofingGalleryList, filterValue, filterClassName);
                        }
                    });
                }
            });
        }
    }
	
	/**
	 * Initializes gallery pagination functions
	 */
	function eltdfInitProofingGalleryPagination(){
		var portList = $('.eltdf-proofing-gallery-list-holder');
		
		var initStandardPagination = function(thisProofingGalleryList) {
			var standardLink = thisProofingGalleryList.find('.eltdf-pgl-standard-pagination li');
			
			if(standardLink.length) {
				standardLink.each(function(){
					var thisLink = $(this).children('a'),
						pagedLink = 1;
					
					thisLink.on('click', function(e) {
						e.preventDefault();
						e.stopPropagation();
						
						if (typeof thisLink.data('paged') !== 'undefined' && thisLink.data('paged') !== false) {
							pagedLink = thisLink.data('paged');
						}
						
						initMainPagFunctionality(thisProofingGalleryList, pagedLink);
					});
				});
			}
		};
		
		var initLoadMorePagination = function(thisProofingGalleryList) {
			var loadMoreButton = thisProofingGalleryList.find('.eltdf-pgl-load-more a');
			
			loadMoreButton.on('click', function(e) {
				e.preventDefault();
				e.stopPropagation();
				
				initMainPagFunctionality(thisProofingGalleryList);
			});
		};
		
		var initInifiteScrollPagination = function(thisProofingGalleryList) {
			var portListHeight = thisProofingGalleryList.outerHeight(),
				portListTopOffest = thisProofingGalleryList.offset().top,
				portListPosition = portListHeight + portListTopOffest - eltdfGlobalVars.vars.eltdfAddForAdminBar;
			
			if(!thisProofingGalleryList.hasClass('eltdf-pgl-infinite-scroll-started') && eltdf.scroll + eltdf.windowHeight > portListPosition) {
				initMainPagFunctionality(thisProofingGalleryList);
			}
		};
		
		var initMainPagFunctionality = function(thisProofingGalleryList, pagedLink) {
			var thisProofingGalleryListInner = thisProofingGalleryList.find('.eltdf-pgl-inner'),
				nextPage,
				maxNumPages;
			
			if (typeof thisProofingGalleryList.data('max-num-pages') !== 'undefined' && thisProofingGalleryList.data('max-num-pages') !== false) {
				maxNumPages = thisProofingGalleryList.data('max-num-pages');
			}
			
			if(thisProofingGalleryList.hasClass('eltdf-pgl-pag-standard')) {
				thisProofingGalleryList.data('next-page', pagedLink);
			}
			
			if(thisProofingGalleryList.hasClass('eltdf-pgl-pag-infinite-scroll')) {
				thisProofingGalleryList.addClass('eltdf-pgl-infinite-scroll-started');
			}
			
			var loadMoreDatta = eltdf.modules.common.getLoadMoreData(thisProofingGalleryList),
				loadingItem = thisProofingGalleryList.find('.eltdf-pgl-loading');
			
			nextPage = loadMoreDatta.nextPage;
			
			if(nextPage <= maxNumPages){
				if(thisProofingGalleryList.hasClass('eltdf-pgl-pag-standard')) {
					loadingItem.addClass('eltdf-showing eltdf-standard-pag-trigger');
					thisProofingGalleryList.addClass('eltdf-pgl-pag-standard-animate');
				} else {
					loadingItem.addClass('eltdf-showing');
				}
				
				var ajaxData = eltdf.modules.common.setLoadMoreAjaxData(loadMoreDatta, 'eltdf_core_proofing_gallery_ajax_load_more');
				
				$.ajax({
					type: 'POST',
					data: ajaxData,
					url: eltdfGlobalVars.vars.eltdfAjaxUrl,
					success: function (data) {
						if(!thisProofingGalleryList.hasClass('eltdf-pgl-pag-standard')) {
							nextPage++;
						}
						
						thisProofingGalleryList.data('next-page', nextPage);
						
						var response = $.parseJSON(data),
							responseHtml =  response.html;
						
						if(thisProofingGalleryList.hasClass('eltdf-pgl-pag-standard')) {
							eltdfInitStandardPaginationLinkChanges(thisProofingGalleryList, maxNumPages, nextPage);
							
							thisProofingGalleryList.waitForImages(function(){
								if(thisProofingGalleryList.hasClass('eltdf-pgl-masonry')){
									eltdfInitHtmlIsotopeNewContent(thisProofingGalleryList, thisProofingGalleryListInner, loadingItem, responseHtml);
								} else if (thisProofingGalleryList.hasClass('eltdf-pgl-gallery') && thisProofingGalleryList.hasClass('eltdf-pgl-has-filter')) {
									eltdfInitHtmlIsotopeNewContent(thisProofingGalleryList, thisProofingGalleryListInner, loadingItem, responseHtml);
								} else {
									eltdfInitHtmlProofingGalleryNewContent(thisProofingGalleryList, thisProofingGalleryListInner, loadingItem, responseHtml);
								}
							});
						} else {
							thisProofingGalleryList.waitForImages(function(){
								if(thisProofingGalleryList.hasClass('eltdf-pgl-masonry')){
									eltdfInitAppendIsotopeNewContent(thisProofingGalleryListInner, loadingItem, responseHtml);
								} else if (thisProofingGalleryList.hasClass('eltdf-pgl-gallery') && thisProofingGalleryList.hasClass('eltdf-pgl-has-filter')) {
									eltdfInitAppendIsotopeNewContent(thisProofingGalleryListInner, loadingItem, responseHtml);
								} else {
									eltdfInitAppendProofingGalleryNewContent(thisProofingGalleryListInner, loadingItem, responseHtml);
								}
							});
						}
						
						if(thisProofingGalleryList.hasClass('eltdf-pgl-infinite-scroll-started')) {
							thisProofingGalleryList.removeClass('eltdf-pgl-infinite-scroll-started');
						}
					}
				});
			}
			
			if(nextPage === maxNumPages){
				thisProofingGalleryList.find('.eltdf-pgl-load-more-holder').hide();
			}
		};
		
		var eltdfInitStandardPaginationLinkChanges = function(thisProofingGalleryList, maxNumPages, nextPage) {
			var standardPagHolder = thisProofingGalleryList.find('.eltdf-pgl-standard-pagination'),
				standardPagNumericItem = standardPagHolder.find('li.eltdf-pgl-pag-number'),
				standardPagPrevItem = standardPagHolder.find('li.eltdf-pgl-pag-prev a'),
				standardPagNextItem = standardPagHolder.find('li.eltdf-pgl-pag-next a');
			
			standardPagNumericItem.removeClass('eltdf-pgl-pag-active');
			standardPagNumericItem.eq(nextPage-1).addClass('eltdf-pgl-pag-active');
			
			standardPagPrevItem.data('paged', nextPage-1);
			standardPagNextItem.data('paged', nextPage+1);
			
			if(nextPage > 1) {
				standardPagPrevItem.css({'opacity': '1'});
			} else {
				standardPagPrevItem.css({'opacity': '0'});
			}
			
			if(nextPage === maxNumPages) {
				standardPagNextItem.css({'opacity': '0'});
			} else {
				standardPagNextItem.css({'opacity': '1'});
			}
		};
		
		var eltdfInitHtmlIsotopeNewContent = function(thisProofingGalleryList, thisProofingGalleryListInner, loadingItem, responseHtml) {
			thisProofingGalleryListInner.html(responseHtml).isotope('reloadItems').isotope({sortBy: 'original-order'});
			loadingItem.removeClass('eltdf-showing eltdf-standard-pag-trigger');
			thisProofingGalleryList.removeClass('eltdf-pgl-pag-standard-animate');
			
			setTimeout(function() {
				thisProofingGalleryListInner.isotope('layout');
				eltdfInitProofingGalleryListAnimation();
			}, 400);
		};
		
		var eltdfInitHtmlProofingGalleryNewContent = function(thisProofingGalleryList, thisProofingGalleryListInner, loadingItem, responseHtml) {
			loadingItem.removeClass('eltdf-showing eltdf-standard-pag-trigger');
			thisProofingGalleryList.removeClass('eltdf-pgl-pag-standard-animate');
			thisProofingGalleryListInner.html(responseHtml);
			eltdfInitProofingGalleryListAnimation();
		};
		
		var eltdfInitAppendIsotopeNewContent = function(thisProofingGalleryListInner, loadingItem, responseHtml) {
			thisProofingGalleryListInner.append(responseHtml).isotope('reloadItems').isotope({sortBy: 'original-order'});
			loadingItem.removeClass('eltdf-showing');
			
			setTimeout(function() {
				thisProofingGalleryListInner.isotope('layout');
				eltdfInitProofingGalleryListAnimation();
			}, 400);
		};
		
		var eltdfInitAppendProofingGalleryNewContent = function(thisProofingGalleryListInner, loadingItem, responseHtml) {
			loadingItem.removeClass('eltdf-showing');
			thisProofingGalleryListInner.append(responseHtml);
			eltdfInitProofingGalleryListAnimation();
		};
		
		return {
			init: function() {
				if(portList.length) {
					portList.each(function() {
						var thisProofingGalleryList = $(this);
						
						if(thisProofingGalleryList.hasClass('eltdf-pgl-pag-standard')) {
							initStandardPagination(thisProofingGalleryList);
						}
						
						if(thisProofingGalleryList.hasClass('eltdf-pgl-pag-load-more')) {
							initLoadMorePagination(thisProofingGalleryList);
						}
						
						if(thisProofingGalleryList.hasClass('eltdf-pgl-pag-infinite-scroll')) {
							initInifiteScrollPagination(thisProofingGalleryList);
						}
					});
				}
			},
			scroll: function() {
				if(portList.length) {
					portList.each(function() {
						var thisProofingGalleryList = $(this);
						
						if(thisProofingGalleryList.hasClass('eltdf-pgl-pag-infinite-scroll')) {
							initInifiteScrollPagination(thisProofingGalleryList);
						}
					});
				}
			}
		};
	}

	/**
	 * Initializes gallery masonry filter
	 */
	function eltdfInitProofingGallerySingleFilter(){

		var filterHolder = $('.eltdf-proofing-gallery-single-holder .eltdf-pgs-gallery-filter-holder');

		if(filterHolder.length){
			filterHolder.each(function(){
				var thisFilterHolder = $(this),
					thisProofingGalleryHolder = thisFilterHolder.closest('.eltdf-pgs-gallery-holder'),
					thisProofingGalleryHolderInner = thisProofingGalleryHolder.find('.eltdf-pgs-gallery-inner');

				thisFilterHolder.find('.eltdf-pgs-gallery-filter:first').addClass('eltdf-pgs-filter-current');


				thisFilterHolder.find('.eltdf-pgs-gallery-filter').click(function(){
					var thisFilter = $(this),
						filterValue = thisFilter.attr('data-filter');

						thisFilter.parent().children('.eltdf-pgs-gallery-filter').removeClass('eltdf-pgs-filter-current');
						thisFilter.addClass('eltdf-pgs-filter-current');
					thisFilterHolder.parent().children('.eltdf-pgs-gallery-inner').isotope({ filter: filterValue });
				});
			});
		}
	}


	function eltdfProofingGallerySingleMasonry(){
		var masonryHolder = $('.eltdf-proofing-gallery-single-holder .eltdf-pgs-gallery-masonry'),
			masonry = masonryHolder.children();

		if(masonry.length){
			masonry.waitForImages(function() {
				masonry.isotope({
					layoutMode: 'packery',
					itemSelector: '.eltdf-pgs-gallery-image',
					percentPosition: true,
					packery: {
						gutter: '.eltdf-pgs-grid-gutter',
						columnWidth: '.eltdf-pgs-grid-sizer'
					}
				});

				masonry.css('opacity', '1');
			});
		}
	}

	var eltdfProofingGalleryApproving = eltdf.modules.gallery.eltdfProofingGalleryApproving = function() {

		var gallery = $('.eltdf-pgs-gallery-holder');

		var approveImage = function(gallery) {

			var images = gallery.find('.eltdf-pgs-gallery-image');

			images.each(function(){

				var image = $(this);
				var actionIcon = image.find('.eltdf-pgs-image-action-icon');

				actionIcon.on('click', function(){
					actionIcon.addClass('eltdf-blink');

					var ajaxData = {
						action: 'eltdf_core_proofing_gallery_approving',
						gallery_id : image.data('gallery-id'),
						image_id : image.data('image-id')
					};

					$.ajax({
						type: 'POST',
						data: ajaxData,
						url: eltdfGlobalVars.vars.eltdfAjaxUrl,
						success: function (data) {
							actionIcon.removeClass('eltdf-blink');

							var response = JSON.parse(data);
							if(response.status == 'success'){

								if(response.data.image_status == 'approved') {
									image.removeClass('proofing-gallery-image-rejected');
									image.addClass('proofing-gallery-image-approved');
								} else {
									image.removeClass('proofing-gallery-image-approved');
									image.addClass('proofing-gallery-image-rejected');
								}

							}

						}
					});

				});
			});



		};

		return {
			init: function() {
				if(gallery.length) {
					gallery.each(function() {
						approveImage($(this));
					});
				}
			}
		};
	};


	function eltdfProofingGalleryPasswordProtectedHeight(){
		var passwordProtectedHolder = $('.eltdf-password-protected-holder');

		if(passwordProtectedHolder.hasClass('eltdf-password-protected-full-height')){

			var reduceHeight = eltdf.windowWidth <= 1024 ? eltdfGlobalVars.vars.eltdfMobileHeaderHeight + $('.eltdf-top-bar').height() : 0;

			if(!eltdf.body.hasClass('eltdf-header-transparent') && eltdf.windowWidth > 1024) {
				reduceHeight = reduceHeight + eltdfGlobalVars.vars.eltdfMenuAreaHeight + eltdfGlobalVars.vars.eltdfLogoAreaHeight;

			}

			passwordProtectedHolder.css({'height': (eltdf.windowHeight - reduceHeight) + 'px'});

		}

	}


})(jQuery);