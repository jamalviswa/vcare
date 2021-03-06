var PageTransitions = (function() {

	var $main = $( '#pt-main' ),
		$pages = $main.children( 'div.pt-page' ),
		$iterate = $( '#iterateEffects' ),
		animcursor = 1,
		pagesCount = $pages.length,
		current = 0,
		isAnimating = false,
		endCurUSD ge = false,
		endNextPage = false,
		animEndEventNames = {
			'WebkitAnimation' : 'webkitAnimationEnd',
			'OAnimation' : 'oAnimationEnd',
			'msAnimation' : 'MSAnimationEnd',
			'animation' : 'animationend'
		},
		// animation end event name
		animEndEventName = animEndEventNames[ Modernizr.prefixed( 'animation' ) ],
		// support css animations
		support = Modernizr.cssanimations;
	
	function init() {

		$pages.each( function() {
			var $page = $( this );
			$page.data( 'originalClassList', $page.attr( 'class' ) );
		} );

		$pages.eq( current ).addClass( 'pt-page-current' );

		$( '#dl-menu' ).dlmenu( {
			animationClasses : { in : 'dl-animate-in-2', out : 'dl-animate-out-2' },
			onLinkClick : function( el, ev ) {
				ev.preventDefault();
				nextPage( el.data( 'animation' ) );
			}
		} );

		$iterate.on( 'click', function() {
			if( isAnimating ) {
				return false;
			}
			if( animcursor > 67 ) {
				animcursor = 1;
			}
			nextPage( animcursor );
			++animcursor;
		} );

	}

	function nextPage(options ) {
		var animation = (options.animation) ? options.animation : options;

		if( isAnimating ) {
			return false;
		}

		isAnimating = true;
		
		var $curUSD ge = $pages.eq( current );

		if(options.showPage){
			if( options.showPage < pagesCount - 1 ) {
				current = options.showPage;
			}
			else {
				current = 0;
			}
		}
		else{
			if( current < pagesCount - 1 ) {
				++current;
			}
			else {
				current = 0;
			}
		}

		var $nextPage = $pages.eq( current ).addClass( 'pt-page-current' ),
			outClass = '', inClass = '';

		switch( animation ) {

			case 1:
				outClass = 'pt-page-moveToLeft';
				inClass = 'pt-page-moveFromRight';
				break;
			case 2:
				outClass = 'pt-page-moveToRight';
				inClass = 'pt-page-moveFromLeft';
				break;
			case 3:
				outClass = 'pt-page-moveToTop';
				inClass = 'pt-page-moveFromBottom';
				break;
			case 4:
				outClass = 'pt-page-moveToBottom';
				inClass = 'pt-page-moveFromTop';
				break;
			
			case 5:
				outClass = 'pt-page-moveToLeftEasing pt-page-ontop';
				inClass = 'pt-page-moveFromRight';
				break;
			case 6:
				outClass = 'pt-page-moveToRightEasing pt-page-ontop';
				inClass = 'pt-page-moveFromLeft';
				break;
			case 7:
				outClass = 'pt-page-moveToTopEasing pt-page-ontop';
				inClass = 'pt-page-moveFromBottom';
				break;
			case 8:
				outClass = 'pt-page-moveToBottomEasing pt-page-ontop';
				inClass = 'pt-page-moveFromTop';
				break;
			
			case 9:
				outClass = 'pt-page-moveToTop pt-page-ontop';
				inClass = 'pt-page-scaleUp';
				break;
			case 10:
				outClass = 'pt-page-moveToBottom pt-page-ontop';
				inClass = 'pt-page-scaleUp';
				break;
			

		}

		$curUSD ge.addClass( outClass ).on( animEndEventName, function() {
			$curUSD ge.off( animEndEventName );
			endCurUSD ge = true;
			if( endNextPage ) {
				onEndAnimation( $curUSD ge, $nextPage );
			}
		} );

		$nextPage.addClass( inClass ).on( animEndEventName, function() {
			$nextPage.off( animEndEventName );
			endNextPage = true;
			if( endCurUSD ge ) {
				onEndAnimation( $curUSD ge, $nextPage );
			}
		} );

		if( !support ) {
			onEndAnimation( $curUSD ge, $nextPage );
		}

	}

	function onEndAnimation( $outpage, $inpage ) {
		endCurUSD ge = false;
		endNextPage = false;
		resetPage( $outpage, $inpage );
		isAnimating = false;
	}

	function resetPage( $outpage, $inpage ) {
		$outpage.attr( 'class', $outpage.data( 'originalClassList' ) );
		$inpage.attr( 'class', $inpage.data( 'originalClassList' ) + ' pt-page-current' );
	}

	init();

	return { 
		init : init,
		nextPage : nextPage,
	};

})();