/**
 * Customizer Live Preview
 *
 * Reloads changes on Theme Customizer Preview asynchronously for better usability
 *
 * @package Storytime
 */

(function ($) {

    // Site Title textfield.
    wp.customize('blogname', function (value) {
        value.bind(function (to) {
            $('.site-title').text(to);
        });
    });

    // Site Description textfield.
    wp.customize('blogdescription', function (value) {
        value.bind(function (to) {
            $('.site-description').text(to);
        });
    });

    // Site Title Colour
    wp.customize('storytime_sitetitle_colour', function (value) {
        value.bind(function (to) {
            $('#site-title a').css('color', to);
        });
    });

    // Site Tagline Colour
    wp.customize('storytime_tagline_colour', function (value) {
        value.bind(function (to) {
            $('#site-description').css('color', to);
        });
    });


    // Line Colours	
    /* 	wp.customize( 'storytime_line_colour', function( value ) {
    		value.bind( function( newval ) {
    			$('.entry-title::after').css('background-color', newval );
    		} );
    	} ); */


    // Image Border
    wp.customize('storytime_image_border', function (value) {
        value.bind(function (newval) {
            $('.hentry .post-thumbnail a img').css('border-color', newval);
        });
    });


    // Splash Page Button	
    wp.customize('storytime_splash_button', function (value) {
        value.bind(function (newval) {
            $('#splash-menu .splash-button a').css('background-color', newval);
        });
    });

    // Splash Page Button Text
    wp.customize('storytime_splash_button_text', function (value) {
        value.bind(function (newval) {
            $('#splash-menu .splash-button a').css('color', newval);
        });
    });


    // Copyright
    wp.customize('storytime_copyright', function (value) {
        value.bind(function (to) {
            $('#copyright-name').text(to);
        });
    });

    // Show blog title group checkbox.
    wp.customize('storytime_show_blog_title', function (value) {
        value.bind(function (newval) {
            if (false === newval) {
                hideElement('#blog-title');
                hideElement('#blog-intro');
            } else {
                showElement('#blog-title');
                showElement('#blog-intro');
            }
        });
    });

    // Show post meta info
    wp.customize('storytime_single_meta_info', function (value) {
        value.bind(function (newval) {
            if (false === newval) {
                showElement('.single .post-details');
            } else {
                hideElement('.single .post-details');
            }
        });
    });

    // Show summary image
    wp.customize('storytime_show_summary_image', function (value) {
        value.bind(function (newval) {
            if (false === newval) {
                showElement('.blog .post-thumbnail');
            } else {
                hideElement('.blog .post-thumbnail');
            }
        });
    });

    // Show summary meta
    wp.customize('storytime_show_summary_meta', function (value) {
        value.bind(function (newval) {
            if (false === newval) {
                showElement('.blog .post-details');
            } else {
                hideElement('.blog .post-details');
            }
        });
    });

    // Show summary author
    wp.customize('storytime_show_summary_author', function (value) {
        value.bind(function (newval) {
            if (false === newval) {
                showElement('.blog .byline');
            } else {
                hideElement('.blog .byline');
            }
        });
    });

    // Show summary date
    wp.customize('storytime_show_summary_date', function (value) {
        value.bind(function (newval) {
            if (false === newval) {
                showElement('.blog .posted-on');
            } else {
                hideElement('.blog .posted-on');
            }
        });
    });

    // Show summary comment count
    wp.customize('storytime_show_summary_comments', function (value) {
        value.bind(function (newval) {
            if (false === newval) {
                showElement('.blog .comments-link');
            } else {
                hideElement('.blog .comments-link');
            }
        });
    });

    // Show full post image
    wp.customize('storytime_show_single_image', function (value) {
        value.bind(function (newval) {
            if (false === newval) {
                showElement('.single .post-thumbnail');
            } else {
                hideElement('.single .post-thumbnail');
            }
        });
    });

    // Show full post author
    wp.customize('storytime_show_single_author', function (value) {
        value.bind(function (newval) {
            if (false === newval) {
                showElement('.single .byline');
            } else {
                hideElement('.single .byline');
            }
        });
    });

    // Show full post date
    wp.customize('storytime_show_single_date', function (value) {
        value.bind(function (newval) {
            if (false === newval) {
                showElement('.single .posted-on');
            } else {
                hideElement('.single .posted-on');
            }
        });
    });

    // Show full post comment count
    wp.customize('storytime_show_single_comments', function (value) {
        value.bind(function (newval) {
            if (false === newval) {
                showElement('.single .comments-link');
            } else {
                hideElement('.single .comments-link');
            }
        });
    });


    // Show edit links
    wp.customize('storytime_show_edit', function (value) {
        value.bind(function (newval) {
            if (false === newval) {
                showElement('.edit-link');
            } else {
                hideElement('.edit-link');
            }
        });
    });

    // Show featured label
    wp.customize('storytime_show_featured_label', function (value) {
        value.bind(function (newval) {
            if (false === newval) {
                showElement('.featured-label');
            } else {
                hideElement('.featured-label');
            }
        });
    });

    // Show author bio
    wp.customize('storytime_display_author_bio', function (value) {
        value.bind(function (newval) {
            if (false === newval) {
                showElement('#author-info');
            } else {
                hideElement('#author-info');
            }
        });
    });

    // Show footer category list
    wp.customize('storytime_footer_categories', function (value) {
        value.bind(function (newval) {
            if (false === newval) {
                showElement('#post-categories');
            } else {
                hideElement('#post-categories');
            }
        });
    });

    // Show footer tag list
    wp.customize('storytime_footer_tags', function (value) {
        value.bind(function (newval) {
            if (false === newval) {
                showElement('#post-tags');
            } else {
                hideElement('#post-tags');
            }
        });
    });

    // Show post next prev
    wp.customize('storytime_post_navigation', function (value) {
        value.bind(function (newval) {
            if (false === newval) {
                showElement('.post-navigation');
            } else {
                hideElement('.post-navigation');
            }
        });
    });



    // functions for our customer settings
    function hideElement(element) {
        $(element).css({
            clip: 'rect(1px, 1px, 1px, 1px)',
            position: 'absolute',
            width: '1px',
            height: '1px',
            overflow: 'hidden'
        });
    }

    function showElement(element) {
        $(element).css({
            clip: 'auto',
            position: 'relative',
            width: 'auto',
            height: 'auto',
            overflow: 'visible'
        });
    }

})(jQuery);
