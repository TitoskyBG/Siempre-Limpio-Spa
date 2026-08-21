document.addEventListener('DOMContentLoaded', () => {
    const galleries = document.querySelectorAll('.feature-gallery');

    galleries.forEach((gallery) => {
        const mainImage = gallery.querySelector('.gallery-main img');
        const thumbnails = gallery.querySelectorAll('.gallery-thumb img');

        if (!mainImage || thumbnails.length === 0) {
            return;
        }

        thumbnails.forEach((thumbImage) => {
            thumbImage.closest('.gallery-thumb').addEventListener('click', () => {
                const mainSource = mainImage.src;
                const mainAlt = mainImage.alt;

                mainImage.src = thumbImage.src;
                mainImage.alt = thumbImage.alt;

                thumbImage.src = mainSource;
                thumbImage.alt = mainAlt;
            });
        });
    });
});