(function($) {
    'use strict';

    var portfolio = {};
    eltdf.modules.portfolio = portfolio;

    portfolio.eltdfInitPortfolioJustifiedGallery = eltdfInitPortfolioJustifiedGallery;
    portfolio.eltdfSkrollr = eltdfSkrollr;
    portfolio.eltdfOnDocumentReady = eltdfOnDocumentReady;
    portfolio.eltdfOnWindowLoad = eltdfOnWindowLoad;
    portfolio.eltdfOnWindowResize = eltdfOnWindowResize;
    portfolio.eltdfOnWindowScroll = eltdfOnWindowScroll;

    $(document).ready(eltdfOnDocumentReady);
    $(window).load(eltdfOnWindowLoad);
    $(window).resize(eltdfOnWindowResize);
    $(window).scroll(eltdfOnWindowScroll);
    
    /* 
     All functions to be called on $(document).ready() should be in this function
     */
    function eltdfOnDocumentReady() {
    }

    /*
     All functions to be called on $(window).load() should be in this function
     */
    function eltdfOnWindowLoad() {
        eltdfInitPortfolioMasonry();
        eltdfInitPortfolioFilter();
        initPortfolioSingleMasonry();
        eltdfInitPortfolioListAnimation();
	    eltdfInitPortfolioPagination().init();
        eltdfPortfolioSingleFollow().init();
        eltdfInitPortfolioJustifiedGallery();
        eltdfInitGalleryStandardParallax();
    }

    /*
     All functions to be called on $(window).resize() should be in this function
     */
    function eltdfOnWindowResize() {
        eltdfInitPortfolioMasonry();
    }

    /*
     All functions to be called on $(window).scroll() should be in this function
     */
    function eltdfOnWindowScroll() {
	    eltdfInitPortfolioPagination().scroll();
    }

    /**
     * Initializes portfolio list article animation
     */
    function eltdfInitPortfolioListAnimation(){
        var portList = $('.eltdf-portfolio-list-holder.eltdf-pl-has-animation');

        if(portList.length){
            portList.each(function(){
                var thisPortList = $(this).children('.eltdf-pl-inner'),
                    animateCycle = 5, // rewind delay
                    animateCycleCounter = 0;

                thisPortList.children('article').each(function(l) {
                    var thisArticle = $(this);

                    setTimeout(function(){
                        thisArticle.appear(function(){
                            setTimeout(function(){
                                thisArticle.addClass('eltdf-appeared');
                            },l * 100);
                        },{accX: 0, accY: 0});
                    },30);
                });
            });
        }
    }

    /**
     * Initializes portfolio list
     */
    function eltdfInitPortfolioMasonry(){
        var portList = $('.eltdf-portfolio-list-holder.eltdf-pl-masonry');

        if(portList.length){
            portList.each(function(){
                var thisPortList = $(this),
                    masonry = thisPortList.children('.eltdf-pl-inner'),
                    size = thisPortList.find('.eltdf-pl-grid-sizer').width();
                
                eltdfResizePortfolioItems(size, thisPortList);

                masonry.isotope({
                    layoutMode: 'packery',
                    itemSelector: 'article',
                    percentPosition: true,
                    packery: {
                        gutter: '.eltdf-pl-grid-gutter',
                        columnWidth: '.eltdf-pl-grid-sizer'
                    }
                });
                
                setTimeout(function () {
	                eltdf.modules.parallax.eltdfInitParallax();
                });

                masonry.css('opacity', '1');
            });
        }
    }

    /**
     * Init Resize Portfolio Items
     */
    function eltdfResizePortfolioItems(size,container){
        if(container.hasClass('eltdf-pl-images-fixed')) {
            var padding = parseInt(container.find('article').css('padding-left')),
                defaultMasonryItem = container.find('.eltdf-pl-masonry-default'),
                largeWidthMasonryItem = container.find('.eltdf-pl-masonry-large-width'),
                largeHeightMasonryItem = container.find('.eltdf-pl-masonry-large-height'),
                largeWidthHeightMasonryItem = container.find('.eltdf-pl-masonry-large-width-height');

            if (eltdf.windowWidth > 680) {
                defaultMasonryItem.css('height', size - 2 * padding);
                largeHeightMasonryItem.css('height', Math.round(2 * size) - 2 * padding);
                largeWidthHeightMasonryItem.css('height', Math.round(2 * size) - 2 * padding);
                largeWidthMasonryItem.css('height', size - 2 * padding);
            } else {
                defaultMasonryItem.css('height', size);
                largeHeightMasonryItem.css('height', size);
                largeWidthHeightMasonryItem.css('height', size);
                largeWidthMasonryItem.css('height', Math.round(size / 2));
            }
        }
    }

    /**
     * Initializes portfolio masonry filter
     */
    function eltdfInitPortfolioFilter(){
        var filterHolder = $('.eltdf-portfolio-list-holder .eltdf-pl-filter-holder.eltdf-pl-regular-filter');

        if(filterHolder.length){
            filterHolder.each(function(){
                var thisFilterHolder = $(this),
                    thisPortListHolder = thisFilterHolder.closest('.eltdf-portfolio-list-holder'),
                    thisPortListInner = thisPortListHolder.find('.eltdf-pl-inner'),
                    portListHasLoadMore = thisPortListHolder.hasClass('eltdf-pl-pag-load-more') ? true : false;

                thisFilterHolder.find('.eltdf-pl-filter:first').addClass('eltdf-pl-current');
	            
	            if(thisPortListHolder.hasClass('eltdf-pl-gallery')) {
		            thisPortListInner.isotope();
	            }

                thisFilterHolder.find('.eltdf-pl-filter').click(function(){
                    var thisFilter = $(this),
                        filterValue = thisFilter.attr('data-filter'),
                        filterClassName = filterValue.length ? filterValue.substring(1) : '',
                        portListHasArtciles = thisPortListInner.children().hasClass(filterClassName) ? true : false;

                    thisFilter.parent().children('.eltdf-pl-filter').removeClass('eltdf-pl-current');
                    thisFilter.addClass('eltdf-pl-current');

                    if(portListHasLoadMore && !portListHasArtciles) {
                        eltdfInitLoadMoreItemsPortfolioFilter(thisPortListHolder, filterValue, filterClassName);
                    } else {
                        thisFilterHolder.parent().children('.eltdf-pl-inner').isotope({ filter: filterValue });
                        eltdfInitPortfolioListAnimation();
	                    eltdf.modules.parallax.eltdfInitParallax();
                        eltdf.modules.common.eltdfPrettyPhoto();
                    }
                });
            });
        }
    }

    /**
     * Initializes load more items if portfolio masonry filter item is empty
     */
    function eltdfInitLoadMoreItemsPortfolioFilter($portfolioList, $filterValue, $filterClassName) {
        var thisPortList = $portfolioList,
            thisPortListInner = thisPortList.find('.eltdf-pl-inner'),
            filterValue = $filterValue,
            filterClassName = $filterClassName,
            maxNumPages = 0;

        if (typeof thisPortList.data('max-num-pages') !== 'undefined' && thisPortList.data('max-num-pages') !== false) {
            maxNumPages = thisPortList.data('max-num-pages');
        }

        var	loadMoreDatta = eltdf.modules.common.getLoadMoreData(thisPortList),
            nextPage = loadMoreDatta.nextPage,
	        ajaxData = eltdf.modules.common.setLoadMoreAjaxData(loadMoreDatta, 'eltdf_core_portfolio_ajax_load_more'),
            loadingItem = thisPortList.find('.eltdf-pl-loading');

        if(nextPage <= maxNumPages) {
            loadingItem.addClass('eltdf-showing eltdf-filter-trigger');
            thisPortListInner.css('opacity', '0');

            $.ajax({
                type: 'POST',
                data: ajaxData,
                url: eltdfGlobalVars.vars.eltdfAjaxUrl,
                success: function (data) {
                    nextPage++;
                    thisPortList.data('next-page', nextPage);
                    var response = $.parseJSON(data),
                        responseHtml = response.html;

                    thisPortList.waitForImages(function () {
                        thisPortListInner.append(responseHtml).isotope('reloadItems').isotope({sortBy: 'original-order'});
                        var portListHasArtciles = !!thisPortListInner.children().hasClass(filterClassName);

                        if(portListHasArtciles) {
                            setTimeout(function() {
                                eltdfResizePortfolioItems(thisPortListInner.find('.eltdf-pl-grid-sizer').width(), thisPortList);
                                thisPortListInner.isotope('layout').isotope({filter: filterValue});
                                loadingItem.removeClass('eltdf-showing eltdf-filter-trigger');

                                setTimeout(function() {
                                    thisPortListInner.css('opacity', '1');
                                    eltdfInitPortfolioListAnimation();
	                                eltdf.modules.parallax.eltdfInitParallax();
                                    eltdf.modules.common.eltdfPrettyPhoto();
                                }, 150);
                            }, 400);
                        } else {
                            loadingItem.removeClass('eltdf-showing eltdf-filter-trigger');
                            eltdfInitLoadMoreItemsPortfolioFilter(thisPortList, filterValue, filterClassName);
                        }
                    });
                }
            });
        }
    }

    /**
     * Initializes portfolio list justified gallery
     */
    function eltdfInitPortfolioJustifiedGallery(){
        var portLists = $('.eltdf-portfolio-list-holder.eltdf-pl-justified-gallery');

        if(portLists.length){
            portLists.each(function(){
                var portList = $(this),
                    spacing = typeof portList.data('space-value') !== 'undefined' ? portList.data('space-value') : 30,
                    rowHeight = typeof portList.data('row-height') !== 'undefined' ? portList.data('row-height') : 200,
                    lastRow = typeof portList.data('last-row') !== 'undefined' ? portList.data('last-row') : 'nojustify',
                    justifyThreshold = typeof portList.data('justify-threshold') !== 'undefined' ? portList.data('justify-threshold') : 0.75;
                var thisPortList = portList.children('.eltdf-pl-inner');

                thisPortList.waitForImages(function() {
                    thisPortList.justifiedGallery({
                        captions: false,
                        rowHeight: rowHeight,
                        margins: spacing,
                        border: 0,
                        lastRow: lastRow,
                        justifyThreshold: justifyThreshold,
                        selector: '> article'
                    }).on('jg.complete jg.rowflush', function() {
                        var deducted = false;
                        thisPortList.find('article').addClass('show').each(function() {
                            $(this).height(Math.round($(this).height()));
                            if (!deducted && $(this).width() == 0) {
                                thisPortList.height(thisPortList.height() - $(this).height() - spacing);
                                deducted = true;
                            }
                        });
                    });
                    initPLJustifiedGalleryFilter(portList, thisPortList, false);
                    portList.css('opacity', '1');
                });
            });
        }
    }

    function initPLJustifiedGalleryFilter(portList, thisPortList, loadMore) {
        if (portList.hasClass('eltdf-pl-has-filter')) {
            var filterHolder = portList.find('.eltdf-pl-filter-holder.eltdf-pl-justified-filter');
            var filterItems = filterHolder.find('li');

            var currentItem;
            if (filterItems.length) {
                filterItems.each(function () {
                    if ($(this).hasClass('eltdf-pl-current')) {
                        currentItem = $(this);
                    }
                })
            }

            if (typeof (currentItem) !== 'undefined') {
                //filter items after ajax pagination call
                eltdfFilterPLJustifiedGallery(portList, thisPortList, filterItems, currentItem, loadMore);
            } else {
                //filter items initially
                filterItems.first().addClass('eltdf-pl-current');
            }

            //filter articles on click event
            filterHolder.find('li').on('click', function () {
                eltdfFilterPLJustifiedGallery(portList, thisPortList, filterItems, $(this), false);
            });
        }
    }

    function eltdfFilterPLJustifiedGallery(portList, thisPortList, filterItems, filterItem, loadMore){

        var selector = filterItem.attr('data-filter'),
            articles = thisPortList.find('article'),
            portListHasLoadMore = !!portList.is('.eltdf-pl-pag-load-more, .eltdf-pl-pag-infinite-scroll'),
            portListHasStandard = !!portList.is('.eltdf-pl-pag-standard');

        thisPortList.removeClass('eltdf-no-elements');
        var transitionDuration = 200;

        articles.css('transition','all ' + transitionDuration + 'ms ease');
        if(loadMore && selector !== '') {
            articles.not(selector).css({
                'transform': 'scale(0)'
            });
        } else if(!loadMore && selector === '') {
            selector = '.eltdf-pl-item';
            articles.css({
                'transform': 'scale(0)'
            });
        } else if(selector !== '') {
            articles.not(selector).css({
                'transform': 'scale(0)'
            });
        }

        var selectorClassName = selector.substring(1),
            portListHasArtciles = !!thisPortList.children().hasClass(selectorClassName);

        filterItems.removeClass("eltdf-pl-current");
        filterItem.addClass("eltdf-pl-current");

        if(portListHasStandard && !portListHasArtciles) {
            thisPortList.addClass('eltdf-no-elements');
        }
        else if(portListHasLoadMore && !portListHasArtciles) {
            eltdfInitLoadMoreItemsPortfolioJustifiedFilter(portList, thisPortList, selector, selectorClassName);
        } else {
            setTimeout(function () {
                articles.filter(selector).css({
                    'transform': ''
                });
                var spacing = typeof portList.data('space-value') !== 'undefined' ? portList.data('space-value') : 30,
                    rowHeight = typeof portList.data('row-height') !== 'undefined' ? portList.data('row-height') : 200,
                    lastRow = typeof portList.data('last-row') !== 'undefined' ? portList.data('last-row') : 'nojustify',
                    justifyThreshold = typeof portList.data('justify-threshold') !== 'undefined' ? portList.data('justify-threshold') : 0.75;
                thisPortList.css('transition', 'height ' + transitionDuration + 'ms ease').justifiedGallery({
                    selector: '>article' + (selector ? selector : ''),
                    rowHeight: rowHeight,
                    margins: spacing,
                    lastRow: lastRow,
                    justifyThreshold: justifyThreshold
                });
            }, 1.1 * transitionDuration);

            setTimeout(function () {
                articles.css('transition', '');
                thisPortList.css('transition', '');
            }, 2.2 * transitionDuration);

            return false;
        }

    }

    /**
     * Initializes load more items if portfolio justified filter item is empty
     */
    function eltdfInitLoadMoreItemsPortfolioJustifiedFilter(portList, thisPortList, selector, selectorClassName) {

        var maxNumPages = 0;

        if (typeof portList.data('max-num-pages') !== 'undefined' && portList.data('max-num-pages') !== false) {
            maxNumPages = portList.data('max-num-pages');
        }

        var	loadMoreData = eltdf.modules.common.getLoadMoreData(portList),
            nextPage = loadMoreData.nextPage,
            ajaxData = eltdf.modules.common.setLoadMoreAjaxData(loadMoreData, 'eltdf_core_portfolio_ajax_load_more'),
            loadingItem = portList.find('.eltdf-pl-loading');

        if(nextPage <= maxNumPages) {
            loadingItem.addClass('eltdf-showing eltdf-filter-trigger');
            thisPortList.css('opacity', '0');

            $.ajax({
                type: 'POST',
                data: ajaxData,
                url: eltdfGlobalVars.vars.eltdfAjaxUrl,
                success: function (data) {
                    nextPage++;
                    portList.data('next-page', nextPage);
                    var response = $.parseJSON(data),
                        responseHtml = response.html;

                    thisPortList.append(responseHtml);
                    thisPortList.waitForImages(function() {
                        thisPortList.justifiedGallery('norewind');
                    });

                    var portListHasArtciles = !!thisPortList.children().hasClass(selectorClassName);

                    if(portListHasArtciles) {
                        setTimeout(function() {
                            initPLJustifiedGalleryFilter(portList, thisPortList, false);
                            loadingItem.removeClass('eltdf-showing eltdf-filter-trigger');

                            setTimeout(function() {
                                thisPortList.css('opacity', '1');
                                eltdfInitPortfolioListAnimation();
                                eltdf.modules.parallax.eltdfInitParallax();
                                eltdf.modules.common.eltdfPrettyPhoto();
                            }, 150);
                        }, 400);
                    } else {
                        loadingItem.removeClass('eltdf-showing eltdf-filter-trigger');
                        eltdfInitLoadMoreItemsPortfolioJustifiedFilter(portList, thisPortList, selector, selectorClassName);
                    }
                }
            });
        }
    }
	
	/**
	 * Initializes portfolio pagination functions
	 */
	function eltdfInitPortfolioPagination(){
		var portList = $('.eltdf-portfolio-list-holder');
		
		var initStandardPagination = function(thisPortList) {
			var standardLink = thisPortList.find('.eltdf-pl-standard-pagination li');
			
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
						
						initMainPagFunctionality(thisPortList, pagedLink);
					});
				});
			}
		};
		
		var initLoadMorePagination = function(thisPortList) {
			var loadMoreButton = thisPortList.find('.eltdf-pl-load-more a');
			
			loadMoreButton.on('click', function(e) {
				e.preventDefault();
				e.stopPropagation();
				
				initMainPagFunctionality(thisPortList);
			});
		};
		
		var initInifiteScrollPagination = function(thisPortList) {
			var portListHeight = thisPortList.outerHeight(),
				portListTopOffest = thisPortList.offset().top,
				portListPosition = portListHeight + portListTopOffest - eltdfGlobalVars.vars.eltdfAddForAdminBar;
			
			if(!thisPortList.hasClass('eltdf-pl-infinite-scroll-started') && eltdf.scroll + eltdf.windowHeight > portListPosition) {
				initMainPagFunctionality(thisPortList);
			}
		};
		
		var initMainPagFunctionality = function(thisPortList, pagedLink) {
			var thisPortListInner = thisPortList.find('.eltdf-pl-inner'),
				nextPage,
				maxNumPages;
			
			if (typeof thisPortList.data('max-num-pages') !== 'undefined' && thisPortList.data('max-num-pages') !== false) {
				maxNumPages = thisPortList.data('max-num-pages');
			}
			
			if(thisPortList.hasClass('eltdf-pl-pag-standard')) {
				thisPortList.data('next-page', pagedLink);
			}
			
			if(thisPortList.hasClass('eltdf-pl-pag-infinite-scroll')) {
				thisPortList.addClass('eltdf-pl-infinite-scroll-started');
			}
			
			var loadMoreDatta = eltdf.modules.common.getLoadMoreData(thisPortList),
				loadingItem = thisPortList.find('.eltdf-pl-loading');
			
			nextPage = loadMoreDatta.nextPage;
			
			if(nextPage <= maxNumPages){
				if(thisPortList.hasClass('eltdf-pl-pag-standard')) {
					loadingItem.addClass('eltdf-showing eltdf-standard-pag-trigger');
					thisPortList.addClass('eltdf-pl-pag-standard-animate');
				} else {
					loadingItem.addClass('eltdf-showing');
				}
				
				var ajaxData = eltdf.modules.common.setLoadMoreAjaxData(loadMoreDatta, 'eltdf_core_portfolio_ajax_load_more');
				
				$.ajax({
					type: 'POST',
					data: ajaxData,
					url: eltdfGlobalVars.vars.eltdfAjaxUrl,
					success: function (data) {
						if(!thisPortList.hasClass('eltdf-pl-pag-standard')) {
							nextPage++;
						}
						
						thisPortList.data('next-page', nextPage);
						
						var response = $.parseJSON(data),
							responseHtml =  response.html;
						
						if(thisPortList.hasClass('eltdf-pl-pag-standard')) {
							eltdfInitStandardPaginationLinkChanges(thisPortList, maxNumPages, nextPage);
							
							thisPortList.waitForImages(function(){
                                if(thisPortList.hasClass('eltdf-pl-justified-gallery')) {
                                    eltdfInitJustifyReplaceNewContent(thisPortList, thisPortListInner, loadingItem, responseHtml);
                                } else if(thisPortList.hasClass('eltdf-pl-masonry')){
                                    eltdfResizePortfolioItems(thisPortListInner.find('.eltdf-pl-grid-sizer').width(), thisPortList);
									eltdfInitHtmlIsotopeNewContent(thisPortList, thisPortListInner, loadingItem, responseHtml);
								} else if (thisPortList.hasClass('eltdf-pl-gallery') && thisPortList.hasClass('eltdf-pl-has-filter')) {
									eltdfInitHtmlIsotopeNewContent(thisPortList, thisPortListInner, loadingItem, responseHtml);
								} else {
									eltdfInitHtmlGalleryNewContent(thisPortList, thisPortListInner, loadingItem, responseHtml);
								}
							});
						} else {
							thisPortList.waitForImages(function(){
                                if(thisPortList.hasClass('eltdf-pl-justified-gallery')) {
                                    eltdfInitJustifyAppendNewContent(thisPortList, thisPortListInner, loadingItem, responseHtml);
                                } else  if(thisPortList.hasClass('eltdf-pl-masonry')){
									eltdfInitAppendIsotopeNewContent(thisPortList, thisPortListInner, loadingItem, responseHtml);
								} else if (thisPortList.hasClass('eltdf-pl-gallery') && thisPortList.hasClass('eltdf-pl-has-filter')) {
									eltdfInitAppendIsotopeNewContent(thisPortList, thisPortListInner, loadingItem, responseHtml);
								} else {
									eltdfInitAppendGalleryNewContent(thisPortList, thisPortListInner, loadingItem, responseHtml);
								}
							});
						}
						
						if(thisPortList.hasClass('eltdf-pl-infinite-scroll-started')) {
							thisPortList.removeClass('eltdf-pl-infinite-scroll-started');
						}
					}
				});
			}
			
			if(nextPage === maxNumPages){
				thisPortList.find('.eltdf-pl-load-more-holder').hide();
			}
		};
		
		var eltdfInitStandardPaginationLinkChanges = function(thisPortList, maxNumPages, nextPage) {
			var standardPagHolder = thisPortList.find('.eltdf-pl-standard-pagination'),
				standardPagNumericItem = standardPagHolder.find('li.eltdf-pl-pag-number'),
				standardPagPrevItem = standardPagHolder.find('li.eltdf-pl-pag-prev a'),
				standardPagNextItem = standardPagHolder.find('li.eltdf-pl-pag-next a');
			
			standardPagNumericItem.removeClass('eltdf-pl-pag-active');
			standardPagNumericItem.eq(nextPage-1).addClass('eltdf-pl-pag-active');
			
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

        var eltdfInitJustifyReplaceNewContent = function(thisPortList, thisPortListInner, loadingItem, responseHtml) {
            loadingItem.removeClass('eltdf-showing eltdf-standard-pag-trigger');
            thisPortList.removeClass('eltdf-pl-pag-standard-animate');
            thisPortListInner.html(responseHtml);
            thisPortListInner.waitForImages(function() {
                eltdfInitPortfolioJustifiedGallery();
            });
            eltdfInitPortfolioListAnimation();
            eltdf.modules.parallax.eltdfInitParallax();
            eltdf.modules.common.eltdfPrettyPhoto();
        };

        var eltdfInitJustifyAppendNewContent = function(thisPortList, thisPortListInner, loadingItem, responseHtml) {
            thisPortListInner.append(responseHtml);
            thisPortListInner.waitForImages(function() {
                thisPortListInner.justifiedGallery('norewind');
                initPLJustifiedGalleryFilter(thisPortList,thisPortListInner, true);
            });
            eltdfInitPortfolioListAnimation();
            eltdf.modules.parallax.eltdfInitParallax();
            loadingItem.removeClass('eltdf-showing');
            eltdf.modules.common.eltdfPrettyPhoto();
        };
		
		var eltdfInitHtmlIsotopeNewContent = function(thisPortList, thisPortListInner, loadingItem, responseHtml) {
            thisPortListInner.find('article').remove();
            thisPortListInner.append(responseHtml);
            thisPortListInner.waitForImages(function() {
                eltdfResizePortfolioItems(thisPortListInner.find('.eltdf-pl-grid-sizer').width(), thisPortList);
                thisPortListInner.isotope('reloadItems').isotope({sortBy: 'original-order'});
                loadingItem.removeClass('eltdf-showing eltdf-standard-pag-trigger');
                thisPortList.removeClass('eltdf-pl-pag-standard-animate');

                setTimeout(function () {
                    thisPortListInner.isotope('layout');
                    eltdfInitPortfolioListAnimation();
                    eltdf.modules.parallax.eltdfInitParallax();
                    eltdf.modules.common.eltdfPrettyPhoto();
                }, 400);
            });
		};
		
		var eltdfInitHtmlGalleryNewContent = function(thisPortList, thisPortListInner, loadingItem, responseHtml) {
			loadingItem.removeClass('eltdf-showing eltdf-standard-pag-trigger');
			thisPortList.removeClass('eltdf-pl-pag-standard-animate');
			thisPortListInner.html(responseHtml);
			eltdfInitPortfolioListAnimation();
			eltdf.modules.parallax.eltdfInitParallax();
            eltdf.modules.common.eltdfPrettyPhoto();
		};
		
		var eltdfInitAppendIsotopeNewContent = function(thisPortList, thisPortListInner, loadingItem, responseHtml) {
            thisPortListInner.append(responseHtml);
            thisPortListInner.waitForImages(function() {
                eltdfResizePortfolioItems(thisPortListInner.find('.eltdf-pl-grid-sizer').width(), thisPortList);
                thisPortListInner.isotope('reloadItems').isotope({sortBy: 'original-order'});
                loadingItem.removeClass('eltdf-showing');

                setTimeout(function() {
                    thisPortListInner.isotope('layout');
                    eltdfInitPortfolioListAnimation();
                    eltdf.modules.parallax.eltdfInitParallax();
                    eltdf.modules.common.eltdfPrettyPhoto();
                }, 400);
            });
		};
		
		var eltdfInitAppendGalleryNewContent = function(thisPortList, thisPortListInner, loadingItem, responseHtml) {
			loadingItem.removeClass('eltdf-showing');
			thisPortListInner.append(responseHtml);
			eltdfInitPortfolioListAnimation();
			eltdf.modules.parallax.eltdfInitParallax();
            eltdf.modules.common.eltdfPrettyPhoto();
		};
		
		return {
			init: function() {
				if(portList.length) {
					portList.each(function() {
						var thisPortList = $(this);
						
						if(thisPortList.hasClass('eltdf-pl-pag-standard')) {
							initStandardPagination(thisPortList);
						}
						
						if(thisPortList.hasClass('eltdf-pl-pag-load-more')) {
							initLoadMorePagination(thisPortList);
						}

                        setTimeout(function() {
                            if(thisPortList.hasClass('eltdf-pl-pag-infinite-scroll')) {
                                initInifiteScrollPagination(thisPortList);
                            }
                        }, 2000);
					});
				}
			},
			scroll: function() {
				if(portList.length) {
					portList.each(function() {
						var thisPortList = $(this);

                        if(thisPortList.hasClass('eltdf-pl-pag-infinite-scroll')) {
                            initInifiteScrollPagination(thisPortList);
                        }
					});
				}
			}
		};
	}

    var eltdfPortfolioSingleFollow = function() {

        var info = $('.eltdf-follow-portfolio-info .eltdf-portfolio-single-holder .eltdf-ps-info-sticky-holder');

        if (info.length) {
            var infoHolderOffset = info.offset().top,
                infoHolderHeight = info.height(),
                mediaHolder = $('.eltdf-ps-image-holder'),
                mediaHolderHeight = mediaHolder.height(),
                header = $('.header-appear, .eltdf-fixed-wrapper'),
                headerHeight = (header.length) ? header.height() : 0;
        }

        var infoHolderPosition = function() {

            if(info.length) {

                if (mediaHolderHeight > infoHolderHeight) {
                    if(eltdf.scroll > infoHolderOffset) {
                        var marginTop = eltdf.scroll + headerHeight + eltdfGlobalVars.vars.eltdfAddForAdminBar - infoHolderOffset;
                        // if scroll is initially positioned below mediaHolderHeight
                        if(marginTop + infoHolderHeight > mediaHolderHeight){
                            marginTop = mediaHolderHeight - infoHolderHeight;
                        }
                        info.animate({
                            marginTop: marginTop
                        });
                    }
                }
            }
        };

        var recalculateInfoHolderPosition = function() {

            if (info.length) {
                if(mediaHolderHeight > infoHolderHeight) {
                    if(eltdf.scroll > infoHolderOffset) {
                    	
                        if(eltdf.scroll + headerHeight + infoHolderHeight <  mediaHolderHeight) {
                            //Calculate header height if header appears
                            if ($('.header-appear, .eltdf-fixed-wrapper').length) {
                                headerHeight = $('.header-appear, .eltdf-fixed-wrapper').height();
                            }
                            info.stop().animate({
                                marginTop: (eltdf.scroll + headerHeight + eltdfGlobalVars.vars.eltdfAddForAdminBar - infoHolderOffset)
                            });
                            //Reset header height
                            headerHeight = 0;
                        } else{
                            info.stop().animate({
                            	marginTop: mediaHolderHeight - infoHolderHeight
                            });
                        }
                    } else {
                        info.stop().animate({
                            marginTop: 0
                        });
                    }
                }
            }
        };

        return {
            init : function() {
                infoHolderPosition();
                $(window).scroll(function(){
                    recalculateInfoHolderPosition();
                });
            }
        };
    };
	
	function initPortfolioSingleMasonry(){
		var masonryHolder = $('.eltdf-portfolio-single-holder .eltdf-ps-masonry-images'),
			masonry = masonryHolder.children();
		
		if(masonry.length){
            masonry.isotope({
                layoutMode: 'packery',
                itemSelector: '.eltdf-ps-image',
                percentPosition: true,
                packery: {
                    gutter: '.eltdf-ps-grid-gutter',
                    columnWidth: '.eltdf-ps-grid-sizer'
                }
            });

            masonry.css('opacity', '1');
		}
	}

    /**
     * Skrollr functionality
     */
    function eltdfSkrollr() {
        var skrollrElements = $('.eltdf-gl-parallax-on-scroll');

        if (!eltdf.htmlEl.hasClass('touch') && skrollrElements.length) {
            if (!eltdf.body.hasClass('eltdf-skrollr-set')) {
                window.eltdfSkrollr = skrollr.init({
                    forceHeight: false,
                    smoothScrolling: false
                });

                eltdf.body.addClass('eltdf-skrollr-set');
            } else {
                window.eltdfSkrollr.refresh();
            }
        }
    }

    /*
     * Parallax animations for Gallery Standard lists
     **/
    function eltdfInitGalleryStandardParallax() {
        var galleryHolder = $('.eltdf-pl-standard-image-scale');

        if (galleryHolder.filter('.eltdf-gl-parallax-on-scroll').length) {
            var item = galleryHolder.find('article');

            galleryHolder.waitForImages(function(){
                eltdf.modules.portfolio.eltdfSkrollr();
                TweenMax.to(item, 1, {delay:0.5, css:{opacity:1}, ease:Quad.easeOut});
            });
        }
    }

})(jQuery);
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