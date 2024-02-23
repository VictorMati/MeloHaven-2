// Home.js

$(document).ready(function() {
    // Load more results when the load more button is clicked.
    $('.load-more button').click(function() {
        loadMore();
    });
});

function loadMore() {
    // Get the current page number.
    var page = $('.page-number').text();

    // Increment the page number.
    page++;

    // Update the page number in the DOM.
    $('.page-number').text(page);

    // Make an AJAX request to get the next page of results.
    $.ajax({
        url: '/your-load-more-endpoint', // Replace with your actual URL endpoint
        data: {
            page: page
        },
        success: function(data) {
            // Append the new results to the DOM.
            $('.results').append(data);
        }
    });
}
