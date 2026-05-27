$(document).ready(function () {
    let searchTimer = null;

    // Filter state
    let activeCategory = '';
    let activeDate = '';
    let activeSearch = '';

    // Category Pill Click
    $('.category-pill').on('click', function () {
        $('.category-pill').removeClass('active');
        $(this).addClass('active');

        activeCategory = $(this).data('category');
        fetchFilteredBlogs();
    });

    // Date Select Change
    $('#date-filter').on('change', function () {
        activeDate = $(this).val();
        fetchFilteredBlogs();
    });

    // Search Keyup with Debouncing (300ms)
    $('#search').on('input', function () {
        clearTimeout(searchTimer);
        activeSearch = $(this).val();

        searchTimer = setTimeout(function () {
            fetchFilteredBlogs();
        }, 300);
    });

    // Main fetch function
    function fetchFilteredBlogs() {
        // Show loading spinner overlay
        $('#loadingOverlay').addClass('active');

        $.ajax({
            url: '/api/blogs/filter',
            type: 'GET',
            data: {
                category: activeCategory,
                date: activeDate,
                search: activeSearch
            },
            success: function (html) {
                // Update grid content
                $('#blog-grid').html(html);
            },
            error: function (xhr, status, error) {
                console.error("AJAX Error: ", error);
            },
            complete: function () {
                // Hide loading spinner overlay after delay to make transition smooth
                setTimeout(function () {
                    $('#loadingOverlay').removeClass('active');
                }, 200);
            }
        });
    }
});
