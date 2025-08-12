document.addEventListener('DOMContentLoaded', function () {
    const title = document.querySelector('h1').textContent;
    let url = window.location.href;

    document.querySelector('.facebook-link')?.addEventListener('click', function (e) {
        url = window.location.href;
        e.preventDefault();
        const fbUrl = `https://www.facebook.com/sharer/sharer.php?u=${encodeURIComponent(url)}`;
        console.log(fbUrl);
        window.open(fbUrl, '_blank', 'width=600,height=400');
    });

    document.querySelector('.x-link')?.addEventListener('click', function (e) {
        url = window.location.href;
        e.preventDefault();
        const twitterText = `${title}`;
        const twitterUrl = `https://twitter.com/intent/tweet?text=${encodeURIComponent(twitterText)}&url=${encodeURIComponent(url)}`;
        window.open(twitterUrl, '_blank', 'width=600,height=400');
    });

    document.querySelector('.linkedin-link')?.addEventListener('click', function (e) {
        url = window.location.href;
        e.preventDefault();
        const linkedinUrl = `https://www.linkedin.com/sharing/share-offsite/?url=${encodeURIComponent(url)}`;
        window.open(linkedinUrl, '_blank', 'width=600,height=400');
    });

    document.querySelector('.copy-link')?.addEventListener('click', function (e) {
        url = window.location.href;
        e.preventDefault();
        navigator.clipboard.writeText(url);
    });
});
