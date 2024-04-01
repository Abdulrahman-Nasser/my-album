$('.deleteButton').click(function () {
    var albumId = $(this).data('id');
    console.log(albumId);

    // Get the CSRF token from the meta tag
    var csrfToken = $('meta[name="csrf-token"]').attr('content');

    // Store the albumId in a session via AJAX
    $.ajax({
        url: '/storeAlbumIdInSession',
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': csrfToken
        },
        data: {
            album_id: albumId
        },
        success: function (response) {
            console.log('Album id stored in session');
        }
    });
});


