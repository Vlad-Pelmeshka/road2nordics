document.addEventListener('nfFormReady', function(e) {
    const field = document.querySelector('.nf-field-element');
    if (field) {
        field.addEventListener('click', function() {
            console.log('Clicked after form load!');
        });
    }
});