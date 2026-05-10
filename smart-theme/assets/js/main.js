/**
 * Smart Pro Theme - Main JavaScript
 * 
 * @package Smart_Pro
 */

(function($) {
    'use strict';

    // عند تحميل المستند
    $(document).ready(function() {
        
        // === القائمة المحمولة ===
        $('.menu-toggle').on('click', function() {
            $('.main-navigation').toggleClass('toggled');
            $(this).attr('aria-expanded', function(i, attr) {
                return attr === 'true' ? 'false' : 'true';
            });
        });

        // === نموذج البحث المنبثق ===
        $('.search-toggle').on('click', function() {
            $('.search-overlay').addClass('active');
            $('.search-form-container input[type="search"]').focus();
        });

        $('.search-close, .search-overlay').on('click', function(e) {
            if (e.target === this) {
                $('.search-overlay').removeClass('active');
            }
        });

        $(document).on('keydown', function(e) {
            if (e.key === 'Escape') {
                $('.search-overlay').removeClass('active');
            }
        });

        // === زر الصعود للأعلى ===
        $(window).on('scroll', function() {
            if ($(window).scrollTop() > 300) {
                $('#back-to-top').addClass('visible');
            } else {
                $('#back-to-top').removeClass('visible');
            }
        });

        $('#back-to-top').on('click', function() {
            $('html, body').animate({ scrollTop: 0 }, 600);
            return false;
        });

        // === تصفية معرض الأعمال ===
        $('.portfolio-filters .filter-btn').on('click', function() {
            var filterValue = $(this).attr('data-filter');
            
            $('.portfolio-filters .filter-btn').removeClass('active');
            $(this).addClass('active');
            
            if (filterValue === 'all') {
                $('.portfolio-item').fadeIn(400);
            } else {
                $('.portfolio-item').not('.' + filterValue).hide();
                $('.portfolio-item.' + filterValue).fadeIn(400);
            }
        });

        // === تحميل المزيد من المنشورات (AJAX) ===
        $(document).on('click', '.load-more-btn', function(e) {
            e.preventDefault();
            
            var $btn = $(this);
            var page = parseInt($btn.data('page')) + 1;
            var postType = $btn.data('post-type') || 'post';
            
            $btn.addClass('loading').text(smartProAjax.loading || 'جاري التحميل...');
            
            $.ajax({
                url: smartProAjax.ajaxurl,
                type: 'POST',
                data: {
                    action: 'smart_pro_load_more',
                    page: page,
                    post_type: postType,
                    nonce: smartProAjax.nonce
                },
                success: function(response) {
                    if (response.success) {
                        $('.posts-grid').append(response.data.html);
                        $btn.data('page', page);
                        
                        if (!response.data.hasMore) {
                            $btn.hide();
                        } else {
                            $btn.removeClass('loading').text(smartProAjax.loadMore || 'تحميل المزيد');
                        }
                    }
                },
                error: function() {
                    $btn.removeClass('loading').text('حدث خطأ');
                }
            });
        });

        // === البحث المباشر (AJAX Live Search) ===
        var searchTimeout;
        $('.search-form input[type="search"]').on('input', function() {
            var searchTerm = $(this).val();
            clearTimeout(searchTimeout);
            
            if (searchTerm.length < 3) {
                $('.search-results-live').hide();
                return;
            }
            
            searchTimeout = setTimeout(function() {
                $.ajax({
                    url: smartProAjax.ajaxurl,
                    type: 'POST',
                    data: {
                        action: 'smart_pro_live_search',
                        search_term: searchTerm,
                        nonce: smartProAjax.nonce
                    },
                    success: function(response) {
                        if (response.success) {
                            $('.search-results-live').html(response.data.html).show();
                        }
                    }
                });
            }, 500);
        });

        // === نموذج الاتصال AJAX ===
        $('#contact-form').on('submit', function(e) {
            e.preventDefault();
            
            var $form = $(this);
            var $btn = $form.find('button[type="submit"]');
            var originalText = $btn.text();
            
            $btn.prop('disabled', true).text('جاري الإرسال...');
            
            $.ajax({
                url: smartProAjax.ajaxurl,
                type: 'POST',
                data: $form.serialize() + '&action=smart_pro_contact_form&nonce=' + smartProAjax.nonce,
                success: function(response) {
                    if (response.success) {
                        $form.before('<div class="alert alert-success">' + response.data.message + '</div>');
                        $form[0].reset();
                    } else {
                        $form.before('<div class="alert alert-error">' + response.data.message + '</div>');
                    }
                },
                error: function() {
                    $form.before('<div class="alert alert-error">حدث خطأ، يرجى المحاولة لاحقاً</div>');
                },
                complete: function() {
                    $btn.prop('disabled', false).text(originalText);
                }
            });
        });

        // === الاشتراك في النشرة البريدية ===
        $('#newsletter-form').on('submit', function(e) {
            e.preventDefault();
            
            var $form = $(this);
            var $btn = $form.find('button[type="submit"]');
            var originalText = $btn.text();
            
            $btn.prop('disabled', true).text('جاري الإرسال...');
            
            $.ajax({
                url: smartProAjax.ajaxurl,
                type: 'POST',
                data: $form.serialize() + '&action=smart_pro_newsletter&nonce=' + smartProAjax.nonce,
                success: function(response) {
                    if (response.success) {
                        $form.before('<div class="alert alert-success">' + response.data.message + '</div>');
                        $form[0].reset();
                    } else {
                        $form.before('<div class="alert alert-error">' + response.data.message + '</div>');
                    }
                },
                complete: function() {
                    $btn.prop('disabled', false).text(originalText);
                }
            });
        });

        // === تحريك العناصر عند التمرير (Scroll Animations) ===
        function checkAnimations() {
            $('.animate-on-scroll').each(function() {
                var elementTop = $(this).offset().top;
                var windowBottom = $(window).scrollTop() + $(window).height();
                
                if (elementTop < windowBottom - 50) {
                    $(this).addClass('animated');
                }
            });
        }
        
        $(window).on('scroll', checkAnimations);
        checkAnimations();

        // === قائمة الجوال المنسدلة ===
        $('.menu-item-has-children > a').on('click', function(e) {
            if ($(window).width() < 992) {
                e.preventDefault();
                $(this).next('.sub-menu').slideToggle(300);
                $(this).parent().toggleClass('menu-open');
            }
        });

        // === سلايدر testimonials ===
        if ($('.testimonials-slider').length > 0) {
            $('.testimonials-slider').slick({
                slidesToShow: 3,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 5000,
                dots: true,
                arrows: false,
                rtl: $('html').attr('dir') === 'rtl',
                responsive: [
                    {
                        breakpoint: 992,
                        settings: { slidesToShow: 2 }
                    },
                    {
                        breakpoint: 768,
                        settings: { slidesToShow: 1 }
                    }
                ]
            });
        }

        // === Lazy Loading للصور ===
        if ('loading' in HTMLImageElement.prototype) {
            $('img.lazy').each(function() {
                $(this).attr('src', $(this).data('src'));
            });
        } else {
            var lazyImages = document.querySelectorAll('img.lazy');
            var lazyImageObserver = new IntersectionObserver(function(entries) {
                entries.forEach(function(entry) {
                    if (entry.isIntersecting) {
                        var lazyImage = entry.target;
                        lazyImage.src = lazyImage.dataset.src;
                        lazyImageObserver.unobserve(lazyImage);
                    }
                });
            });
            
            lazyImages.forEach(function(lazyImage) {
                lazyImageObserver.observe(lazyImage);
            });
        }

        // === تأثيرات الهيدر عند التمرير ===
        var lastScroll = 0;
        $(window).on('scroll', function() {
            var currentScroll = $(window).scrollTop();
            
            if (currentScroll > 100) {
                $('.site-header').addClass('scrolled');
            } else {
                $('.site-header').removeClass('scrolled');
            }
            
            if (currentScroll > lastScroll && currentScroll > 200) {
                $('.site-header').addClass('hide-header');
            } else {
                $('.site-header').removeClass('hide-header');
            }
            
            lastScroll = currentScroll;
        });

    }); // End document ready

})(jQuery);
